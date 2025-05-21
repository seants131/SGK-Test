# Tài liệu quy trình thanh toán

## Tổng quan
Trong dự án này, mình xây dựng quy trình thanh toán cho một website bán sách online. Mình đã chia nhỏ thành nhiều thành phần riêng biệt để dễ bảo trì và mở rộng sau này. Mỗi file đảm nhận một phần cụ thể trong quy trình thanh toán, giúp mình dễ dàng chỉnh sửa hoặc cập nhật khi cần thiết.

## Cấu trúc thư mục
Trong thư mục `checkout`, mình tạo ra các file sau:

- **thanh_toan.blade.php**: Đây là điểm vào chính của quy trình thanh toán. Nó bao gồm phần header, loading và nhúng các thành phần khác như giỏ hàng, địa chỉ, thanh toán và tóm tắt đơn hàng.

- **cart.blade.php**: Hiển thị các sản phẩm trong giỏ hàng. Bao gồm thông tin chi tiết về từng sản phẩm, số lượng, giá và thành tiền.

- **address.blade.php**: Đây là form để người dùng nhập địa chỉ giao hàng. Có các trường như họ tên, số điện thoại, địa chỉ cụ thể, thành phố và loại địa chỉ.

- **payment.blade.php**: Cho phép người dùng chọn phương thức thanh toán. Có các lựa chọn như COD, chuyển khoản, MoMo... hiển thị dưới dạng nút radio, kèm theo nút tiến hành thanh toán.

- **summary.blade.php**: Tóm tắt toàn bộ đơn hàng trước khi xác nhận. Bao gồm tổng giá trị đơn, phí vận chuyển, giảm giá (nếu có), và tổng tiền phải thanh toán.

- **scripts.blade.php**: File này mình dùng để nhúng các script JavaScript cần thiết để hỗ trợ các tính năng tương tác trong trang thanh toán.

- **styles.blade.php**: Chứa các đoạn CSS để định dạng giao diện cho toàn bộ các trang thanh toán, giúp giao diện đồng nhất và đẹp hơn.

## Cách cài đặt
1. Đảm bảo bạn đã cấu hình xong môi trường Laravel.
2. Đặt tất cả các file ở trên vào thư mục `resources/views/checkout`.
3. Nhúng file `styles.blade.php` và `scripts.blade.php` vào layout chính hoặc vào file `thanh_toan.blade.php`.
4. Truy cập vào trang thanh toán qua route tương ứng trong Laravel.

## Cách sử dụng
- Khi truy cập vào trang thanh toán, người dùng sẽ lần lượt xem giỏ hàng, điền thông tin nhận hàng, chọn phương thức thanh toán và xem lại đơn hàng trước khi xác nhận.
- Mỗi phần (cart, address, payment, summary) được tách riêng nên nếu cần chỉnh sửa phần nào thì mình chỉ cần làm ở file đó, không ảnh hưởng đến phần khác.

## Góp ý và mở rộng
Nếu bạn muốn đóng góp cho dự án, có thể thêm tính năng mới hoặc tối ưu lại các phần hiện có. Nhớ giữ cấu trúc chia nhỏ để mọi thứ được rõ ràng và dễ bảo trì nhé.
