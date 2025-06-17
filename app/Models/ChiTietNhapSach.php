<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhapSach extends Model
{
    protected $table = 'chi_tiet_nhap_sach';

    protected $fillable = [
        'phieu_nhap_id',
        'sach_id',
        'so_luong',
        'chiet_khau',
        'thanh_tien',
    ];

    public function phieuNhap()
    {
        return $this->belongsTo(PhieuNhap::class);
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'MaSach');
    }
}
