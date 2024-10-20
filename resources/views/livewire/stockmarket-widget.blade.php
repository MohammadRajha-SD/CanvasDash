<div class="stockmarket-widget">
    <h2 class="font-semibold">{{ $widget->title }}</h2>
    <p class="widget-description font-serif text-gray-100 py-2 text-base leading-relaxed rounded-md shadow-md">
        {{ $widget->description }}
    </p>
    <hr />
    <canvas id="stockmarketChart"></canvas>
</div>

@push('styles')
<style>
    .stockmarket-widget {
        display: flex;
        flex-direction: column;
        height: 100%;
        padding: 20px 20px 40px 10px;
        border: 1px solid #dee2e6;
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    canvas {
        flex-grow: 1;
        max-width: 100%;
        padding-bottom: 25px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let stockChart;

    function renderStockChart(labels, prices) {
        const ctx = document.getElementById('stockmarketChart').getContext('2d');

        if (stockChart) {
            stockChart.destroy();
        }

        stockChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'IBM Stock Price',
                    data: prices,
                    borderColor: 'rgba(54, 162, 235, 0.8)',
                    backgroundColor: 'rgba(54, 162, 235, 0.3)',
                    fill: true,
                    tension: 0.4,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: 'white',
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'white',
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)',
                        }
                    },
                    y: {
                        beginAtZero: false,
                        ticks: {
                            color: 'white',
                        },
                        grid: {
                            color: 'rgba(255, 255, 255, 0.2)',
                        }
                    }
                }
            }
        });
    }

    async function fetchStockMarketData() {
        const apiKey = 'o1vMr0asbCr_K1xQyfZheFun8eU399LBLoYHkCOqAUVj9hCV';
        const url = `https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=IBM&interval=5min&apikey=${apiKey}`;

        try {
            const response = await fetch(url);
            const data = await response.json();

            const timeSeries = data["Time Series (5min)"];
            const labels = [];
            const prices = [];

            for (const [time, values] of Object.entries(timeSeries)) {
                const formattedTime = new Date(time).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                labels.push(formattedTime);
                prices.push(parseFloat(values["4. close"]));
            }

            renderStockChart(labels.reverse(), prices.reverse());
        } catch (error) {
            console.error('Error fetching stock data:', error);
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        fetchStockMarketData();
    });
</script>
@endpush