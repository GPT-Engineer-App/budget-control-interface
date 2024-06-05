<?php
session_start();
include('db.php');
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$query = "SELECT * FROM transacao WHERE tipo='Débito' AND conta_id='1234567890'";
$result = mysqli_query($conn, $query);
$gastos = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gastos</h1>
        <canvas id="gastosChart"></canvas>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th>Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gastos as $gasto): ?>
                <tr>
                    <td><?php echo $gasto['descricao']; ?></td>
                    <td><?php echo $gasto['valor']; ?></td>
                    <td><?php echo $gasto['data']; ?></td>
                    <td><?php echo $gasto['categoria_nome']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button onclick="window.location.href='add_gasto.php'">Adicionar Gasto</button>
    </div>
    <script>
        const ctx = document.getElementById('gastosChart').getContext('2d');
        const gastosChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php foreach ($gastos as $gasto) { echo "'" . $gasto['data'] . "',"; } ?>],
                datasets: [{
                    label: 'Gastos',
                    data: [<?php foreach ($gastos as $gasto) { echo $gasto['valor'] . ","; } ?>],
                    borderColor: 'rgba(255, 99, 132, 1)',
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