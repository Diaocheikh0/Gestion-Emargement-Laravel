@extends('layouts.appAdmin')
@section('content')
    @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">{{$user->id ?'Modifier Utilisateur' : 'Inscription'}}</h2>
                    <form action="{{ route($user->id ? 'register.update' : 'register.store', $user->id)}}" method="post">
                        @csrf
                        @method($user->id ? 'put' :'post')
                        <input name="id" value="{{$user->id ? $user->id : ''}}" hidden>

                        <div class="form-group">
                            <label for="name">Prénom et Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Prénom et Nom" value="{{$user->id ? $user->name : old('name')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->id ? $user->email : old('email')}}" required>
                        </div>

                        @if(!$user->id)
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Mot de passe" required>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role">
                                <option value="administrateur" {{ ($user->id && $user->role == 'administrateur') || old('role') == 'administrateur' ? 'selected' : '' }}>Administrateur</option>
                                <option value="gestionnaire" {{ ($user->id && $user->role == 'gestionnaire') || old('role') == 'gestionnaire' ? 'selected' : '' }}>Gestionnaire</option>
                                <option value="professeur" {{ ($user->id && $user->role == 'professeur') || old('role') == 'professeur' ? 'selected' : '' }}>Professeur</option>
                            </select>
                        </div>
                        <br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{$user->id ?'Mettre à jour' : 'Inscrire'}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
