<?php

use App\Http\Controllers\SportController;
use App\Models\Sport;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () { //pour avoir une page d'accueil
    $sports = Sport::all();
    return view('sport/sport', ['sports' => $sports]);
});

Route::get('sport', [SportController::class,'index']) -> name('sport.index');
