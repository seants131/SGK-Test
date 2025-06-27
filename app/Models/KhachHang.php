<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class KhachHang extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'name',
        'username',
        'password',
        'email',
        'so_dien_thoai',
        'role',

        // Địa chỉ mặc định
        'dia_chi',
        'phuong_xa',
        'quan_huyen',
        'tinh_thanh_pho',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeKhach($query)
    {
        return $query->where('role', 'khach');
    }

    public function getAuthIdentifierName()
    {
        return 'username';
    }
}
