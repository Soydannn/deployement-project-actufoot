<?php

namespace App\Http\Controllers;

use App\Models\NationsLeague;

class NationsLeagueController extends Controller
{
    public function index()
    {
        $nations = NationsLeague::latest()->paginate(9);
        return view('nationsleague.index', compact('nations'));
    }
    
    public function show($id) {
        $nations = NationsLeague::findOrFail($id);
        return view('nationsleague.show', compact('nations'));
    }
}
