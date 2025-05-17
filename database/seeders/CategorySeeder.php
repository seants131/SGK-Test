<?php

namespace Database\Seeders;
use App\Models\DanhMuc; // Sử dụng model DanhMuc
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{
    use WithoutModelEvents; // Thêm trait này để tối ưu và tránh model events không mong muốn
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Sách Giáo Khoa Lớp 6', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Sách Giáo Khoa Lớp 7', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Sách Giáo Khoa Lớp 8', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Sách Giáo Khoa Lớp 9', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Sách Bài Tập Lớp 6', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Sách Bài Tập Lớp 7', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Sách Bài Tập Lớp 8', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Sách Bài Tập Lớp 9', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Sách Giáo Viên Lớp 6', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Sách Giáo Viên Lớp 7', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Sách Giáo Viên Lớp 8', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Sách Giáo Viên Lớp 9', 'parent_id' => null, 'created_at' => now(), 'updated_at' => now()],
        ];

        // Sử dụng Eloquent model để insert dữ liệu.
        // DanhMuc::insert() hiệu quả cho việc insert hàng loạt và bỏ qua Eloquent events,
        // tương tự DB::table()->insert(), nhưng sử dụng bảng đã được định nghĩa trong model.
        DanhMuc::insert($categories);
    }
}
