<?php

namespace App\Http\Controllers;

use App\Models\Palmarès;

class PalmaresController extends Controller
{
    public function index()
    {
        $palmares = Palmarès::latest()->paginate(9);
        return view('palmares', compact('palmares'));
    }

    public function show($id)
{
    $palmares = Palmarès::findOrFail($id);
    return view('palmares.show', compact('palmares'));
}

}
