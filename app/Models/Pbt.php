<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pbt extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'district_id',
        'state_id',
        'president_name',
        'president_title',
        'area_sqkm',
        'population',
        'establishment_date',
    ];

    protected $casts = [
        'area_sqkm' => 'decimal:2',
        'population' => 'integer',
        'establishment_date' => 'date',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function administrativeDivisions()
    {
        return $this->hasMany(AdministrativeDivision::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }
} 