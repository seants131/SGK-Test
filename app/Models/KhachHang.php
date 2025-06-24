<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Nếu dùng để đăng nhập
use Illuminate\Notifications\Notifiable;

class KhachHang extends Authenticatable // Kế thừa để dùng auth nếu cần
{
    use HasFactory, Notifiable;

    // Tên bảng tương ứng
    protected $table = 'nguoi_dung';

    // Các trường có thể gán hàng loạt
    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'so_dien_thoai',
        'role',
    ];

    // Nếu bạn muốn ẩn mật khẩu khi trả về JSON
    protected $hidden = [
        'password',
    ];

    // Nếu có cần casting (nếu có enum hoặc trường kiểu JSON)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Scope: chỉ lấy khách hàng (nếu muốn phân biệt)
    public function scopeKhach($query)
    {
        return $query->where('role', 'khach');
    }
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
