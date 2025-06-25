<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class ChampionsLeague extends Model
{
    use Translatable;

    protected $translatable = ['titre', 'contenu'];

    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'categorie'
    ];
}
