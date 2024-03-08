<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryLaptop extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'history_laptops';
    protected $fillable = [
        'ba',
        'unit',
        'kembali',
        'rotasi',
        'penyerahan',
        'status',
        'laptop_id',
        'pegawai_id',
    ];

    public function laptops(): HasMany {
        return $this->hasMany(Laptop::class, 'id', 'laptop_id');
    }

    public function pegawais(): HasMany {
        return $this->hasMany(Pegawai::class, 'id', 'pegawai_id');
    }
}
