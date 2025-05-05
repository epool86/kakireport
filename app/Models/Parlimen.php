<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parlimen extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'state_id',
        'electorate_count',
        'mp_name',
        'mp_party',
        'last_election_date',
        'creation_date',
        'last_redelineation_date',
    ];

    protected $casts = [
        'electorate_count' => 'integer',
        'last_election_date' => 'date',
        'creation_date' => 'date',
        'last_redelineation_date' => 'date',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function duns()
    {
        return $this->hasMany(Dun::class);
    }
} 