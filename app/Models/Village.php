<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Village extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'pbt_id',
        'tua_kampung',
        'population',
        'establishment_date',
    ];

    protected $casts = [
        'population' => 'integer',
        'establishment_date' => 'date',
    ];

    public function pbt()
    {
        return $this->belongsTo(Pbt::class);
    }
} 