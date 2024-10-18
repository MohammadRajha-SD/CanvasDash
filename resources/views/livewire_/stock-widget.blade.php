<div>
    <h3>{{ $settings['title'] ?? 'Stock Market Widget' }}</h3>
    <canvas id="stockChart"></canvas>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        const ctx = document.getElementById('stockChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json(array_keys($stockData)),
                datasets: [{
                    label: '{{ $settings['symbol'] ?? 'Stock Data' }}',
                    data: @json(array_values($stockData)),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            }
        });
    });
</script>
