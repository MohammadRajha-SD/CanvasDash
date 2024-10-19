<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-19 Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 70%; margin: 50px auto;">
        <canvas id="covidChart"></canvas>
    </div>

    <script>
        // Fetch data from the API
        async function fetchCovidData() {
            try {
                const response = await fetch('https://disease.sh/v3/covid-19/all');
                const data = await response.json();
                renderChart(data);
            } catch (error) {
                console.error('Error fetching COVID-19 data:', error);
            }
        }

        // Render the chart with fetched data
        function renderChart(data) {
            const ctx = document.getElementById('covidChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar',  // Bar chart for visualizing comparisons
                data: {
                    labels: ['Cases', 'Deaths', 'Recovered', 'Active'],
                    datasets: [{
                        label: 'Covid-19 Global Statistics',
                        data: [data.cases, data.deaths, data.recovered, data.active],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)', 
                            'rgba(255, 99, 132, 0.6)', 
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 205, 86, 0.6)' 
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(255, 205, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        fetchCovidData();
    </script>
</body>
