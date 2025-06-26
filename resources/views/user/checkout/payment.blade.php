{{-- filepath: resources/views/user/checkout/payment.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chọn phương thức thanh toán</title>
</head>
<body>
    @include('user.layout.header', ['trang' => 'Thanh toán'])

    <h2>Chọn phương thức thanh toán</h2>
    <form action="#" method="POST">
        @csrf
        <div>
            <input type="radio" id="credit" name="payment_method" value="credit" required>
            <label for="credit">Thẻ Tín dụng / Ghi nợ / ATM</label>
        </div>
        <div>
            <input type="radio" id="momo" name="payment_method" value="momo_zalopay">
            <label for="momo">Momo/ZaloPay</label>
        </div>
        <div>
            <input type="radio" id="installment" name="payment_method" value="installment">
            <label for="installment">Trả góp</label>
        </div>
        <div>
            <input type="radio" id="cod" name="payment_method" value="cod">
            <label for="cod">Thanh toán khi giao hàng (COD)</label>
        </div>
        <button type="submit">Tiếp tục</button>
    </form>

    <h3>Chi tiết đơn hàng</h3>
    <p>Giá sản phẩm: <strong>{{ isset($cart_total) ? number_format($cart_total, 0, ',', '.') : '0' }}đ</strong></p>
    <p>Phí vận chuyển: <strong>Miễn phí</strong></p>
    <p>Số tiền phải trả: <strong>{{ isset($cart_total) ? number_format($cart_total, 0, ',', '.') : '0' }}đ</strong></p>

    @include('user.layout.footer')
</body>
</html>