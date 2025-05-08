<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    // Định nghĩa bảng sử dụng
    protected $table = 'khachhang';

    // Nếu cần, bạn có thể chỉ định các trường có thể gán giá trị
    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'dia_chi',
    ];
}
