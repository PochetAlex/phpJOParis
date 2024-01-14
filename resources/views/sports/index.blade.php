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
            <h4>Filtrage par nombres de disciplines</h4>
            <form action="{{route('sports.index')}}" method="get">
                <select name="cat">
                    <option value="All" @if($cat == 'All') selected @endif>-- N'importe quel nombre de disciplines --</option>
                    @foreach($nb_disciplines as $nb_discipline)
                        <option value="{{$nb_discipline}}" @if($cat == $nb_discipline) selected @endif>{{$nb_discipline}}</option>
                    @endforeach
                </select>
                <input type="submit" value="OK">
            </form>

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
                        <td>Nom de l'utilisateur</td>
                        <td>Image du sport</td>
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
                            <td>{{$sport->date_debut->format('D M Y')}}</td>
                            <td>{{$sport->date_fin->format('D M Y')}}</td>
                            <td>{{$sport->user->name}}</td>
                            <td><img class="image" src="{{url('storage/'.$sport->url_media)}}" alt="image tâche"></td>
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

