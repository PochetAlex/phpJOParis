<html>
<head>
    <title>Liste des tâches</title>
</head>
<body>
<h2>La liste des tâches</h2>

@if(!empty($sports))
    <ul>
        @foreach($sports as $sport)
            <li>{{$sport['nom']}} {{$sport['description']}}
            </li>
        @endforeach
    </ul>
@else
    <h3>aucun sport</h3>
@endif

</body>
</html>
