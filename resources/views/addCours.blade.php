@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Ajout Cours</h2>
                    <form action="{{ route('saveCours') }}" method="post">
                        @csrf

                        <!-- Nom du cours -->
                        <div class="form-group">
                            <label for="nom">Nom du cours</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom du cours" required>
                        </div>
                        <br>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description du cours" required></textarea>
                        </div>
                        <br>

                        <div class="form-group">
                        <label>Professeur :</label>
                            <select name="prof_id" required class="form-control">
                                @foreach($professeurs as $prof)
                                    <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                        <label>Jour :</label>
                        <select name="jour" required class="form-control">
                            <option value="Lundi">Lundi</option>
                            <option value="Mardi">Mardi</option>
                            <option value="Mercredi">Mercredi</option>
                            <option value="Jeudi">Jeudi</option>
                            <option value="Vendredi">Vendredi</option>
                            <option value="Samedi">Samedi</option>
                            <option value="Dimanche">Dimanche</option>
                        </select>
                        </div>
                        <br>

                        <!-- Heure de début -->
                        <div class="form-group">
                            <label for="heure_debut">Heure de début</label>
                            <input type="time" class="form-control" id="heure_debut" name="heure_debut" required>
                        </div>
                        <br>

                        <!-- Heure de fin -->
                        <div class="form-group">
                            <label for="heure_fin">Heure de fin</label>
                            <input type="time" class="form-control" id="heure_fin" name="heure_fin" required>
                        </div>
                        <br>

                        <!-- Salle -->
                        <div class="form-group">
                            <label for="salle_id">Salle</label>
                            <select class="form-control" id="salle_id" name="salle_id" required>
                                <option value="">Sélectionner une salle</option>
                                @foreach ($salles as $salle)
                                    <option value="{{ $salle->id }}">{{ $salle->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <!-- Bouton d'ajout -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
