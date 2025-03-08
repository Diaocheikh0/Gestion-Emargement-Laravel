@extends('layouts.appAdmin')

@section('content')
    <div class="container mt-4">
        <h3 class="text-center">Gestion des Emargements de ISI</h3>
        <br>
        <div class="row text-center mb-4">
            @if(Auth::user()->role == 'administrateur')
                <div class="col-md-4 col-sm-6">
                    <div class="card text-white bg-secondary shadow-sm stat-card">
                        <div class="card-body">
                            <i class="fas fa-users fa-lg"></i>
                            <h6 class="mt-2 text-uppercase font-weight-bold">Total Utilisateurs</h6>
                            <p class="h5">{{ $totalUsers }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-primary shadow-sm stat-card">
                    <div class="card-body">
                        <i class="fas fa-chalkboard-teacher fa-lg"></i>
                        <h6 class="mt-2 text-uppercase font-weight-bold">Total Professeurs</h6>
                        <p class="h5">{{ $totalProfesseurs }}</p>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role == 'administrateur')
                <div class="col-md-4 col-sm-6">
                    <div class="card text-white bg-warning shadow-sm stat-card">
                        <div class="card-body">
                            <i class="fas fa-user-cog fa-lg"></i>
                            <h6 class="mt-2 text-uppercase font-weight-bold">Total Gestionnaires</h6>
                            <p class="h5">{{ $totalGestionnaires }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row text-center mb-4">
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-success shadow-sm stat-card">
                    <div class="card-body">
                        <i class="fas fa-signature fa-lg"></i>
                        <h6 class="mt-2 text-uppercase font-weight-bold">Total Emargements</h6>
                        <p class="h5">{{ $totalEmargements }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-info shadow-sm stat-card">
                    <div class="card-body">
                        <i class="fas fa-signature fa-lg"></i>
                        <h6 class="mt-2 text-uppercase font-weight-bold">Emargements du Jour</h6>
                        <p class="h5">+ {{ $totalEmargementsDay }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-danger shadow-sm stat-card">
                    <div class="card-body">
                        <i class="fas fa-signature fa-lg"></i>
                        <h6 class="mt-2 text-uppercase font-weight-bold">Emargements Semaine</h6>
                        <p class="h5">+ {{ $totalEmargementsWeek }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center mb-4">
            <div class="col-md-4 col-sm-6">
                <div class="card text-white bg-dark shadow-sm stat-card">
                    <div class="card-body">
                        <i class="fas fa-signature fa-lg"></i>
                        <h6 class="mt-2 text-uppercase font-weight-bold">Emargements Mois</h6>
                        <p class="h5">+ {{ $totalEmargementsMonth }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    <style>
        .stat-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
        }
    </style>


