<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laptop extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laptops';
    protected $fillable = [
        'sn',
        'tipe',
        'merek',
        'garansi',
        'processor',
        'ram',
        'penyimpanan',
        'remote',
        'status',
    ];
}
