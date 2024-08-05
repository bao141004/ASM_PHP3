<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGia extends Model
{
    use HasFactory;
    protected $fillable =[
        'ma_giam_gia',
        'noi_dung',
        'gia',
        'ngay_het_han',
    ];
    protected $table ='giam_gia';
}
