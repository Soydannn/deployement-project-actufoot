<?php

namespace App\Http\Controllers;

use App\Models\ChampionsLeague;

class ChampionsLeagueController extends Controller
{
    public function index()
    {
        $champions = ChampionsLeague::latest()->take(9)->get();
        return view('championsleague.index', compact('champions'));
    }

    public function show($id)
{
    $champions = ChampionsLeague::findOrFail($id);
    return view('championsleague.show', compact('champions'));
}
}
