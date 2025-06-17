<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    protected $table = 'khuyen_mai';

    protected $fillable = [
        'ten',
        'phan_tram_giam',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
    ];

    public function hoaDon()
    {
        return $this->hasMany(HoaDon::class, 'khuyen_mai_id');
    }
}
