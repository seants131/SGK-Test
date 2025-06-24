<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Bảng người dùng
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

        // Bảng nhà xuất bản
        Schema::create('nha_xuat_ban', function (Blueprint $table) {
            $table->id();
            $table->string('ten')->unique();
            $table->string('dia_chi')->nullable();
            $table->string('so_dien_thoai')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        // Bảng sách
        Schema::create('sach', function (Blueprint $table) {
            $table->bigIncrements('MaSach'); // Thay vì id
            $table->string('TenSach')->nullable();
            $table->string('slug')->nullable();
            $table->enum('LoaiSanPham', ['sach_giao_khoa', 'sach_tham_khao'])->nullable();
            $table->string('TacGia')->nullable();
            $table->unsignedBigInteger('GiaBia')->nullable();
            $table->integer('SoLuong')->default(0);
            $table->integer('NamXuatBan')->nullable();
            $table->text('MoTa')->nullable();
            $table->tinyInteger('TrangThai')->default(1);
            $table->integer('LuotMua')->default(0);
            $table->text('HinhAnh')->nullable();
            $table->enum('Lop', ['1','2','3','4','5','6','7','8','9','10','11','12'])->nullable();
            $table->unsignedTinyInteger('chiet_khau')->default(0);

            $table->unsignedBigInteger('nha_xuat_ban_id')->nullable();
            $table->foreign('nha_xuat_ban_id')->references('id')->on('nha_xuat_ban')->nullOnDelete();

            $table->timestamps();

            $table->index('TenSach');
            $table->index('slug');
        });

        // Bảng phiếu nhập
        Schema::create('phieu_nhap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('nguoi_dung')->nullOnDelete();
            $table->date('ngay_nhap');
            $table->unsignedBigInteger('tong_tien')->default(0);
            $table->integer('tong_so_luong')->default(0);
            $table->timestamps();
        });

        // Bảng chi tiết nhập sách
        Schema::create('chi_tiet_nhap_sach', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phieu_nhap_id')->constrained('phieu_nhap')->onDelete('cascade');

            $table->unsignedBigInteger('sach_id');
            $table->foreign('sach_id')->references('MaSach')->on('sach')->onDelete('cascade');

            $table->integer('so_luong');
            $table->unsignedBigInteger('thanh_tien');
            $table->timestamps();
        });

        // Bảng khuyến mãi
        Schema::create('khuyen_mai', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->unsignedTinyInteger('phan_tram_giam');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->enum('trang_thai', ['kich_hoat', 'tat'])->default('kich_hoat');
            $table->timestamps();
        });

        // Bảng hóa đơn
        Schema::create('hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('nguoi_dung')->nullOnDelete();
            $table->date('ngay_mua');
            $table->enum('trang_thai', ['cho_xu_ly', 'dang_giao', 'hoan_thanh', 'huy'])->default('cho_xu_ly');
            $table->enum('hinh_thuc_thanh_toan', ['tien_mat', 'chuyen_khoan'])->default('tien_mat');
            $table->unsignedTinyInteger('giam_gia')->default(0);
            $table->unsignedBigInteger('tong_tien')->default(0);
            $table->integer('tong_so_luong')->default(0);
            $table->foreignId('khuyen_mai_id')->nullable()->constrained('khuyen_mai')->nullOnDelete();
            $table->timestamps();
        });

        // Bảng chi tiết hóa đơn
        Schema::create('chi_tiet_hoa_don', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hoa_don_id')->constrained('hoa_don')->onDelete('cascade');

            $table->unsignedBigInteger('sach_id');
            $table->foreign('sach_id')->references('MaSach')->on('sach')->onDelete('cascade');

            $table->integer('so_luong');
            $table->unsignedBigInteger('don_gia');
            $table->unsignedBigInteger('thanh_tien');
            $table->timestamps();
        });

        // Bảng liên hệ
        Schema::create('lien_he', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('email');
            $table->string('so_dien_thoai')->nullable();
            $table->text('noi_dung');
            $table->boolean('trang_thai')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lien_he');
        Schema::dropIfExists('chi_tiet_hoa_don');
        Schema::dropIfExists('hoa_don');
        Schema::dropIfExists('khuyen_mai');
        Schema::dropIfExists('chi_tiet_nhap_sach');
        Schema::dropIfExists('phieu_nhap');
        Schema::dropIfExists('sach');
        Schema::dropIfExists('nha_xuat_ban');
        Schema::dropIfExists('nguoi_dung');
    }
};
