<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemons';

    protected $fillable = [
        'name',
        'hp',
        'attack',
        'defense',
        'special_attack',
        'special_defense',
        'speed',
        'image',
    ];

    protected $casts = [
        'hp' => 'integer',
        'attack' => 'integer',
        'defense' => 'integer',
        'special_attack' => 'integer',
        'special_defense' => 'integer',
        'speed' => 'integer',
    ];
}

