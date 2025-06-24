<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaXuatBanSeeder extends Seeder
{
    public function run(): void
    {
        $nxbList = [
            'Nhà xuất bản Giáo Dục Việt Nam',
            'Nhà xuất bản Đại học Sư phạm',
            'Nhà xuất bản Đại học Sư phạm TP.HCM',
            'Nhà xuất bản Đại học Huế',
            'Nhà xuất bản Đại học Vinh',
            'Nhà xuất bản Đại học Quốc gia Hà Nội',
            'Nhà xuất bản Đại học Quốc gia TP.HCM',
            'Nhà xuất bản Tổng hợp TP.HCM',
        ];

        foreach ($nxbList as $ten) {
            DB::table('nha_xuat_ban')->insert([
                'ten' => $ten,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
