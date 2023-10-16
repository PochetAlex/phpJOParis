<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index() {
        $sports = Sport::all(); // stocke dans la variable $Taches, les objets Tache récupérés dans la table taches de la base de données.
        return view('sports.index', ['sports' => $sports]);
    }
}
