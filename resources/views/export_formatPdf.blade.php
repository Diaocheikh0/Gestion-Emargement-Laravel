<div class="container">
    <div class="header text-center mb-4">
        <h1>Institut Supérieur d'Informatique (ISI)</h1>
        <p class="lead">Historique des Émargements</p>
        <hr>
    </div>

    <table class="table table-bordered text-center">
        <thead class="thead-dark">
        <tr>
            <th>Date</th>
            <th>Statut</th>
            <th>Professeur</th>
            <th>Nom du cours</th>
        </tr>
        </thead>
        <tbody>
        @foreach($emargements as $e)
            <tr>
                <td>{{ $e->created_at->format('d/m/Y') }}</td>
                <td>{{ $e->statut }}</td>
                <td>{{ $e->professeur->name }}</td>
                <td>{{ $e->cours->nom }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 30px;
        color: #2c3e50;
    }

    .header p {
        font-size: 18px;
        color: #34495e;
    }

    hr {
        margin-top: 10px;
        border: 1px solid #2c3e50;
    }

    .table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .table th, .table td {
        padding: 8px;
        text-align: center;
        border: 1px solid #ddd;
    }

    .thead-dark {
        background-color: #2c3e50;
        color: #fff;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>
