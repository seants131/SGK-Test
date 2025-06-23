<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    protected $table = 'sach';
    protected $primaryKey = 'MaSach';

    protected $fillable = [
        'TenSach',
        'slug',
        'LoaiSanPham',
        'TacGia',
        'GiaBia',
        'SoLuong',
        'NamXuatBan',
        'MoTa',
        'TrangThai',
        'LuotMua',
        'HinhAnh',
        'Lop',
        'chiet_khau',
        'nha_xuat_ban_id',
    ];

    public function chiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'sach_id', 'MaSach');
    }

    public function chiTietNhapSach()
    {
        return $this->hasMany(ChiTietNhapSach::class, 'sach_id', 'MaSach');
    }

    public function nhaXuatBan()
    {
        return $this->belongsTo(NhaXuatBan::class, 'nha_xuat_ban_id');
    }
}
