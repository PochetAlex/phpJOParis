<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Liste des sports</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<x-layout titre="La liste des sports">
    <div class="main-container">
        <div class="entete">
            <h1>Liste des sports</h1>
            <button class="aDroite"><a href="{{route('sports.create')}}">Ajouter</a></button>
        </div>
        @if(!empty($sports))
            <div>
                <table>
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Description</td>
                        <td>Année d'ajout</td>
                        <td>Nombre de disciplines</td>
                        <td>Nombre d'épreuves</td>
                        <td>Date de debut</td>
                        <td>Date de fin</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sports as $sport)
                        <tr>
                            <td>{{$sport->id}}</td>
                            <td>{{$sport->nom}}</td>
                            <td>{{$sport->description}}</td>
                            <td>{{$sport->annee_ajout}}</td>
                            <td>{{$sport->nb_disciplines}}</td>
                            <td>{{$sport->nb_epreuves}}</td>
                            <td>{{$sport->date_debut}}</td>
                            <td>{{$sport->date_fin}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h3>aucun sport</h3>
        @endif
    </div>
</x-layout>

