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
            @if($action == 'delete')
                <form action="{{route('sports.destroy',$sport->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="text-center">
                        <button type="submit" name="delete" value="valide">Valide</button>
                        <button type="submit" name="delete" value="annule">Annule</button>
                    </div>
                </form>
            @else
                <div>
                    <a href="{{route('sports.index')}}">Retour à la liste</a>
                </div>
            @endif
        </div>
    </div>
</x-layout>
