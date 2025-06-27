{{-- filepath: resources/views/emails/order_placed.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận đơn hàng</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #eee; padding: 24px;">
        <h2 style="color: #2d3748; border-bottom: 1px solid #eee; padding-bottom: 8px;">Cảm ơn bạn đã đặt hàng tại QuanLamBookStore!</h2>
        <p>Xin chào <strong>{{ $order->khachHang->name ?? 'Quý khách' }}</strong>,</p>
        <p>Chúng tôi đã nhận được đơn hàng của bạn. Dưới đây là thông tin chi tiết:</p>

        <h3 style="color: #3182ce;">Thông tin hóa đơn</h3>
        <ul style="list-style: none; padding: 0;">
            <li><strong>Mã đơn hàng:</strong> #{{ $order->id }}</li>
            <li><strong>Ngày mua:</strong> {{ $order->ngay_mua->format('d/m/Y H:i') }}</li>
            <li><strong>Hình thức thanh toán:</strong> {{ $order->hinh_thuc_thanh_toan }}</li>
            <li><strong>Trạng thái:</strong> {{ $order->trang_thai }}</li>
        </ul>

        <h3 style="color: #3182ce;">Chi tiết sản phẩm</h3>
        <table width="100%" border="1" cellpadding="8" cellspacing="0" style="border-collapse: collapse; margin-bottom: 16px;">
            <thead style="background: #f1f5f9;">
                <tr>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['name'] ?? 'Sách' }}</td>
                        <td align="center">{{ $item['quantity'] }}</td>
                        <td align="right">{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                        <td align="right">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: right; margin-bottom: 16px;">
            <strong>Tổng tiền: {{ number_format($order->tong_tien, 0, ',', '.') }}đ</strong>
        </div>

        <p style="margin-top: 24px;">Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua email này hoặc số điện thoại hỗ trợ trên website.</p>
        <p>Trân trọng,<br><strong>QuanLamBookStore</strong></p>
    </div>
</body>
</html>
