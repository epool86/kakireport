<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdministrativeDivision extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'pbt_id',
        'description',
        'establishment_date',
    ];

    protected $casts = [
        'establishment_date' => 'date',
    ];

    public function pbt()
    {
        return $this->belongsTo(Pbt::class);
    }
} 