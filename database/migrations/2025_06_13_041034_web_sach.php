<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->enum('role', ['admin', 'khach'])->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('so_dien_thoai')->unique()->nullable();
            $table->timestamps();

            $table->index('email');
            $table->index('so_dien_thoai');
        });

        Schema::create('danhmuc', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('danhmuc')->onDelete('cascade');
        });

        Schema::create('sach', function (Blueprint $table) {
            $table->id();
            $table->string('TenSach')->nullable();
            $table->string('slug')->nullable();
            $table->foreignId('category_id')->nullable()->constrained('danhmuc')->nullOnDelete();
            $table->string('TacGia')->nullable();
            $table->unsignedBigInteger('GiaBan')->nullable();
            $table->integer('SoLuong')->default(0);
            $table->integer('NamXuatBan')->nullable();
            $table->text('MoTa')->nullable();
            $table->tinyInteger('TrangThai')->default(1);
            $table->integer('LuotMua')->default(0);
            $table->text('HinhAnh')->nullable();
            $table->text('NXB')->nullable();
            $table->text('Lop')->nullable();
            $table->timestamps();

            $table->index('TenSach');
            $table->index('slug');
        });

        Schema::create('phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('nguoi_dung')->nullOnDelete();
            $table->date('ngay_nhap');
            $table->unsignedBigInteger('tong_tien')->default(0);
            $table->integer('tong_so_luong')->default(0);
            $table->timestamps();
        });

        Schema::create('chi_tiet_nhap_sach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_nhap_id')->constrained('phieu_nhap')->onDelete('cascade');
            $table->foreignId('sach_id')->constrained('sach')->onDelete('cascade');
            $table->integer('so_luong');
            $table->unsignedBigInteger('gia_nhap');
            $table->unsignedBigInteger('thanh_tien');
            $table->timestamps();
        });

        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('nguoi_dung')->nullOnDelete();
            $table->date('ngay_mua');
            $table->enum('trang_thai', ['cho_xu_ly', 'dang_giao', 'hoan_thanh', 'huy'])->default('cho_xu_ly');
            $table->enum('hinh_thuc_thanh_toan', ['tien_mat', 'chuyen_khoan'])->default('tien_mat');
            $table->unsignedBigInteger('tong_tien')->default(0);
            $table->integer('tong_so_luong')->default(0);
            $table->timestamps();
        });

        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoa_don_id')->constrained('hoa_don')->onDelete('cascade');
            $table->foreignId('sach_id')->constrained('sach')->onDelete('cascade');
            $table->integer('so_luong');
            $table->unsignedBigInteger('don_gia');
            $table->unsignedBigInteger('thanh_tien');
            $table->timestamps();
        });

        Schema::create('lien_he', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('email');
            $table->string('so_dien_thoai')->nullable();
            $table->text('noi_dung');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lien_he');
        Schema::dropIfExists('chi_tiet_hoa_don');
        Schema::dropIfExists('hoa_don');
        Schema::dropIfExists('chi_tiet_nhap_sach');
        Schema::dropIfExists('phieu_nhap');
        Schema::dropIfExists('sach');
        Schema::dropIfExists('danhmuc');
        Schema::dropIfExists('nguoi_dung');
    }
};
