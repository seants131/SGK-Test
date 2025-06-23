<div class="container mt-4">
    <h3>Đơn hàng của tôi</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>Tổng tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->ngay_mua }}</td>
                <td>{{ $order->trang_thai }}</td>
                <td>{{ number_format($order->tong_tien) }} đ</td>
                <td><a href="{{ route('user.orders.detail', $order->id) }}">Xem chi tiết</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>