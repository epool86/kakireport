<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dun extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'parlimen_id',
        'state_id',
        'electorate_count',
        'assemblyperson_name',
        'assemblyperson_party',
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

    public function parlimen()
    {
        return $this->belongsTo(Parlimen::class);
    }
} 