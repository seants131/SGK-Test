<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class, // Tên class của 01_CategorySeeder.php
            BookSeeder::class,     // Tên class của 02_BookSeeder.php
            SachSeeder::class,
            // UserSeeder::class, // Ví dụ nếu bạn có UserSeeder
        ]);
    }
}