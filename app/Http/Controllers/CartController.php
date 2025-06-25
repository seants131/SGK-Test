<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('user.cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $book = \App\Models\Sach::findOrFail($request->id);

        $cart = session('cart', []);
        $id = $book->MaSach;

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'id' => $book->MaSach,
                'name' => $book->TenSach,
                'price' => $book->GiaBia,
                'image' => $book->HinhAnh,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng!');
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('id');
        unset($cart[$id]);
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function updateAjax(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');
        $action = $request->input('action');

        if (isset($cart[$id])) {
            if ($action === 'increase') {
                $cart[$id]['quantity'] += 1;
            } elseif ($action === 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
            }
            session()->put('cart', $cart);
            $item = $cart[$id];
            $total = collect($cart)->sum(function($i) { return $i['price'] * $i['quantity']; });
            return response()->json([
                'success' => true,
                'quantity' => $item['quantity'],
                'item_total' => number_format($item['price'] * $item['quantity'], 0, ',', '.'),
                'cart_total' => number_format($total, 0, ',', '.')
            ]);
        }
        return response()->json(['success' => false]);
    }

    public function removeAjax(Request $request)
    {
        $cart = session('cart', []);
        $id = $request->input('id');
        unset($cart[$id]);
        session(['cart' => $cart]);
        $total = collect($cart)->sum(function($i) { return $i['price'] * $i['quantity']; });
        return response()->json([
            'success' => true,
            'cart_total' => number_format($total, 0, ',', '.')
        ]);
    }
}