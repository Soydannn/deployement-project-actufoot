<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\ChampionsLeague;
use App\Models\Palmarès;
use App\Models\Transfert;
use App\Models\NationsLeague;
use App\Models\Videos;



class ActualiteController extends Controller
{
    public function index()
    {

        // Récupère la dernière actualité

        $lastActualite = Actualite::orderBy('created_at', 'desc')->first();
        $lastTransfert = Transfert::orderBy('created_at', 'desc')->first();
        $lastPalmares = Palmarès::orderBy('created_at', 'desc')->first();
        $lastNation = NationsLeague::orderBy('created_at', 'desc')->first();
        $lastChampion = ChampionsLeague::orderBy('created_at', 'desc')->first();
        $lastActu = Actualite::latest()->first();

        $lastItems = collect([
            $lastActualite, 
            $lastTransfert, 
            $lastPalmares, 
            $lastNation, 
            $lastChampion
        ])->filter()->sortByDesc('created_at');

        $lastArticle = $lastItems->first();




        
        // Récupère les 3 dernières actualités après la première
        $recentActus = Actualite::latest()->skip(1)->take(3)->get();
    
        // Récupère les 3 derniers transferts
        $transferts = Transfert::latest()->take(3)->get();

        // Récupère les 3 dernières Actualités de la Champions League
        $champions = ChampionsLeague::latest()->take(3)->get();

        // Récupère les 3 dernières Actualités des palmarès
        $palmares = Palmarès::latest()->take(3)->get();

          // Récupère les 3 dernières Actualités de la nation league
        $nations = NationsLeague::latest()->take(3)->get();

        $videos = Videos::latest()->take(3)->get();
    
        return view('actualites', compact('lastActu', 'recentActus', 'transferts', 'champions', 'palmares', 'nations', 'videos', 'lastArticle'));
    }

    public function show($id)
{
    // Trouver l'article par son id ou afficher erreur 404
    $article = Actualite::findOrFail($id);

    // Passer cet article à la vue 'actualites-detail'
    return view('actualites-detail', compact('article'));
}
}

