@extends('layouts.appAdmin')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    <h2 class="text-center mb-4">Liste des Cours</h2>
    <table class="table table-striped table-hover text-center mt-4">
        <thead>
        <tr class="table-primary">
            <th>ID</th>
            <th>NOM COUR</th>
            <th>DESCRIPTION</th>
            <th>HORAIRE</th>
            <th>SALLE</th>
            <th>JOUR</th>
            <th>ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cours as $c)
            <tr>
                <td class="table-secondary">{{$c->id}}</td>
                <td>{{$c->nom}}</td>
                <td>{{$c->description}}</td>
                <td>{{ $c->heure_debut }} - {{ $c->heure_fin }}</td>
                <td>{{$c->salle->libelle ?? 'Non attribuée'}}</td>
                <td>{{$c->jour}}</td>
                <td>
                    <div class="btn-group gap-2" role="group">
                        <a href="{{ route('cours.edit', [$c->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('cours.destroy', [$c->id]) }}" method="post"
                              class="d-inline-block">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-x-octagon"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$cours->links()}}

@endsection
