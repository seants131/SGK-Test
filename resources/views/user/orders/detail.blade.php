<div class="container mt-4">
    <h3>Chi tiết đơn hàng #{{ $order->id }}</h3>
    <ul>
        <li>Ngày mua: {{ $order->ngay_mua }}</li>
        <li>Trạng thái: {{ $order->trang_thai }}</li>
        <li>Tổng tiền: {{ number_format($order->tong_tien) }} đ</li>
        {{-- Thêm chi tiết sản phẩm nếu có --}}
    </ul>
    <a href="{{ route('user.orders.index') }}">Quay lại danh sách đơn hàng</a>
</div>