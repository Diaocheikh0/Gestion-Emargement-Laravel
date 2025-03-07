@extends('layouts.appAdmin')

@section('content')

    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="text-center mb-4">Émargement du jour</h2>

        @foreach($coursDuJour as $cours)
            <form action="{{ route('emargements.store') }}" method="POST">
                @csrf
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cours->nom }} : </h5>
                        <p class="card-text">
                            <strong>Heure de début
                                :</strong> {{ \Carbon\Carbon::parse($cours->heure_debut)->format('H:i') }} <br>
                            <strong>Heure de fin
                                :</strong> {{ \Carbon\Carbon::parse($cours->heure_fin)->format('H:i') }}
                        </p>
                        <input type="hidden" name="cours_id" value="{{ $cours->id }}">

                        <div class="form-group">
                            <label for="statut">Statut :</label>
                            <select name="statut" id="statut" class="form-control" required>
                                <option value="Présent">Présent</option>
                                <option value="Absent">Absent</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Émarger</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>

@endsection
