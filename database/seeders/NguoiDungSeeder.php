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
                'password' => bcrypt('admin123'), // Có thể bỏ bcrypt nếu Minh không cần hash
                'role' => 'admin',
                'email' => 'admin@example.com',
                'so_dien_thoai' => '0900000000',
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
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
