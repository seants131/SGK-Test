<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    protected $table = 'phieu_nhap';

    protected $fillable = [
        'user_id',
        'ngay_nhap',
        'tong_tien',
        'tong_so_luong',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'user_id');
    }

    public function chiTietNhapSach()
    {
        return $this->hasMany(ChiTietNhapSach::class, 'phieu_nhap_id');
    }
}
