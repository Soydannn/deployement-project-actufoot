<?php

namespace App\Http\Controllers;
use App\Models\Transfert;
use App\Models\ChampionsLeague;
use App\Models\NationsLeague;
use App\Models\Palmarès;
use App\Models\Videos;
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
        $palmares = Palmarès::where('equipe', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        $videos = Videos::where('titre', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('search', compact('query', 'transferts', 'champions', 'nations', 'palmares', 'videos'));
    }
}
