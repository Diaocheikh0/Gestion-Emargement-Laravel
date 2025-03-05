@extends('layouts.appAdmin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">{{$cour->id ?'Modifié Cours' : 'Ajout Cours'}}</h2>
                    <form action="{{ route($cour->id ? 'cours.update' : 'cours.store', $cour->id)}}" method="post">
                        @csrf
                        @method(($cour->id ? 'put' :'post'))
                        <input name="id" value="{{$cour->id ? $cour->id : ''}}" hidden>
                        <!-- Nom du cours -->
                        <div class="form-group">
                            <label for="nom">Nom du cours</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom du cours" value="{{$cour->id ? $cour->nom : old('nom')}}" required>
                            @error('nom')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>

                        <!-- Description -->
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Description du cours" required>{{ $cour->id ? $cour->description : old('description') }}</textarea>
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>

                        <!-- Heure de début -->
                        <div class="form-group">
                            <label for="heure_debut">Heure de début</label>
                            <input type="time" class="form-control" id="heure_debut" name="heure_debut" value="{{$cour->id ? $cour->heure_debut : old('heure_debut')}}" required>
                            @error('heure_debut')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>

                        <!-- Heure de fin -->
                        <div class="form-group">
                            <label for="heure_fin">Heure de fin</label>
                            <input type="time" class="form-control" id="heure_fin" name="heure_fin" value="{{$cour->id ? $cour->heure_fin : old('heure_fin')}}" required>
                            @error('heure_fin')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>

                        <!-- Salle -->
                        <div class="form-group">
                            <label for="salle_id">Salle</label>
                            <select class="form-control" id="salle_id" name="salle_id" required>
                                <option value="" disabled>-- Sélectionner une salle --</option>
                                @foreach ($salles as $salle)
                                    <option value="{{ $salle->id }}" {{ ($cour->id && $cour->salle_id == $salle->id) || old('salle_id') == $salle->id ? 'selected' : '' }}>
                                        {{ $salle->libelle }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="jour">Jour :</label>
                            <select name="jour" id="jour" class="form-control" required>
                                <option value="" disabled>-- Sélectionnez un jour --</option>
                                <option value="Lundi" {{ ($cour->id && $cour->jour == 'Lundi') || old('jour') == 'Lundi' ? 'selected' : '' }}>Lundi</option>
                                <option value="Mardi" {{ ($cour->id && $cour->jour == 'Mardi') || old('jour') == 'Mardi' ? 'selected' : '' }}>Mardi</option>
                                <option value="Mercredi" {{ ($cour->id && $cour->jour == 'Mercredi') || old('jour') == 'Mercredi' ? 'selected' : '' }}>Mercredi</option>
                                <option value="Jeudi" {{ ($cour->id && $cour->jour == 'Jeudi') || old('jour') == 'Jeudi' ? 'selected' : '' }}>Jeudi</option>
                                <option value="Vendredi" {{ ($cour->id && $cour->jour == 'Vendredi') || old('jour') == 'Vendredi' ? 'selected' : '' }}>Vendredi</option>
                                <option value="Samedi" {{ ($cour->id && $cour->jour == 'Samedi') || old('jour') == 'Samedi' ? 'selected' : '' }}>Samedi</option>
                                <option value="Dimanche" {{ ($cour->id && $cour->jour == 'Dimanche') || old('jour') == 'Dimanche' ? 'selected' : '' }}>Dimanche</option>
                            </select>
                        </div>

                        <br>
                        <!-- Bouton d'ajout -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{$cour->id ?'Mettre à jour' : 'Ajouter'}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
