<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;

class VideoController extends Controller
{
    public function index()
{
    $videos = Videos::latest()->paginate(9);
    return view('videos', compact('videos'));
}
}
