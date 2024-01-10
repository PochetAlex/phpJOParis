<x-layout :titre="$titre">
    <div class="main-container">
        <h1>{{$titre}}</h1>

        {{--
             formulaire de modification d'un sport
             la fonction 'route' utilise un nom de route
             'csrf_field' ajoute un champ caché qui permet de vérifier
               que le formulaire vient du serveur.
          --}}

        <form action="{{route('sports.update',$sport->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-create">
                {{-- le nom du sport --}}
                <div class="form-control">
                    <label class="form-label" for="nom">Nom du sport :</label>
                    <input class="form-input" type="text" id="nom" name="nom" value="{{ $sport->nom }}">
                </div>
                {{-- la description du sport --}}
                <div class="form-control">
                    <label class="form-label" for="description">Description :</label>
                    <textarea class="form-input" name="description" id="description" rows="6"
                              placeholder="Description..">{{ $sport->description }}</textarea>
                </div>
                {{-- année d'ajout --}}
                <div class="form-control">
                    <label class="form-label" for="annee_ajout">Année d'ajout :</label>
                    <input class="form-input" type="number" id="annee_ajout" name="annee_ajout"
                           value="{{ $sport->annee_ajout }}">
                </div>
                {{-- nombre de disciplines --}}
                <div class="form-control">
                    <label class="form-label" for="nb_disciplines">Nombre de disciplines :</label>
                    <input class="form-input" type="number" id="nb_disciplines" name="nb_disciplines"
                           value="{{ $sport->nb_disciplines }}">
                </div>
                {{-- nombre d'épreuves --}}
                <div class="form-control">
                    <label class="form-label" for="nb_epreuves">Nombre d'épreuves :</label>
                    <input class="form-input" type="number" id="nb_epreuves" name="nb_epreuves"
                           value="{{ $sport->nb_epreuves }}">
                </div>
                {{-- date de début --}}
                <div class="form-control">
                    <label class="form-label" for="date_debut">Date de début :</label>
                    <input class="form-input" type="datetime-local" id="date_debut" name="date_debut"
                           value="{{ $sport->date_debut ? $sport->date_debut->format('Y-m-d\TH:i') : '' }}">
                </div>
                {{-- date de fin --}}
                <div class="form-control">
                    <label class="form-label" for="date_fin">Date de fin :</label>
                    <input class="form-input" type="datetime-local" id="date_fin" name="date_fin"
                           value="{{ $sport->date_fin ? $sport->date_fin->format('Y-m-d\TH:i') : '' }}">
                </div>
                <div class="form-buttons">
                    <button type="reset">Annule</button>
                    <button type="submit">Valide</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
