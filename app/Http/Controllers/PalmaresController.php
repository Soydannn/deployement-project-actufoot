<?php

namespace App\Http\Controllers;

use App\Models\Palmares;

class PalmaresController extends Controller
{
    public function index()
    {
        $palmares = Palmares::latest()->paginate(9);
        return view('palmares', compact('palmares'));
    }

    public function show($id)
{
    $palmares = Palmares::findOrFail($id);
    return view('palmares.show', compact('palmares'));
}

}
