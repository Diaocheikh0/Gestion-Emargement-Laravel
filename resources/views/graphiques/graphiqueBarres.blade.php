@extends('layouts.appAdmin')

@section('content')
    <h2 class="text-center">Nombre d’émargements par professeur</h2>

    <canvas id="GraphiqueBarre" style="max-height: 90vh; width: 100%; height: 160%;"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('GraphiqueBarre').getContext('2d');

                const labels = @json($data->map(fn($item) => $item['professeur']));
                const values = @json($data->map(fn($item) => $item['total']));

                function generateColors(count) {
                    return Array.from({ length: count }, () => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`);
                }

                const backgroundColors = generateColors(labels.length);
                const borderColors = backgroundColors.map(color => color.replace('0.7', '1'));

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Total des présences',
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1,
                        data: values
                    }]
                };

                new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                suggestedMax: 20,
                                ticks: {
                                    max: 100
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
