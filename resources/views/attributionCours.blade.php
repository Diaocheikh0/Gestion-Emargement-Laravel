@extends('layouts.appAdmin')
@section('content')

    <div class="container">
        <div class="d-flex align-items-center justify-content-center">
            <h2 class="text-center">Attribution des Cours aux Professeurs</h2>
        </div>
        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('cours-professeurs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Cours :</label>
                <select name="cours_id" class="form-control" required>
                    @foreach($cours as $c)
                        <option value="{{ $c->id }}">{{ $c->nom }} ({{ $c->jour }} - {{ $c->heure_debut }}
                            à {{ $c->heure_fin }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Professeur :</label>
                <select name="prof_id" class="form-control" required>
                    @foreach($professeurs as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Attribuer</button>
        </form>
        <br>

        <div class="d-flex align-items-center justify-content-center">
            <h3>Cours déjà attribués</h3>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Cours</th>
                <th>Professeur</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cours as $c)
                @foreach($c->professeurs as $p)
                    <tr>
                        <td>{{ $c->nom }} ({{ $c->jour }} - {{ $c->heure_debut }} à {{ $c->heure_fin }})</td>
                        <td>{{ $p->name }}</td>
                        <td>
                            <form
                                action="{{ route('cours-professeurs.destroy', ['cours_id' => $c->id, 'prof_id' => $p->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Retirer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
