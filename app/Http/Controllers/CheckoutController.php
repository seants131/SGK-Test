<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function showCheckoutPage(Request $request)
    {
        // Xác định bước hiện tại của quá trình thanh toán.
        // Ví dụ: dựa trên query parameter 'step', hoặc một session variable.
        $currentStep = $request->query('step', 'cart'); // Mặc định là 'cart'

        $pageTitle = 'Giỏ hàng'; // Tiêu đề mặc định

        switch ($currentStep) {
            case 'cart':
                $pageTitle = 'Giỏ hàng';
                break;
            case 'address':
                $pageTitle = 'Địa chỉ giao hàng';
                break;
            case 'payment':
                $pageTitle = 'Phương thức thanh toán';
                break;
            case 'summary':
                $pageTitle = 'Xác nhận đơn hàng';
                break;
            // Bạn có thể thêm các trường hợp khác nếu cần
        }

        // Truyền biến $pageTitle với tên là 'trang' tới view
        return view('user.checkout.thanh_toan', ['trang' => $pageTitle]);
    }
}

