<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    protected $table = 'chi_tiet_hoa_don';

    protected $fillable = [
        'hoa_don_id',
        'sach_id',
        'so_luong',
        'don_gia',
        'thanh_tien',
    ];

    public function hoaDon()
    {
        return $this->belongsTo(DonHang::class, 'hoa_don_id');
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'sach_id', 'MaSach');
    }
}
