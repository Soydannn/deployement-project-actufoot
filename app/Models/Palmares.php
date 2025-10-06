<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palmares extends Model
{
    protected $fillable = [
        'competition',
        'equipe',
        'annee',
        'image',
    ];

    protected $table = 'palmares'; 
}
