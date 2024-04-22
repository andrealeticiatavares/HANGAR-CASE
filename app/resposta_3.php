<?php
// Conexão ao banco de dados
require_once "conexao.php";

$sql = new Sql();

// Consulta SQL para obter a soma dos totais de vendas por país
$result = $sql->select("SELECT
                            SUM(o.order_total) AS total_orders,
                            u.user_country
                        FROM orders o
                        INNER JOIN user u
                        ON o.order_user_id = u.user_id
                        GROUP BY u.user_country");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Pedidos por País</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akshar&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-body">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family: Akshar, sans-serif;">Big <span style="color: rgb(137, 7, 7);">Bang</span> Theory Inc.</a></div>
    </nav>
    
    <div class="container">
        <div>
            <h1>Pedidos por País</h1>
        </div>
        
        <div class="form-group pull-right">
            <input type="text" class="search form-control" placeholder="Informe o país.">
        </div>
        
        <span class="counter pull-right"></span>

        <table class="table table-hover table-bordered results">
            <thead>
                <tr>
                    <th>Total pedidos</th>
                    <th>País</th>
                </tr>
                <tr class="warning no-result" style="display: none;">
                    <td colspan="2"><i class="fa fa-warning"></i> Sem resultados</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    foreach ($result as $value) {
                        echo "<tr>";
                        echo "<td>{$value['total_orders']}</td>";
                        echo "<td>{$value['user_country']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Não foram encontrados resultados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Scripts JavaScript para busca e funcionalidades -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/Table-with-search-table.js"></script>
</body>
</html>
