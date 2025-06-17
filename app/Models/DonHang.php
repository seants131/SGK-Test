<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'hoa_don';
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'ngay_mua',
        'trang_thai',
        'hinh_thuc_thanh_toan',
        'giam_gia',
        'tong_tien',
        'tong_so_luong',
        'khuyen_mai_id',
    ];

    protected $casts = [
        'ngay_mua' => 'date',
        'giam_gia' => 'integer',
        'tong_tien' => 'integer',
        'tong_so_luong' => 'integer',
    ];
    // tốt nhất nên có các model: khachHang,khuyenmai,chitietdonhang
    // Quan hệ: đơn hàng thuộc về người dùng
    public function khachHang()
    {
        return $this->belongsTo(khachHang::class, 'user_id');
    }

    // Quan hệ: đơn hàng có thể gắn với 1 khuyến mãi
    // public function khuyenMai()
    // {
    //     return $this->belongsTo(KhuyenMai::class, 'khuyen_mai_id');
    // }

    // Nếu có bảng chi tiết đơn hàng
    // public function chiTietDonHang()
    // {
    //     return $this->hasMany(ChiTietDonHang::class, 'hoa_don_id');
    // }
}
