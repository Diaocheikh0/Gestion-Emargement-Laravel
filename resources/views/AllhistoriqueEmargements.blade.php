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
