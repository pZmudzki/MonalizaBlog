<x-card style="width: 80%; margin: auto;">
    <h2>Ilość odwiedzających</h2>
    <canvas id="barChart"></canvas>
</x-card>

<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($visitsData['labels']),
            datasets: [{
                label: 'Wyświetlenia',
                data: @json($visitsData['data']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
