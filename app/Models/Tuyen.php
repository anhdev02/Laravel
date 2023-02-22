<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tuyen extends Model
{
    use HasFactory;
    protected $table = 'tuyen';
    protected $fillable = [
        'ten_tuyen',
        'thoi_gian_hd',
        'chieu_dai',
        'gia_ve_toi_thieu',
        'don_gia_ga',
        'tong_so_ga',
    ];
}
