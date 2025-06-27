<?php

namespace App\Http\Controllers;

use App\Models\DonHang;
use App\Models\ChiTietHoaDon;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlacedMail;

class UserCheckoutController extends Controller
{
    public function showAddressForm()
    {
        $user = Auth::user();
        $address = null;

        if ($user) {
            $address = [
                'fname' => $user->ho_va_ten,
                'email' => $user->email,
                'mno' => $user->so_dien_thoai,
                'houseno' => $user->dia_chi,
                'city' => $user->thanh_pho,
                'state' => $user->phuong,
            ];
        }

        return view('user.checkout.address', compact('address'));
    }

    public function submitAddress(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|email',
            'mno' => 'required|string|max:20',
            'houseno' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ]);

        if (Auth::check()) {
            // Đã đăng nhập: cập nhật vào database
            $user = Auth::user();
            // Ensure $user is an Eloquent model instance
            if ($user instanceof \Illuminate\Database\Eloquent\Model) {
                $user->ho_va_ten = $validated['fname'];
                $user->email = $validated['email'];
                $user->so_dien_thoai = $validated['mno'];
                $user->dia_chi_mac_dinh = $validated['houseno'];
                $user->tinh_thanh_pho_mac_dinh = $validated['city'];
                $user->phuong_xa_mac_dinh = $validated['state'];
                // Nếu có quận/huyện thì bổ sung:
                // $user->quan_huyen_mac_dinh = $validated['district'];
                $user->save();
            }
        }

        // Lưu vào session cho cả khách vãng lai và đã đăng nhập
        session(['shipping_address' => $validated]);
        return redirect()->route('checkout.payment')->with('success', 'Đã lưu địa chỉ thành công.');
    }

    public function goToPayment()
    {
        $cart = session('cart', []);
        $cart_total = 0;
        foreach ($cart as $item) {
            $cart_total += $item['price'] * $item['quantity'];
        }
        return view('user.checkout.payment', compact('cart_total'));
    }
    // public function showAddressForm()
    // {
    //     $cart = session('cart', []);
    //     if (empty($cart)) {
    //         return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống.');
    //     }

    //     return view('user.checkout.address');
    // }

    // public function submitAddress(Request $request)
    // {
    //     $validated = $request->validate([
    //         'fname' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'mno' => 'required|string|max:20',
    //         'houseno' => 'required|string|max:255',
    //         'city' => 'required|string|max:100',
    //         'state' => 'required|string|max:100',
    //         'addtype' => 'nullable|string|max:100',
    //     ]);

    //     session(['checkout_address' => $validated]);

    //     return redirect()->route('checkout.payment'); // Route này bạn sẽ xử lý sau
    // }
    public function store(Request $request)
    {
        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email',
            'so_dien_thoai' => 'required|string|max:15',
            'dia_chi_cu_the' => 'required|string',
            'phuong' => 'required|string',
            'quan' => 'required|string',
            'tinh' => 'required|string',
            'hinh_thuc_thanh_toan' => 'required|in:tien_mat,chuyen_khoan',
        ]);

        DB::beginTransaction();

        try {
            // Tìm hoặc tạo khách hàng
            $user = KhachHang::where('email', $request->email)->first();

            if (!$user) {
                $user = KhachHang::create([
                    'name' => $request->ho_ten,
                    'email' => $request->email,
                    'so_dien_thoai' => $request->so_dien_thoai,
                    'role' => 'khach',
                    // Không cần password, username
                ]);
            }

            $cart = session('cart', []);

            if (empty($cart)) {
                return redirect()->back()->with('error', 'Giỏ hàng trống!');
            }

            $tong_tien = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
            $tong_so_luong = collect($cart)->sum('quantity');

            // Tạo đơn hàng
            $donHang = DonHang::create([
                'user_id' => $user->id,
                'ngay_mua' => now(),
                'trang_thai' => 'cho_xu_ly',
                'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
                'giam_gia' => 0,
                'tong_tien' => $tong_tien,
                'tong_so_luong' => $tong_so_luong,
                'khuyen_mai_id' => null,
                'ho_ten' => $request->ho_ten,
                'so_dien_thoai' => $request->so_dien_thoai,
                'email' => $request->email,
                'dia_chi_cu_the' => $request->dia_chi_cu_the,
                'phuong' => $request->phuong,
                'quan' => $request->quan,
                'tinh' => $request->tinh,
            ]);

            // Thêm chi tiết hóa đơn
            foreach ($cart as $item) {
                ChiTietHoaDon::create([
                    'hoa_don_id' => $donHang->id,
                    'sach_id' => $item['id'],
                    'so_luong' => $item['quantity'],
                    'don_gia' => $item['price'],
                    'thanh_tien' => $item['price'] * $item['quantity'],
                ]);
            }

            // Gửi email xác nhận đơn hàng
            Mail::to($request->email)->send(new OrderPlacedMail($donHang, $cart));

            session()->forget('cart');
            DB::commit();

            return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công! Vui lòng kiểm tra email.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Lỗi khi đặt hàng: ' . $e->getMessage());
        }
        
    }
}
