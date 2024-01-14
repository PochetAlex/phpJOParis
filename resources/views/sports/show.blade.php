<x-layout titre="Affiche un sport">

    <h1>{{$titre}}</h1>
    <div class="container">
        <div> Sport #{{$sport->id}}</div>
        <div>{{$sport->nom}}</div>
        <div>{{$sport->description}}</div>
        <div>{{$sport->annee_ajout}}</div>
        <div>{{$sport->nb_disciplines}}</div>
        <div>{{$sport->nb_epreuves}}</div>
        <div>{{$sport->date_debut ? $sport->date_debut->format('d m Y') : ''}}</div>
        <div>{{$sport->date_fin ? $sport->date_fin->format('d m Y') : ''}}</div>
        <div class="sport-des">
            <img class="image" src="{{url('storage/'.$sport->url_media)}}" alt="image sport">
        </div>
        <!-- Bouton de modification -->
        @if(auth()->user()->isAdmin() || auth()->user()->id === $sport->user_id)
            <div>
                <a href="{{route('sports.edit', ['sport' => $sport->id])}}">Modifier</a>
            </div>
        @endif

        <!-- Bouton de suppression -->
        @if(auth()->user()->isAdmin() || auth()->user()->id === $sport->user_id)
            <div>
                <form action="{{ route('sports.destroy', ['sport' => $sport->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce sport?')">Supprimer</button>
                </form>
            </div>
        @endif
        <div>
            <a href="{{route('sports.index')}}">Retour à la liste</a>
        </div>

    </div>
</x-layout>
