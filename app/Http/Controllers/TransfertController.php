<?php

namespace App\Http\Controllers;

use App\Models\Transfert;

class TransfertController extends Controller
{   
    public function index()
    {
        $transferts = Transfert::latest()->take(9)->get();
        return view('transferts', compact('transferts'));
    }

    public function show($id)
    {
        $transferts = Transfert::findOrFail($id);
        return view('transfert.show', compact('transferts'));
    }
}

