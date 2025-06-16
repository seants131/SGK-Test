<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Sach;

class SachSeeder extends Seeder
{
    public function run(): void
    {
        $danhSachMonTheoLop = [
            1 => ['Toán', 'Tiếng Việt', 'Đạo đức', 'Tự nhiên & Xã hội', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            2 => ['Toán', 'Tiếng Việt', 'Đạo đức', 'Tự nhiên & Xã hội', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            3 => ['Toán', 'Tiếng Việt', 'Đạo đức', 'Tự nhiên & Xã hội', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            4 => ['Toán', 'Tiếng Việt', 'Đạo đức', 'Lịch sử & Địa lý', 'Khoa học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            5 => ['Toán', 'Tiếng Việt', 'Đạo đức', 'Lịch sử & Địa lý', 'Khoa học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            6 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Khoa học tự nhiên', 'Công nghệ', 'Tin học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Giáo dục công dân', 'Hoạt động trải nghiệm'],
            7 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Khoa học tự nhiên', 'Công nghệ', 'Tin học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Giáo dục công dân', 'Hoạt động trải nghiệm'],
            8 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Vật lý', 'Hóa học', 'Sinh học', 'Công nghệ', 'Tin học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Giáo dục công dân', 'Hoạt động trải nghiệm'],
            9 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Vật lý', 'Hóa học', 'Sinh học', 'Công nghệ', 'Tin học', 'Âm nhạc', 'Mỹ thuật', 'Giáo dục thể chất', 'Giáo dục công dân', 'Hoạt động trải nghiệm'],
            10 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Vật lý', 'Hóa học', 'Sinh học', 'Tin học', 'Công nghệ', 'Giáo dục kinh tế & pháp luật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            11 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Vật lý', 'Hóa học', 'Sinh học', 'Tin học', 'Công nghệ', 'Giáo dục kinh tế & pháp luật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
            12 => ['Toán', 'Ngữ văn', 'Tiếng Anh', 'Lịch sử', 'Địa lý', 'Vật lý', 'Hóa học', 'Sinh học', 'Tin học', 'Công nghệ', 'Giáo dục kinh tế & pháp luật', 'Giáo dục thể chất', 'Hoạt động trải nghiệm'],
        ];

        foreach ($danhSachMonTheoLop as $lop => $dsMon) {
            foreach ($dsMon as $mon) {
                $tenSach = "SGK $mon Lớp $lop";

                Sach::create([
                    'TenSach' => $tenSach,
                    'slug' => Str::slug($tenSach),
                    'LoaiSanPham' => 'sach_giao_khoa',
                    'TacGia' => 'Bộ GD&ĐT',
                    'GiaBia' => rand(15000, 30000),
                    'SoLuong' => rand(100, 500),
                    'NamXuatBan' => 2024,
                    'MoTa' => "Sách giáo khoa môn $mon dành cho lớp $lop theo chương trình GDPT mới.",
                    'TrangThai' => 1,
                    'LuotMua' => rand(0, 1000),
                    'HinhAnh' => 'sgk_toan6_t1_ketnoi.jpg',
                    'Lop' => (string) $lop,
                    'NXB' => 'Giáo Dục Việt Nam',
                ]);
            }
        }
    }
}
