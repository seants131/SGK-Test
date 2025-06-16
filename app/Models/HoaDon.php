<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_don';

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

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'user_id');
    }

    public function khuyenMai()
    {
        return $this->belongsTo(KhuyenMai::class, 'khuyen_mai_id');
    }

    public function chiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'hoa_don_id');
    }
}
