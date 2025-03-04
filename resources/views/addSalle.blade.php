@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Ajout Salle</h2>
                    <form action="{{ route('saveSalle') }}" method="post">
                        @csrf
                        @method('post')

                        <!-- Prénom et Nom -->
                        <div class="form-group">
                            <label for="name">Libellé</label>
                            <input type="text" class="form-control" id="name" name="libelle" placeholder="Libellé" required>
                        </div>
                        <br>
                        <!-- Bouton d'inscription -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
