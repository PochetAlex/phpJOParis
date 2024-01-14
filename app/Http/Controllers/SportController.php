<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $cat = $request->input('cat', null);
        $value = $request->cookie('cat', null);
        if (!isset($cat)) {
            if (!isset($value)) {
                $sports = Sport::all();
                $cat = 'All';
                Cookie::expire('cat');
            } else {
                $sports = Sport::where('nb_disciplines', $value)->get();
                $cat = $value;
                Cookie::queue('cat', $cat, 10);            }
        } else {
            if ($cat == 'All') {
                $sports = Sport::all();
                Cookie::expire('cat');
            } else {
                $sports = Sport::where('nb_disciplines', $cat)->get();
                Cookie::queue('cat', $cat, 10);
            }
        }
        $nb_disciplines = Sport::distinct('nb_disciplines')->pluck('nb_disciplines');
        return view('sports.index',
            ['titre' => "Liste des sports", 'sports' => $sports, 'cat' => $cat, 'nb_disciplines' => $nb_disciplines]);
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
        $sport->user_id = $request->user()->id;

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
        $this->authorize('update', $sport); // Vérifie si l'utilisateur a le droit de modifier ce sport
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
        $sport = Sport::find($id);
        $this->authorize('delete', $sport); // Vérifie si l'utilisateur a le droit de supprimer ce sport
        if (isset($sport->url_media) && $sport->url_media != "images/alistar.png") {
            Storage::delete($sport->url_media);
        }
        $sport->delete();
        return redirect()->route('sports.index')
            ->with('msg', 'Sport supprimé avec succès');
    }

    public function upload(Request $request, $id) {
        $sport = Sport::findOrFail($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
        } else {
            if (!$request->hasFile('image'))
                $msg = "Aucun fichier téléchargé";
            else
                $msg = "fichier mal téléchargé";
            return redirect()->route('sports.show', [$sport->id])
                ->with('msg', 'Sport non modifiée (' . $msg . ')');
        }
        $nom = 'image';
        $now = time();
        $nom = sprintf("%s_%d.%s", $nom, $now, $file->extension());

        $file->storeAs('images', $nom);
        if (isset($sport->url_media) && $sport->url_media != "images/alistar.png") {
            Storage::delete($sport->url_media);
        }
        $sport->url_media = 'images/' . $nom;
        $sport->save();

        return redirect()->route('sports.show', [$sport->id])
            ->with('msg', 'Image du sport modifiée avec succès');
    }


}
