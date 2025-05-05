<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'capital_city',
        'ruler_type',
        'ruler_title',
        'establishment_date',
        'area_sqkm',
        'population',
    ];

    protected $casts = [
        'establishment_date' => 'date',
        'area_sqkm' => 'decimal:2',
        'population' => 'integer',
    ];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function parlimens()
    {
        return $this->hasMany(Parlimen::class);
    }

    public function duns()
    {
        return $this->hasMany(Dun::class);
    }

    public function pbts()
    {
        return $this->hasMany(Pbt::class);
    }
} 