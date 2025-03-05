@extends('layouts.appAdmin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Inscription</h2>
                    <form action="{{ route('saveUser') }}" method="post">
                        @csrf
                        @method('post')

                        <!-- Prénom et Nom -->
                        <div class="form-group">
                            <label for="name">Prénom et Nom</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Prénom et Nom"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                   required>
                        </div>

                        <!-- Mot de passe -->
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Mot de passe" required>
                        </div>

                        <!-- Rôle -->
                        <div class="form-group">
                            <label for="role">Rôle</label>
                            <select class="form-control" id="role" name="role">
                                <option value="administrateur">Administrateur</option>
                                <option value="gestionnaire">Gestionnaire</option>
                                <option value="professeur">Professeur</option>
                            </select>
                        </div>
                        <br>

                        <!-- Bouton d'inscription -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Inscrire</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
