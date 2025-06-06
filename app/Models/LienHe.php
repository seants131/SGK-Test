<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LienHe extends Model
{
    use HasFactory;

    protected $table      = 'lienhe';   // đúng tên bảng migration
    protected $primaryKey = 'id';
    public    $incrementing = true;

    protected $fillable = [
        'hoten',
        'email',
        'chude',
        'noidung',
    ];
}
