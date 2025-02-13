<?php
session_start();
include('db.php');
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM investimentos WHERE conta_id='1234567890'";
$result = mysqli_query($conn, $query);
$investimentos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investimentos</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Investimentos</h1>
        <canvas id="investimentosChart"></canvas>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Valor Atual</th>
                    <th>Retorno</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($investimentos as $investimento): ?>
                <tr>
                    <td><?php echo $investimento['nome']; ?></td>
                    <td><?php echo $investimento['valor_atual']; ?></td>
                    <td><?php echo $investimento['retorno']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='add_investimento.php'">Adicionar Investimento</button>
    </div>
    <script>
        const ctx = document.getElementById('investimentosChart').getContext('2d');
        const investimentosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php foreach ($investimentos as $investimento) { echo "'" . $investimento['nome'] . "',"; } ?>],
                datasets: [{
                    label: 'Investimentos',
                    data: [<?php foreach ($investimentos as $investimento) { echo $investimento['valor_atual'] . ","; } ?>],
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
</body>
</html>