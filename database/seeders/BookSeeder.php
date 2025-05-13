<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// database/seeders/BookSeeder.php (ví dụ)
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            // Sách Giáo Khoa Lớp 6
            [
                'TenSach' => 'Toán 6 - Tập 1 (Kết Nối Tri Thức)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Hà Huy Khoái)',
                'HinhAnh' => 'sgk_toan6_t1_ketnoi.jpg',
                'GiaBan' => 25000,
                'NamXuatBan' => 2021,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Toán lớp 6, tập một, bộ Kết Nối Tri Thức Với Cuộc Sống.',
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
                'GiaBan' => 28000,
                'NamXuatBan' => 2021,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 6, tập hai, bộ Chân Trời Sáng Tạo.',
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
                'GiaBan' => 30000,
                'NamXuatBan' => 2021,
                'NhaXuatBan' => 'Nhà Xuất Bản Đại Học Sư Phạm TP. Hồ Chí Minh',
                'MoTa' => 'Sách giáo khoa Khoa Học Tự Nhiên lớp 6, bộ Cánh Diều.',
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
                'GiaBan' => 26000,
                'NamXuatBan' => 2022,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Toán lớp 7, tập một, bộ Chân Trời Sáng Tạo.',
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
                'GiaBan' => 29000,
                'NamXuatBan' => 2022,
                'NhaXuatBan' => 'Nhà Xuất Bản Đại Học Sư Phạm',
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 7, tập một, bộ Cánh Diều.',
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
                'GiaBan' => 27000,
                'NamXuatBan' => 2023,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Toán lớp 8, tập hai, bộ Kết Nối Tri Thức Với Cuộc Sống.',
                'LuotMua' => 320,
                'slug' => Str::slug('Toán 8 - Tập 2 (Kết Nối Tri Thức)'),
                'category_id' => 3, // ID: Sách Giáo Khoa Lớp 8
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Vật Lí 8 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả (Tổng Chủ biên: Vũ Văn Hùng)',
                'HinhAnh' => 'sgk_ly8_chantroi.jpg',
                'GiaBan' => 24000,
                'NamXuatBan' => 2023,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Vật Lí lớp 8, bộ Chân Trời Sáng Tạo.',
                'LuotMua' => 300,
                'slug' => Str::slug('Vật Lí 8 (Chân Trời Sáng Tạo)'),
                'category_id' => 3, // ID: Sách Giáo Khoa Lớp 8
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Khoa Lớp 9 (Lưu ý: Chương trình 2018 chưa triển khai cho lớp 9 THCS, đây là dữ liệu giả định hoặc theo chương trình cũ)
            [
                'TenSach' => 'Toán 9 - Tập 1 (Chương trình 2006)', // Dùng tên rõ ràng hơn
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sgk_toan9_t1_2006.jpg',
                'GiaBan' => 22000,
                'NamXuatBan' => 2020, // Năm xuất bản gần đây nhất cho CT cũ
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Toán lớp 9, tập một, theo chương trình hiện hành (2006).',
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
                'GiaBan' => 23000,
                'NamXuatBan' => 2020,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách giáo khoa Ngữ Văn lớp 9, tập hai, theo chương trình hiện hành (2006).',
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
                'GiaBan' => 18000,
                'NamXuatBan' => 2022,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách bài tập Toán lớp 7, tập một, bộ Kết Nối Tri Thức Với Cuộc Sống.',
                'LuotMua' => 150,
                'slug' => Str::slug('Bài Tập Toán 7 - Tập 1 (Kết Nối Tri Thức)'),
                'category_id' => 5, // ID: Sách Bài Tập Lớp 6-9
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'TenSach' => 'Bài Tập Tiếng Anh 8 (Chân Trời Sáng Tạo)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sbt_ta8_chantroi.jpg',
                'GiaBan' => 20000,
                'NamXuatBan' => 2023,
                'NhaXuatBan' => 'Nhà Xuất Bản Giáo Dục Việt Nam',
                'MoTa' => 'Sách bài tập Tiếng Anh lớp 8, bộ Chân Trời Sáng Tạo.',
                'LuotMua' => 130,
                'slug' => Str::slug('Bài Tập Tiếng Anh 8 (Chân Trời Sáng Tạo)'),
                'category_id' => 5, // ID: Sách Bài Tập Lớp 6-9
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Sách Giáo Viên Lớp 6-9
            [
                'TenSach' => 'Sách Giáo Viên Ngữ Văn 6 (Cánh Diều)',
                'TacGia' => 'Nhiều tác giả',
                'HinhAnh' => 'sgv_van6_canhdieu.jpg',
                'GiaBan' => 45000, // SGV thường đắt hơn
                'NamXuatBan' => 2021,
                'NhaXuatBan' => 'Nhà Xuất Bản Đại Học Sư Phạm',
                'MoTa' => 'Sách dành cho giáo viên hướng dẫn giảng dạy môn Ngữ Văn lớp 6, bộ Cánh Diều.',
                'LuotMua' => 50, // Lượt mua SGV thường ít hơn
                'slug' => Str::slug('Sách Giáo Viên Ngữ Văn 6 (Cánh Diều)'),
                'category_id' => 6, // ID: Sách Giáo Viên Lớp 6-9
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('sach')->insert($books); // Giả sử bảng sách của bạn tên là 'sach'
    }
}
