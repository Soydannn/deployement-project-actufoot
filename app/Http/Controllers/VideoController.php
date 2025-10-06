<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
{
    $videos = Video::latest()->paginate(9);
    return view('videos', compact('videos'));
}
}
