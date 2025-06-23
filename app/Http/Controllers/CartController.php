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
}