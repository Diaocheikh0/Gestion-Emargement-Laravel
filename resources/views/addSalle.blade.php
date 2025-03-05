@extends('layouts.appAdmin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">{{$salle->id ?'Modifié Salle' : 'Ajout Salle'}}</h2>
                    <form action="{{ route($salle->id ? 'salle.update' : 'salle.store', $salle->id)}}" method="post">
                        @csrf
                        @method($salle->id ? 'put' :'post')
                        <input name="id" value="{{$salle->id ? $salle->id : ''}}" hidden>

                        <!-- Prénom et Nom -->
                        <div class="form-group">
                            <label for="name">Libellé</label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="name" name="libelle" placeholder="Libellé" value="{{$salle->id ? $salle->libelle : old('libelle')}}" required>
                            @error('libelle')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <br>
                        <!-- Bouton d'inscription -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{$salle->id ?'Mettre à jour' : 'Ajouter'}}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
