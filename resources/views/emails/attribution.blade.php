<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attribution de Cours</title>
</head>
<body>
<h1>Bonjour {{ $professeur->name }},</h1>
<p>Vous avez été attribué au cours suivant :</p>

<table>
    <tr>
        <th>Cours</th>
        <td>{{ $cours->nom }}</td>
    </tr>
    <tr>
        <th>Jour</th>
        <td>{{ $cours->jour }}</td>
    </tr>
    <tr>
        <th>Heure de début</th>
        <td>{{ $cours->heure_debut }}</td>
    </tr>
    <tr>
        <th>Heure de fin</th>
        <td>{{ $cours->heure_fin }}</td>
    </tr>
</table>

<p>Nous vous souhaitons une excellente journée.</p>
<small><p>By Diao Cheikh !</p></small>
</body>
</html>
