<?php

namespace App\Http\Controllers;
use App\Models\Transfert;
use App\Models\ChampionsLeague;
use App\Models\NationsLeague;
use App\Models\Palmares;
use App\Models\Video;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Recherche dans Transferts (joueur = titre, description = contenu)
        $transferts = Transfert::where('joueur', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        // Recherche dans Champions
        $champions = ChampionsLeague::where('titre', 'like', "%$query%")
            ->orWhere('contenu', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        // Recherche dans Nations
        $nations = NationsLeague::where('titre', 'like', "%$query%")
            ->orWhere('contenu', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        // Recherche dans Palmares
        $palmares = Palmares::where('equipe', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        $videos = Video::where('titre', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('search.index', compact('query', 'transferts', 'champions', 'nations', 'palmares', 'videos'));
    }
}
