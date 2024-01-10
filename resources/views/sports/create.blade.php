<x-layout :titre="$titre">
    <div class="main-container">
        <h1>{{$titre}}</h1>

        {{--
           messages d'erreurs dans la saisie du formulaire.
        --}}

        {{-- @if ($errors->any())
            <div class="errors">
                <h3 class="titre-erreurs">Liste des erreurs</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        {{--
             formulaire de saisie d'un sport
             la fonction 'route' utilise un nom de route
             'csrf_field' ajoute un champ caché qui permet de vérifier
               que le formulaire vient du serveur.
          --}}

        <form action="{{route('sports.store')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-create">
                {{-- le nom du sport --}}
                <div class="form-control">
                    <label class="form-label" for="nom">Nom du sport :</label>
                    <input class="form-input" type="text" id="nom" name="nom" value="{{ old('nom') }}">
                </div>
                {{-- la description du sport --}}
                <div class="form-control">
                    <label class="form-label" for="description">Description :</label>
                    <textarea class="form-input" name="description" id="description" rows="6"
                              placeholder="Description..">{{ old('description') }}</textarea>
                </div>
                {{-- année d'ajout --}}
                <div class="form-control">
                    <label class="form-label" for="annee_ajout">Année d'ajout :</label>
                    <input class="form-input" type="number" id="annee_ajout" name="annee_ajout"
                           value="{{ old('annee_ajout') }}">
                </div>
                {{-- nombre de disciplines --}}
                <div class="form-control">
                    <label class="form-label" for="nb_disciplines">Nombre de disciplines :</label>
                    <input class="form-input" type="number" id="nb_disciplines" name="nb_disciplines"
                           value="{{ old('nb_disciplines') }}">
                </div>
                {{-- nombre d'épreuves --}}
                <div class="form-control">
                    <label class="form-label" for="nb_epreuves">Nombre d'épreuves :</label>
                    <input class="form-input" type="number" id="nb_epreuves" name="nb_epreuves"
                           value="{{ old('nb_epreuves') }}">
                </div>
                {{-- date de début --}}
                <div class="form-control">
                    <label class="form-label" for="date_debut">Date de début :</label>
                    <input class="form-input" type="datetime-local" id="date_debut" name="date_debut"
                           value="{{ old('date_debut') }}">
                </div>
                {{-- date de fin --}}
                <div class="form-control">
                    <label class="form-label" for="date_fin">Date de fin :</label>
                    <input class="form-input" type="datetime-local" id="date_fin" name="date_fin"
                           value="{{ old('date_fin') }}">
                </div>
                <div class="form-buttons">
                    <button type="reset">Annule</button>
                    <button type="submit">Valide</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
