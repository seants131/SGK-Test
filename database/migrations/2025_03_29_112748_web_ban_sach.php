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
            $table->id();
            $table->string('ten_sach');
            $table->foreignId('the_loai_id')->constrained('danhmuc');
            $table->foreignId('nxb_id')->constrained('nhaxuatban');
            $table->foreignId('tac_gia_id')->constrained('tacgia');
            $table->integer('nam_xuat_ban');
            $table->bigInteger('gia')->unsigned();
            $table->integer('so_luong')->default(0);
            $table->text('mo_ta')->nullable();
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
            $table->bigInteger('tong_tien')->unsigned();
            $table->timestamps();
        });

        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('don_hang_id')->constrained('donhang');
            $table->foreignId('sach_id')->constrained('sach');
            $table->integer('so_luong');
            $table->bigInteger('gia')->unsigned();
            $table->timestamps();
        });

        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('khach_hang_id')->constrained('khachhang');
            $table->foreignId('sach_id')->constrained('sach');
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
            $table->bigInteger('giam_gia')->unsigned();
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
