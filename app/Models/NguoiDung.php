<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    protected $table = 'nguoi_dung';

    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
        'email',
        'so_dien_thoai',
    ];

    protected $hidden = [
        'password',
    ];

    public function hoaDon()
    {
        return $this->hasMany(HoaDon::class, 'user_id');
    }

    public function phieuNhap()
    {
        return $this->hasMany(PhieuNhap::class, 'user_id');
    }
}
