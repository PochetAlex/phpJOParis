<?php

use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'accueil'])->name('accueil');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/aPropos', [HomeController::class, 'aPropos'])->name('aPropos');


Route::get('sport', [SportController::class,'index']) -> name('sport.index');
