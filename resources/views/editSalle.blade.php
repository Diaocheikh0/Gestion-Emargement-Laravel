@extends('layouts.app')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center">Modifier Salle</h2>
                    <form action="{{ route('updateSalle', ['id' => $salles->id]) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Libellé</label>
                            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $salles->libelle }}" required>
                        </div>
                        <br>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
