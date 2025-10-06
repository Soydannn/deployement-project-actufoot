<?php

use Illuminate\Support\Facades\Route;
use App\Models\Actualite;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\TransfertController;
use App\Http\Controllers\PalmaresController;
use App\Http\Controllers\ChampionsLeagueController;
use App\Http\Controllers\NationsLeagueController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ActualiteController::class, 'index'])->name('actualites.index');


Route::get('/transferts', [TransfertController::class, 'index'])->name('transferts.index');

Route::get('/transferts/{id}', [TransfertController::class, 'show'])->name('transferts.show');

Route::get('/palmares', [PalmaresController::class, 'index'])->name('palmares.index');
Route::get('/palmares/{id}', [PalmaresController::class, 'show'])->name('palmares.show');


Route::get('/champions', [ChampionsLeagueController::class, 'index'])->name('championsleague.index');
Route::get('/champions/{id}', [ChampionsLeagueController::class, 'show'])->name('championsleague.show');


Route::get('/nations', [NationsLeagueController::class, 'index'])->name('nationsleague.index');
Route::get('/nations/{id}', [NationsLeagueController::class, 'show'])->name('nationsleague.show');


Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');

Route::get('/search', [SearchController::class, 'search'])->name('search.index');








Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
