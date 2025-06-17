<h2>Cảm ơn bạn đã đặt hàng tại {{ config('app.name') }}</h2>
<p>Mã đơn hàng: <strong>#{{ $order['id'] }}</strong></p>
<p>Ngày đặt: {{ $order['date'] }}</p>

<h3>Chi tiết đơn hàng:</h3>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Thành tiền</th>
    </tr>
    @foreach ($order['items'] as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['qty'] }}</td>
            <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
            <td>{{ number_format($item['qty'] * $item['price'], 0, ',', '.') }}đ</td>
        </tr>
    @endforeach
</table>

<p><strong>Tổng cộng:</strong> {{ number_format($order['total'], 0, ',', '.') }}đ</p>

<p>Chúng tôi sẽ liên hệ để xác nhận và giao hàng trong thời gian sớm nhất.</p>
