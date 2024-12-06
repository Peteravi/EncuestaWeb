<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la Encuesta</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Resultados de la Encuesta</h1>
    </header>
    <main>
        <canvas id="surveyChart"></canvas>
    </main>

    <script>
        // Carga los datos del archivo CSV
        fetch('../data/results.csv')
            .then(response => response.text())
            .then(data => {
                const lines = data.split('\n');
                const labels = ["Nunca", "Mensualmente", "Semanalmente", "Diariamente"];
                const counts = [0, 0, 0, 0];

                lines.forEach(line => {
                    const answers = line.split(',');
                    if (answers[0]) {
                        const index = labels.indexOf(answers[0]);
                        if (index >= 0) counts[index]++;
                    }
                });

                // Genera el gráfico
                const ctx = document.getElementById('surveyChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Frecuencia de compra',
                            data: counts,
                            backgroundColor: ['#4caf50', '#ff9800', '#2196f3', '#f44336']
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
</body>
</html>
