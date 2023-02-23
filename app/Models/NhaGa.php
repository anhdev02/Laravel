<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaGa extends Model
{
    use HasFactory;
    protected $table = 'nha_gas';
    protected $fillable = [
        'thu_tu',
        'ten_nha_ga',
    ];
}