@extends('layouts.appAdmin')

@section('content')
    <h2 class="text-center">Évolution des Émargements</h2>

    <!-- Graphique par jour -->
    <h3 class="text-center">Évolution par Jour</h3>
    <canvas id="GraphiqueJour" style="max-width: 90%; max-height: 50vh; width: 100%; height: 100%;"></canvas>

    <!-- Graphique par semaine -->
    <h3 class="text-center">Évolution par Semaine</h3>
    <canvas id="GraphiqueSemaine" style="max-width: 90%; max-height: 50vh; width: 100%; height: 100%;"></canvas>

    <!-- Graphique par mois -->
    <h3 class="text-center">Évolution par Mois</h3>
    <canvas id="GraphiqueMois" style="max-width: 90%; max-height: 50vh; width: 100%; height: 100%;"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Graphique par jour
                const ctxJour = document.getElementById('GraphiqueJour').getContext('2d');
                const dataJour = {
                    labels: @json($dataJour->map(fn($item) => $item['date'])),
                    datasets: [{
                        label: 'Nombre d\'émargements',
                        backgroundColor: 'rgba(75, 192, 192, 0.3)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        data: @json($dataJour->map(fn($item) => $item['total'])),
                    }]
                };
                new Chart(ctxJour, { type: 'line', data: dataJour });

                // Graphique par semaine
                const ctxSemaine = document.getElementById('GraphiqueSemaine').getContext('2d');
                const dataSemaine = {
                    labels: @json($dataSemaine->map(fn($item) => $item['date'])),
                    datasets: [{
                        label: 'Nombre d\'émargements',
                        backgroundColor: 'rgba(153, 102, 255, 0.3)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        data: @json($dataSemaine->map(fn($item) => $item['total'])),
                    }]
                };
                new Chart(ctxSemaine, { type: 'line', data: dataSemaine });

                // Graphique par mois
                const ctxMois = document.getElementById('GraphiqueMois').getContext('2d');
                const dataMois = {
                    labels: @json($dataMois->map(fn($item) => $item['date'])),
                    datasets: [{
                        label: 'Nombre d\'émargements',
                        backgroundColor: 'rgba(255, 159, 64, 0.3)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        data: @json($dataMois->map(fn($item) => $item['total'])),
                    }]
                };
                new Chart(ctxMois, { type: 'line', data: dataMois });
            });
        </script>
    @endpush
@endsection
