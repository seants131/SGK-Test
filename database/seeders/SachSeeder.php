<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SachSeeder extends Seeder
{
    public function run(): void
    {
        $boSachList = [
            'Cánh Diều',
            'Chân trời sáng tạo',
            'Cùng học để phát triển năng lực',
            'Kết nối tri thức với cuộc sống',
            'Vì sự bình đẳng và dân chủ trong giáo dục',
        ];

        $monHocList = ['Toán', 'Tiếng Việt', 'Ngữ văn', 'Tiếng Anh', 'Khoa học', 'Lịch sử', 'Địa lý'];

        $lopList = ['1', '2', '3', '4', '5', '6'];

        $nhaXuatBanIds = DB::table('nha_xuat_ban')->pluck('id')->toArray();

        foreach ($boSachList as $boSach) {
            foreach ($lopList as $lop) {
                foreach ($monHocList as $monHoc) {
                    $tenSach = "$boSach - $monHoc lớp $lop";

                    DB::table('sach')->insert([
                        'TenSach' => $tenSach,
                        'slug' => Str::slug($tenSach),
                        'LoaiSanPham' => 'sach_giao_khoa',
                        'TacGia' => 'Nhiều tác giả',
                        'GiaBia' => rand(18, 35)*1000,
                        'SoLuong' => rand(50, 300),
                        'NamXuatBan' => 2024,
                        'MoTa' => "Sách $monHoc lớp $lop thuộc bộ '$boSach', theo chương trình GDPT mới.",
                        'TrangThai' => 1,
                        'LuotMua' => rand(0, 500),
                        'HinhAnh' => '/1750125879_sgk_ngu-van-lop-6.png',
                        'Lop' => $lop,
                        'chiet_khau' => rand(0, 15),
                        'nha_xuat_ban_id' => $nhaXuatBanIds[array_rand($nhaXuatBanIds)],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
