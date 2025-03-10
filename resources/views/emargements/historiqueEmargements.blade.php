@extends('layouts.appAdmin')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="text-center mb-4">Historique de vos émargements</h2>
    <table class="table table-striped table-hover text-center mt-4">
        <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>DATE</th>
            <th>STATUT</th>
            <th>NOM COURS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($emargements as $e)
            <tr>
                <td class="table-secondary">{{$e->id}}</td>
                <td>{{$e->created_at}}</td>
                <td>{{$e->statut}}</td>
                <td>{{$e->cours->nom}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
