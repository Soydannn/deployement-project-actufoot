<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palmarès extends Model
{
    protected $fillable = [
        'competition',
        'equipe',
        'annee',
        'image',
    ];

    protected $table = 'palmares'; 
}
