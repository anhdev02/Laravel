<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fake extends Model
{
    use HasFactory;
    protected $table = 'fakes';
    protected $fillable = [
        'ga_len',
        'ga_xuong',
        'so_dien_thoai',
        'thanh_tien',
        'tuyen',
    ];
}
