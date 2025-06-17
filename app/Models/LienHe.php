<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
<<<<<<< HEAD
    use HasFactory;

    protected $table = 'lien_he';   // đúng tên bảng migration
    protected $primaryKey = 'id';
    public $incrementing = true;
=======
    protected $table = 'lien_he';
>>>>>>> 4197f4c1632eef829da53cb7f42d2b531616aa57

    protected $fillable = [
        'ho_ten',
        'email',
        'so_dien_thoai',
        'noi_dung',
        'trang_thai',
<<<<<<< HEAD
    ];

    // Optional: nếu muốn dùng trạng thái rõ ràng
    protected $casts = [
        'trang_thai' => 'boolean',
=======
>>>>>>> 4197f4c1632eef829da53cb7f42d2b531616aa57
    ];
}
