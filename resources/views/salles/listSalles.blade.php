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

    <h2 class="text-center mb-4">Liste des Salles</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center mt-4">
            <thead>
            <tr class="table-primary">
                <th style="width: 10%;">ID</th>
                <th style="width: 60%;">LIBELLE</th>
                <th style="width: 30%;">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salles as $s)
                <tr>
                    <td class="table-secondary">{{ $s->id }}</td>
                    <td>{{ $s->libelle }}</td>
                    <td class="text-nowrap">
                        <div class="btn-group" role="group">
                            <a href="{{ route('salle.edit', [$s->id]) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <form action="{{ route('salle.destroy', [$s->id]) }}" method="post"
                                  class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-octagon"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$salles->links()}}
    </div>

@endsection
