<html>
<head>
    <title>Liste des sports</title>
    <style>
        table, td {
            border: 1px solid;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
        }
        tr, td, body {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h2>La liste des tâches</h2>

@if(!empty($sports))
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
                    <td>{{$sport['id']}}</td>
                    <td>{{$sport['nom']}}</td>
                    <td>{{$sport['description']}}</td>
                    <td>{{$sport['annee_ajout']}}</td>
                    <td>{{$sport['nb_disciplines']}}</td>
                    <td>{{$sport['nb_epreuves']}}</td>
                    <td>{{$sport['date_debut']}}</td>
                    <td>{{$sport['date_fin']}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>

@else
    <h3>aucun sport</h3>
@endif

</body>
</html>
