@extends('layouts.appAdmin')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">Exporter les Emargements</h2>

        <form action="{{ route('ExportEmargements.export') }}" method="POST">
            @csrf
            <input type="hidden" name="professeur_id" value="{{ request()->professeur_id }}">

            <div class="form-check">
                <input type="radio" id="pdf" name="export_type" value="pdf" class="form-check-input" required>
                <label for="pdf" class="form-check-label">Exporter en PDF</label>
            </div>

            <div class="form-check">
                <input type="radio" id="excel" name="export_type" value="excel" class="form-check-input" required>
                <label for="excel" class="form-check-label">Exporter en Excel</label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Exporter</button>
        </form>
    </div>
@endsection
