<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'donhang';
    public $timestamps = true; 
    protected $fillable = [
        'khach_hang_id', 'ngay_dat', 'trang_thai', 'tong_tien',
    ];

    protected $casts = [
        'ngay_dat' => 'datetime',
    ];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }
}
