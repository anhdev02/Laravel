<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'tuyen',
        'ga_len',
        'ga_xuong',
        'so_luong',
        'so_dien_thoai',
        'thanh_tien',
        'thoi_gian_dat',
    ];
}
