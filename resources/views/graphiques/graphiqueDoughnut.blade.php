@extends('layouts.appAdmin')

@section('content')
    <h2 class="text-center">Taux de présence par cours</h2>

    <canvas id="tauxPresenceCours" style="max-width: 90%; max-height: 50vh; width: 100%; height: 200%;;"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('tauxPresenceCours').getContext('2d');

                const labels = @json($data->map(fn($item) => $item['cours']));
                const values = @json($data->map(fn($item) => $item['taux']));

                function generateColors(count) {
                    return Array.from({ length: count }, () => `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`);
                }

                const backgroundColors = generateColors(labels.length);
                const borderColors = backgroundColors.map(color => color.replace('0.7', '1'));

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Taux de présence par cours',
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        data: values,
                        borderWidth: 1
                    }]
                };

                new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
