<?php

namespace App\Http\Controllers;

use App\Models\ChampionsLeague;

class ChampionsLeagueController extends Controller
{
    public function index()
    {
        $champions = ChampionsLeague::latest()->take(9)->get();
        return view('champions', compact('champions'));
    }

    public function show($id)
{
    $champions = ChampionsLeague::findOrFail($id);
    return view('champions.show', compact('champions'));
}
}
