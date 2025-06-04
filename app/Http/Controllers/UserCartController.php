<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['quantity'] * $item['price']);

        return view('user.thanh_toan.gio_hang', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $quantity = $request->input('quantity', 1);
        $image = $request->input('image'); // ảnh sản phẩm

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Đã thêm vào giỏ hàng!');
    }


    public function remove(Request $request)
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng.');
    }
}
