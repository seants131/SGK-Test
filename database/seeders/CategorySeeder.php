<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Sách Giáo Khoa Lớp 6', 'slug' => Str::slug('Sách Giáo Khoa Lớp 6'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Sách Giáo Khoa Lớp 7', 'slug' => Str::slug('Sách Giáo Khoa Lớp 7'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Sách Giáo Khoa Lớp 8', 'slug' => Str::slug('Sách Giáo Khoa Lớp 8'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Sách Giáo Khoa Lớp 9', 'slug' => Str::slug('Sách Giáo Khoa Lớp 9'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Sách Bài Tập Lớp 6-9', 'slug' => Str::slug('Sách Bài Tập Lớp 6-9'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Sách Giáo Viên Lớp 6-9', 'slug' => Str::slug('Sách Giáo Viên Lớp 6-9'), 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('danhmuc')->insert($categories); // Sử dụng tên bảng 'danhmuc'
    }
}
