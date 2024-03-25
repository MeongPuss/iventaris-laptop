<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'units';
    protected $fillable = [
        'unit_id',
        'nama_unit',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function unitsChild()
    {
        return $this->hasMany(Unit::class, 'unit_id');
    }

    public function unitsParent()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
