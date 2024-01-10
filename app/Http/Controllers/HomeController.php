<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function accueil() {
        return view('accueil', ['titre' => "Accueil",'message'=>"le ". date("d/m/y")]);
    }

    public function aPropos() {
        return view('aPropos', ['titre' => "A Propos"]);

    }
    public function contacts() {
        return view('contacts', ['titre' => "Contacts"]);

    }
}
