@extends('layouts.appAdmin')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    <h2 class="text-center">Historique des Emargements</h2>

    <!-- Formulaire de sélection du professeur -->
    <form method="GET" action="{{ route('AllHistoriqueEmargements') }}" class="mb-4">
        <div class="form-group">
            <label for="professeur_id">Sélectionnez un professeur</label>
            <select name="professeur_id" id="professeur_id" class="form-control" required>
                <option value="">-- Sélectionner un professeur --</option>
                @foreach($professeurs as $prof)
                    <option value="{{ $prof->id }}" {{ request()->professeur_id == $prof->id ? 'selected' : '' }}>
                        {{ $prof->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request()->start_date }}">
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request()->end_date }}">
        </div>

        <div class="d-flex justify-content-between mb-4">
            <button type="submit" class="btn btn-primary">Voir l'historique</button>
        </div>
    </form>

    <!-- Formulaires d'exportation -->
    <div class="d-flex justify-content-end">
        <form method="POST" action="{{ route('ExportEmargements.export') }}" class="mr-2">
            @csrf
            <input type="hidden" name="professeur_id" value="{{ request()->professeur_id }}">
            <input type="hidden" name="start_date" value="{{ request()->start_date }}">
            <input type="hidden" name="end_date" value="{{ request()->end_date }}">
            <input type="hidden" name="export_type" value="excel">

            <button type="submit" class="btn btn-success btn-sm">
                Exporter en Excel <i class="bi bi-arrow-up-short"></i></i>
            </button>
        </form>

        <form method="POST" action="{{ route('ExportEmargements.export') }}">
            @csrf
            <input type="hidden" name="professeur_id" value="{{ request()->professeur_id }}">
            <input type="hidden" name="start_date" value="{{ request()->start_date }}">
            <input type="hidden" name="end_date" value="{{ request()->end_date }}">
            <input type="hidden" name="export_type" value="pdf">

            <button type="submit" class="btn btn-danger btn-sm">
                Exporter en PDF <i class="bi bi-arrow-up-short"></i></i>
            </button>
        </form>
    </div>

    <!-- Tableau des émargements -->
    <table class="table table-striped table-hover text-center mt-4">
        <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>DATE</th>
            <th>STATUT</th>
            <th>PROFESSEUR</th>
            <th>NOM COURS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allemargements as $e)
            <tr>
                <td class="table-secondary">{{$e->id}}</td>
                <td>{{$e->created_at}}</td>
                <td>{{$e->statut}}</td>
                <td>{{$e->professeur->name}}</td>
                <td>{{$e->cours->nom}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
