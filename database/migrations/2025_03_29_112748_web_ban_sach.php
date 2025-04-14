<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('danhmuc', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('danhmuc')->onDelete('cascade');
        });

        Schema::create('nhaxuatban', function (Blueprint $table) {
            $table->id();
            $table->string('ten_nxb');
            $table->text('dia_chi')->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->timestamps();
        });

        Schema::create('tacgia', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tac_gia');
            $table->timestamps();
        });

        Schema::create('sach', function (Blueprint $table) {
            $table->bigIncrements('MaSach'); // giống với PRIMARY KEY bigint(20) trong SQL
            $table->string('TenSach')->nullable();
            $table->string('slug')->nullable(); // Slug URL thân thiện
            $table->foreignId('category_id')->nullable()->constrained('danhmuc')->nullOnDelete(); // thể loại
            $table->foreignId('nxb_id')->nullable()->constrained('nhaxuatban')->nullOnDelete(); // nhà xuất bản
            $table->foreignId('tac_gia_id')->nullable()->constrained('tacgia')->nullOnDelete(); // tác giả
            $table->decimal('GiaNhap', 15, 2)->nullable();
            $table->decimal('GiaBan', 15, 2)->nullable();
            $table->integer('SoLuong')->default(0);
            $table->integer('NamXuatBan')->nullable();
            $table->text('MoTa')->nullable();
            $table->tinyInteger('TrangThai')->default(1); // 1: hiện, 0: ẩn
            $table->integer('LuotMua')->default(0);
            $table->text('HinhAnh')->nullable();
            $table->timestamps();
        });

        Schema::create('khachhang', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('email')->unique();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->text('dia_chi')->nullable();
            $table->timestamps();
        });

        Schema::create('donhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khach_hang_id')->constrained('khachhang');
            $table->date('ngay_dat');
            $table->enum('trang_thai', ['Cho xu ly', 'Dang giao', 'Hoan thanh', 'Huy']);
            $table->bigInteger('tong_tien')->unsigned(); // Giá tiền VNĐ
            $table->timestamps();
        });

        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('don_hang_id')->constrained('donhang')->onDelete('cascade');
            $table->unsignedBigInteger('sach_id'); // Sử dụng unsignedBigInteger để khớp kiểu với MaSach
            $table->foreign('sach_id')->references('MaSach')->on('sach')->onDelete('cascade'); // Đặt khóa ngoại chính xác
            $table->integer('so_luong');
            $table->bigInteger('gia')->unsigned(); // Giá tiền VNĐ
            $table->timestamps();
        });

        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khach_hang_id')->constrained('khachhang');
            $table->unsignedBigInteger('sach_id'); // Sử dụng unsignedBigInteger để khớp kiểu với MaSach
            $table->foreign('sach_id')->references('MaSach')->on('sach');
            $table->integer('so_luong');
            $table->timestamps();
        });

        Schema::create('thanhtoan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('don_hang_id')->constrained('donhang');
            $table->enum('phuong_thuc', ['Tien mat', 'Chuyen khoan', 'Vi dien tu']);
            $table->enum('trang_thai', ['Chua thanh toan', 'Da thanh toan']);
            $table->date('ngay_thanh_toan')->nullable();
            $table->timestamps();
        });

        Schema::create('khuyenmai', function (Blueprint $table) {
            $table->id();
            $table->string('ma_khuyen_mai')->unique();
            $table->bigInteger('giam_gia')->unsigned(); // Giá tiền VNĐ
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('khuyenmai');
        Schema::dropIfExists('thanhtoan');
        Schema::dropIfExists('giohang');
        Schema::dropIfExists('chitietdonhang');
        Schema::dropIfExists('donhang');
        Schema::dropIfExists('khachhang');
        Schema::dropIfExists('sach');
        Schema::dropIfExists('tacgia');
        Schema::dropIfExists('nhaxuatban');
        Schema::dropIfExists('danhmuc');
    }
};
