<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'state_id',
        'area_sqkm',
        'population',
    ];

    protected $casts = [
        'area_sqkm' => 'decimal:2',
        'population' => 'integer',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function pbts()
    {
        return $this->hasMany(Pbt::class);
    }
} 