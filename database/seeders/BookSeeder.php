<?php

namespace Database\Seeders;

use App\Models\Sach; // Sử dụng model Sach
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/BookSeeder.php (ví dụ)
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class BookSeeder extends Seeder
{
    use WithoutModelEvents; // Thêm trait này
    public function run()
    {
        $books = [
            // Sách Giáo Khoa Lớp 6
            [
                'TenSach' => 'Toán 6 - Tập 1 (Kết Nối Tri Thức)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Hà Huy Khoái)',
                'HinhAnh' => 'sgk_toan6_t1_ketnoi.jpg',
                'GiaNhap' => 20000, // Thêm GiaNhap
                'GiaBan' => 25000,
                'NamXuatBan' => 2021,
                'MoTa' => 'Sách giáo khoa Toán lớp 6, tập một, bộ Kết Nối Tri Thức Với Cuộc Sống.',
                'SoLuong' => 100, // Thêm SoLuong
                'TrangThai' => 1, // Thêm TrangThai (1: hiện, 0: ẩn)
                'LuotMua' => 500,
                'slug' => Str::slug('Toán 6 - Tập 1 (Kết Nối Tri Thức)'),
                'category_id' => 1, // ID: Sách Giáo Khoa Lớp 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Ngữ Văn 6 - Tập 2 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Nguyễn Thị Hồng Nam)',
                'HinhAnh' => 'sgk_van6_t2_chantroi.jpg',
                'GiaNhap' => 22000,
                'GiaBan' => 28000,
                'NamXuatBan' => 2021,
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 6, tập hai, bộ Chân Trời Sáng Tạo.',
                'SoLuong' => 90,
                'TrangThai' => 1,
                'LuotMua' => 450,
                'slug' => Str::slug('Ngữ Văn 6 - Tập 2 (Chân Trời Sáng Tạo)'),
                'category_id' => 1, // ID: Sách Giáo Khoa Lớp 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Khoa Học Tự Nhiên 6 (Cánh Diều)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Mai Sỹ Tuấn)',
                'HinhAnh' => 'sgk_khtn6_canhdieu.jpg',
                'GiaNhap' => 24000,
                'GiaBan' => 30000,
                'NamXuatBan' => 2021,
                'MoTa' => 'Sách giáo khoa Khoa Học Tự Nhiên lớp 6, bộ Cánh Diều.',
                'SoLuong' => 80,
                'TrangThai' => 1,
                'LuotMua' => 400,
                'slug' => Str::slug('Khoa Học Tự Nhiên 6 (Cánh Diều)'),
                'category_id' => 1, // ID: Sách Giáo Khoa Lớp 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Khoa Lớp 7
            [
                'TenSach' => 'Toán 7 - Tập 1 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Trần Luận)',
                'HinhAnh' => 'sgk_toan7_t1_chantroi.jpg',
                'GiaNhap' => 21000,
                'GiaBan' => 26000,
                'NamXuatBan' => 2022,
                'MoTa' => 'Sách giáo khoa Toán lớp 7, tập một, bộ Chân Trời Sáng Tạo.',
                'SoLuong' => 110,
                'TrangThai' => 1,
                'LuotMua' => 380,
                'slug' => Str::slug('Toán 7 - Tập 1 (Chân Trời Sáng Tạo)'),
                'category_id' => 2, // ID: Sách Giáo Khoa Lớp 7
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Ngữ Văn 7 - Tập 1 (Cánh Diều)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Nguyễn Minh Thuyết)',
                'HinhAnh' => 'sgk_van7_t1_canhdieu.jpg',
                'GiaNhap' => 23000,
                'GiaBan' => 29000,
                'NamXuatBan' => 2022,
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 7, tập một, bộ Cánh Diều.',
                'SoLuong' => 95,
                'TrangThai' => 1,
                'LuotMua' => 350,
                'slug' => Str::slug('Ngữ Văn 7 - Tập 1 (Cánh Diều)'),
                'category_id' => 2, // ID: Sách Giáo Khoa Lớp 7
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Khoa Lớp 8
            [
                'TenSach' => 'Toán 8 - Tập 2 (Kết Nối Tri Thức)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Hà Huy Khoái)',
                'HinhAnh' => 'sgk_toan8_t2_ketnoi.jpg',
                'GiaNhap' => 22000,
                'GiaBan' => 27000,
                'NamXuatBan' => 2023,
                'MoTa' => 'Sách giáo khoa Toán lớp 8, tập hai, bộ Kết Nối Tri Thức Với Cuộc Sống.',
                'SoLuong' => 120,
                'TrangThai' => 1,
                'LuotMua' => 320,
                'slug' => Str::slug('Toán 8 - Tập 2 (Kết Nối Tri Thức)'),
                'category_id' => 3, // ID: Sách Giáo Khoa Lớp 8
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Khoa Học Tự Nhiên 8 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Cao Cự Giác)',
                'HinhAnh' => 'sgk_khtn8_chantroi.jpg', // Cập nhật tên file ảnh
                'GiaNhap' => 26000,
                'GiaBan' => 32000, // Giá có thể cần điều chỉnh
                'NamXuatBan' => 2023,
                'MoTa' => 'Sách giáo khoa Khoa Học Tự Nhiên lớp 8, bộ Chân Trời Sáng Tạo.',
                'SoLuong' => 70,
                'TrangThai' => 1,
                'LuotMua' => 300,
                'slug' => Str::slug('Khoa Học Tự Nhiên 8 (Chân Trời Sáng Tạo)'),
                'category_id' => 3, // ID: Sách Giáo Khoa Lớp 8
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Khoa Lớp 9 (Lưu ý: Chương trình 2018 chưa triển khai cho lớp 9 THCS, đây là dữ liệu giả định hoặc theo chương trình cũ)
            [
                'TenSach' => 'Toán 9 - Tập 1 (Chương trình 2006)', // Dùng tên rõ ràng hơn
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sgk_toan9_t1_2006.jpg',
                'GiaNhap' => 18000,
                'GiaBan' => 22000,
                'NamXuatBan' => 2020, // Năm xuất bản gần đây nhất cho CT cũ
                'MoTa' => 'Sách giáo khoa Toán lớp 9, tập một, theo chương trình hiện hành (2006).',
                'SoLuong' => 150,
                'TrangThai' => 1,
                'LuotMua' => 250,
                'slug' => Str::slug('Toán 9 - Tập 1 (Chương trình 2006)'),
                'category_id' => 4, // ID: Sách Giáo Khoa Lớp 9
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Ngữ Văn 9 - Tập 2 (Chương trình 2006)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sgk_van9_t2_2006.jpg',
                'GiaNhap' => 19000,
                'GiaBan' => 23000,
                'NamXuatBan' => 2020,
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 9, tập hai, theo chương trình hiện hành (2006).',
                'SoLuong' => 140,
                'TrangThai' => 1,
                'LuotMua' => 240,
                'slug' => Str::slug('Ngữ Văn 9 - Tập 2 (Chương trình 2006)'),
                'category_id' => 4, // ID: Sách Giáo Khoa Lớp 9
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Bài Tập Lớp 6-9
            [
                'TenSach' => 'Bài Tập Toán 7 - Tập 1 (Kết Nối Tri Thức)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sbt_toan7_t1_ketnoi.jpg',
                'GiaNhap' => 15000,
                'GiaBan' => 18000,
                'NamXuatBan' => 2022,
                'MoTa' => 'Sách bài tập Toán lớp 7, tập một, bộ Kết Nối Tri Thức Với Cuộc Sống.',
                'SoLuong' => 60,
                'TrangThai' => 1,
                'LuotMua' => 150,
                'slug' => Str::slug('Bài Tập Toán 7 - Tập 1 (Kết Nối Tri Thức)'),
                'category_id' => 6, // ID: Sách Bài Tập Lớp 7
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Bài Tập Tiếng Anh 8 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sbt_ta8_chantroi.jpg',
                'GiaNhap' => 16000,
                'GiaBan' => 20000,
                'NamXuatBan' => 2023,
                'MoTa' => 'Sách bài tập Tiếng Anh lớp 8, bộ Chân Trời Sáng Tạo.',
                'SoLuong' => 50,
                'TrangThai' => 1,
                'LuotMua' => 130,
                'slug' => Str::slug('Bài Tập Tiếng Anh 8 (Chân Trời Sáng Tạo)'),
                'category_id' => 7, // ID: Sách Bài Tập Lớp 8
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Viên Lớp 6-9
            [
                'TenSach' => 'Sách Giáo Viên Ngữ Văn 6 - Tập 1 (Cánh Diều)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sgv_van6_t1_canhdieu.jpg', // Cần cập nhật tên file ảnh
                'GiaNhap' => 35000,
                'GiaBan' => 45000, // SGV thường đắt hơn
                'NamXuatBan' => 2021,
                'MoTa' => 'Sách dành cho giáo viên hướng dẫn giảng dạy môn Ngữ Văn lớp 6, tập 1, bộ Cánh Diều.',
                'SoLuong' => 30,
                'TrangThai' => 1,
                'LuotMua' => 50, // Lượt mua SGV thường ít hơn
                'slug' => Str::slug('Sách Giáo Viên Ngữ Văn 6 - Tập 1 (Cánh Diều)'),
                'category_id' => 9, // ID: Sách Giáo Viên Lớp 6
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Sử dụng Eloquent model để insert dữ liệu.
        // Sach::insert() hiệu quả cho việc insert hàng loạt và bỏ qua Eloquent events,
        // bao gồm cả việc tự động tạo slug trong model nếu bạn dùng Model::create().
        Sach::insert($books);
    }
}
