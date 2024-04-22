<?php

/**4. Utilizando comandos SQL, faça a junção das duas tabelas (User, Order) 
 selecionando apenas as colunas Name, City, Country, Date e Total do Pedido
 nos quais os ID's dos Usuários sejam 1, 3 e 5 e ordene pela coluna Name. */

  require_once "conexao.php";

  $sql = new Sql();

//Junção das duas tabelas (user e order), obtendo apenas os usuarios de ID 1, 3 e 5 e ordenando pelo nome
  $result = $sql->select("SELECT o.order_total,
                                 o.order_date,
                                 u.user_name,
                                 u.user_city,
                                 u.user_country
                            FROM orders o
                            INNER JOIN user u
                            ON o.order_user_id = u.user_id
                            WHERE u.user_id IN (1, 3, 5)
                            ORDER BY u.user_name ASC");
if($result){
    foreach($result as $key=>$value){
    }
} else{
    echo "Não foram encontrados resultados";
}
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
            <h1>Lista usuários por pedido</h1>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>País</th>
                        <th>Data</th>
                        <th>Total Pedidos</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  if ($result) {
                    foreach ($result as $key => $value) {
                      echo "<tr>";
                      echo "<td>{$value['user_name']}</td>";
                      echo "<td>{$value['user_city']}</td>";
                      echo "<td>{$value['user_country']}</td>";
                      echo "<td>{$value['order_date']}</td>";
                      echo "<td>{$value['order_total']}</td>";
                      echo "</tr>";
                     }
                  } else {
                    echo "<tr><td colspan='5'>Não foram encontrados resultados</td></tr>";
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