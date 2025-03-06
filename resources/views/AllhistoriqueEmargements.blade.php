@extends('layouts.appAdmin')

@section('content')
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h2 class="text-center">Historique des Emargements</h2>

    <!-- Formulaire de sélection du professeur -->
    <form method="GET" action="{{ route('AllHistoriqueEmargements') }}" class="mb-4">
        @csrf
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

        <div class="d-flex justify-content-between mb-4">
            <button type="submit" class="btn btn-primary">Voir l'historique</button>

            <a href="{{ route('ExportEmargements.index', ['professeur_id' => request()->professeur_id]) }}" class="btn btn-success">
                Exporter <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </form>

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
