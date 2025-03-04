@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Modifier l'utilisateur</h2>
                    <form action="{{ route('updateUser', ['id' => $users->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role">
                                <option value="administrateur" {{ $users->role == 'administrateur' ? 'selected' : '' }}>Administrateur</option>
                                <option value="gestionnaire" {{ $users->role == 'gestionnaire' ? 'selected' : '' }}>Gestionnaire</option>
                                <option value="professeur" {{ $users->role == 'professeur' ? 'selected' : '' }}>Professeur</option>
                            </select>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
