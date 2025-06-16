<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table = 'lien_he';   // đúng tên bảng migration
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'noi_dung',
        'trang_thai',
    ];

    // Optional: nếu muốn dùng trạng thái rõ ràng
    protected $casts = [
        'trang_thai' => 'boolean',
    ];
}
