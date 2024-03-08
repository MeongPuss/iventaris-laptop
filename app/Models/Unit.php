<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'units';
    protected $fillable = [
        'nama_unit',
    ];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function itSupport(): BelongsToMany
    {
        return $this->belongsToMany(Itsupport::class, 'unit_itsupport', 'unit_id', 'its_id');
    }
}
