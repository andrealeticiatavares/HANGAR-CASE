<?php
/**2. Monte uma página que liste todos os pedidos em um formato de tabela,
 como um relatório. As cores de fundo devem alternar para facilitar a 
 leitura. Um botão com a função de imprimir deve ser adicionado. */

require "conexao.php";

$sql = new Sql();

$result = $sql->select("SELECT o.order_id, 
                                u.user_name, 
                                o.order_total, 
                                o.order_date 
                        FROM orders o 
                        INNER JOIN user u 
                        ON o.order_user_id = u.user_id
                    ");
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
            <h1>Pedidos&nbsp;</h1>
        </div>
        <div class="table-responsive table mb-0 pt-3 pe-2">
            <table class="table table-striped table-sm my-0 mydatatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Pedido</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result){
                            foreach($result as $key=>$value){
                                echo "
                                    <tr>
                                        <td>".$value['order_id']."</td>
                                        <td>".$value['user_name']."</td>
                                        <td>".$value['order_total']."</td>
                                        <td>".$value['order_date']."</td>

                                     </tr>";
                            }
                        } else{
                            echo "Não foram encontrados resultados";
                        }
                        ?>
                    ?>
                </tbody>
            </table>
        </div><button class="btn btn-primary" type="button" style="margin-top: 30px;" onclick="window.print();">Imprimir</button>
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