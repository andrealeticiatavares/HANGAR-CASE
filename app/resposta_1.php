<?php
/**1. Utilizando PHP, escreva um algoritmo que calcule a média dos 
 pedidos por dia e os exiba em um formato de tabela no HTML.  
 Caso a média seja inferior a 3.000, a linha deve ficar vermelha,
 se for maior, deve ficar verde. E se for igual, deve ser cinza. */

require_once "conexao.php";

$sql = new Sql();

// Função para calcular a média por dia 
function calculateAverage($total_orders, $times_per_day){
    return $total_orders / $times_per_day;

}

//Consulta para obter os dados dos pedidos
$result = $sql->select("SELECT 
            DATE(order_date) AS date_order, 
            SUM(order_total) AS total_orders,
            COUNT(*) AS count_orders 
            FROM orders 
            GROUP BY DATE(order_date)");

//var_dump($result); die();

?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>hangar-case</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akshar&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Button-Ripple-Effect-Animation-Wave-Pulse.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/Table-with-search-table.css">
    <link rel="stylesheet" href="assets/css/Table-with-search.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="font-family: Akshar, sans-serif;">Big <span style="color: rgb(137, 7, 7);">Bang</span> Theory Inc.</a></div>
    </nav>
    <div class="container">
        <div>
            <h1>Pedidos por dia</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pedidos</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result) {
                            foreach ($result as $value) {
                                $average = calculateAverage($value['total_orders'], $value['count_orders']); // Média por dia
                                $color = 'gray'; // Cor padrão

                                if ($average > 3000) {
                                    $color = 'green';
                                } elseif ($average < 3000) {
                                    $color = 'red';
                                }

                                echo "<tr style='background-color: $color;'>
                                    <td>{$value['total_orders']}</td>
                                    <td>{$value['date_order']}</td>
                                    </tr>";
                             }
                        } else {
                            echo "<tr><td colspan='2'>Não foram encontrados resultados</td></tr>";
                        }
                    ?>
                        
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script src="assets/js/DataTable---Fully-BSS-Editable-style.js"></script>
    <script src="assets/js/Button-Ripple-Effect-Animation-Wave-Pulse-button-ripple-effect.js"></script>
    <script src="assets/js/Table-with-search-table.js"></script>
</body>

</html>