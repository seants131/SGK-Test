<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;


    // Đặt tên bảng (nếu bảng không tuân theo quy tắc mặc định của Laravel)
    protected $table = 'Sach';
    protected $primaryKey = 'MaSach';
    public $incrementing = false; // Khóa chính không tự tăng
    protected $keyType = 'string';
    // Các trường có thể được gán giá trị đại diện cho cột trong bảng
    protected $fillable = [
        'MaSach',
        'TenSach',
        'slug',
        'category_id',
        'GiaNhap',
        'GiaBan',
        'SoLuong',
        'NamXuatBan',
        'MoTa',
        'TrangThai',
        'LuotMua',
        'HinhAnh'
    ];

    // Nếu bảng có timestamp (created_at, updated_at), thì Laravel sẽ tự động quản lý
    public $timestamps = false;
    public function DanhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'category_id');
    }
    public function chiTietHoaDon()
    {
        return $this->hasMany(ChiTietHoaDon::class, 'MaSach');
    }
}
