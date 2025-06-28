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
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

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
            'district' => 'required|string', // BỔ SUNG DÒNG NÀY
            'state' => 'required|string',
        ]);
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

    public function placeOrder(Request $request)
    {
        $request->validate([
            'hinh_thuc_thanh_toan' => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Lấy thông tin địa chỉ từ session
            $address = session('shipping_address');
            if (!$address) {
                return redirect()->route('checkout.address')->with('error', 'Vui lòng nhập địa chỉ giao hàng.');
            }

            // Tìm hoặc tạo khách hàng theo email
            $user = KhachHang::where('email', $address['email'])->first();
            if ($user) {
                // Nếu đã có user, cập nhật thông tin mới nhất
                $user->update([
                    'name' => $address['fname'],
                    'so_dien_thoai' => $address['mno'],
                    'dia_chi' => $address['houseno'],
                    'phuong_xa' => $address['state'],
                    'quan_huyen' => $address['district'],
                    'tinh_thanh_pho' => $address['city'],
                ]);
            } else {
                // Nếu chưa có user, tạo mới
                $user = KhachHang::create([
                    'name' => $address['fname'],
                    'email' => $address['email'],
                    'so_dien_thoai' => $address['mno'],
                    'role' => 'khach',
                    'dia_chi' => $address['houseno'],
                    'phuong_xa' => $address['state'],
                    'quan_huyen' => $address['district'],
                    'tinh_thanh_pho' => $address['city'],
                ]);
            }

            // Lấy giỏ hàng
            $cart = session('cart', []);
            if (empty($cart)) {
                return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
            }

            $tong_tien = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
            $tong_so_luong = collect($cart)->sum('quantity');

            // Tạo đơn hàng (hoa_don)
            $donHang = DonHang::create([
                'user_id' => $user->id,
                'ngay_mua' => now(),
                'trang_thai' => 'cho_xu_ly',
                'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
                'giam_gia' => 0,
                'tong_tien' => $tong_tien,
                'tong_so_luong' => $tong_so_luong,
                'khuyen_mai_id' => null,
                'dia_chi' => $address['houseno'],
                'phuong_xa' => $address['state'],
                'quan_huyen' => $address['district'],
                'tinh_thanh_pho' => $address['city'],
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
            Mail::to($address['email'])->send(new OrderPlacedMail($donHang, $cart));

            // Xóa giỏ hàng
            session()->forget('cart');
            DB::commit();

            return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công! Vui lòng kiểm tra email.');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
