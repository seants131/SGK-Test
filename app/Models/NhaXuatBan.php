<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NhaXuatBan extends Model
{
    protected $table = 'nha_xuat_ban';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ten',
        'dia_chi',
        'so_dien_thoai',
        'email',
    ];

    public function sach()
    {
        return $this->hasMany(Sach::class, 'nha_xuat_ban_id');
    }
}
