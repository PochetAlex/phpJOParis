<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $sports = Sport::all(); // stocke dans la variable sports, les objets sport récupérés dans la table sports de la base de données.
        return view('sports.index', ['sports' => $sports]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('sports.create', ['titre' => "Création d'un sport"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'annee_ajout' => 'required',
                'nb_disciplines' => 'required',
                'nb_epreuves' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données
        $sport = new Sport;

        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;

        $sport->save();

        // redirection vers la page qui affiche la liste des sports
        return redirect()->route('sports.index', ['titre' => "Liste des sports"])
            ->with('msg', 'Sport ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id) {
        $sport = Sport::find($id);
        $titre = $request->get('action', 'show') == 'show' ? "Détails d'un sport" : "Suppression d'un sport";
        return view('sports.show', ['titre' => $titre, 'sport' => $sport,
            'action' => $request->get('action', 'show')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {
        $sport = Sport::findOrFail($id);
        return view('sports.edit', ['titre' => "Modification d'un sport", 'sport' => $sport]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        if ($request->input('action', 'Valide') == "Annule") {
            return redirect()->route('sports.index', ['titre' => "Liste des sports"])
                ->with('msg', 'Modification annulée');
        }
        $sport = Sport::find($id);

        // validation des données de la requête
        $this->validate(
            $request,
            [
                'nom' => 'required',
                'description' => 'required',
                'annee_ajout' => 'required',
                'nb_disciplines' => 'required',
                'nb_epreuves' => 'required',
                'date_debut' => 'required',
                'date_fin' => 'required',
            ],
            [
                'required' => 'Le champ :attribute est obligatoire'
            ]
        );

        // code exécuté uniquement si les données sont validées
        // sinon un message d'erreur est renvoyé vers l'utilisateur

        // préparation de l'enregistrement à stocker dans la base de données

        $sport = new Sport;

        $sport->nom = $request->nom;
        $sport->description = $request->description;
        $sport->annee_ajout = $request->annee_ajout;
        $sport->nb_disciplines = $request->nb_disciplines;
        $sport->nb_epreuves = $request->nb_epreuves;
        $sport->date_debut = $request->date_debut;
        $sport->date_fin = $request->date_fin;

        // insertion de l'enregistrement dans la base de données
        $sport->update();

        // redirection vers la page qui affiche la liste des tâches
        return redirect()->route('sports.index', ['titre' => "Liste des sports"])
            ->with('msg', 'Sport modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id) {
        if ($request->delete == 'valide') {
            $sport = Sport::find($id);
            $sport->delete();
            return redirect()->route('sports.index')
                ->with('msg', 'Sport supprimée avec succès');

        } else {
            return redirect()->route('sports.index')
                ->with('msg', 'Suppression sport annulée');
        }
    }

}
