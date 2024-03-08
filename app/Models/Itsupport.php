<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itsupport extends Authenticatable
{
    use HasFactory, SoftDeletes, HasFactory;

    protected $table = 'itsupports';
    protected $fillable = [
        'nip',
        'nama_it',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function units(): BelongsToMany
    {
        return $this->belongsToMany(Unit::class, 'unit_itsupport', 'its_id', 'unit_id');
    }
}
