@extends('layouts.appAdmin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Modifier le Cours</h2>
                    <form action="{{ route('updateCours', ['id' => $cours->id]) }}" method="post"
                          class="p-4 bg-light rounded shadow-sm">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nom du cours :</label>
                            <input type="text" name="nom" value="{{ $cours->nom }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description :</label>
                            <textarea name="description" class="form-control" rows="3"
                                      required>{{ $cours->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Salle :</label>
                            <select name="salle_id" class="form-select" required>
                                @foreach($salles as $salle)
                                    <option value="{{ $salle->id }}" {{ $cours->salle_id == $salle->id ? 'selected' : '' }}>
                                        {{ $salle->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jour">Jour :</label>
                            <select class="form-control" id="jour" name="jour" required>
                                @foreach(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $jour)
                                    <option value="{{ $jour }}" {{ $cours->jour == $jour ? 'selected' : '' }}>
                                        {{ $jour }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Heure début :</label>
                                <input type="time" name="heure_debut" value="{{ $cours->heure_debut }}"
                                       class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Heure fin :</label>
                                <input type="time" name="heure_fin" value="{{ $cours->heure_fin }}" class="form-control"
                                       required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
