<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('nguoi_dung')->insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin123'), // Có thể bỏ bcrypt nếu không cần mã hóa
                'role' => 'admin',
                'email' => 'admin@example.com',
                'so_dien_thoai' => '0900000000',
                'dia_chi' => '123 Đường Nguyễn Trãi',
                'phuong_xa' => 'Phường 1',
                'quan_huyen' => 'Quận 5',
                'tinh_thanh_pho' => 'TP. Hồ Chí Minh',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Khách hàng',
                'username' => 'khach1',
                'password' => bcrypt('123456'),
                'role' => 'khach',
                'email' => 'khach1@example.com',
                'so_dien_thoai' => '0911111111',
                'dia_chi' => '456 Đường Lê Lợi',
                'phuong_xa' => 'Phường Bến Thành',
                'quan_huyen' => 'Quận 1',
                'tinh_thanh_pho' => 'TP. Hồ Chí Minh',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
