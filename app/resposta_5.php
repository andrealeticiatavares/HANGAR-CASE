<?php
    /**5. Utilizando comandos SQL, altere o campo Country do ID 4 da tabela User para "Canada" */

    require_once "conexao.php";

    $sql = new Sql();

// Atualizar o campo "user_country" para "Canada" para o usuário com ID 4
$result = $sql->update("UPDATE user
                       SET user_country = 'Canada'
                       WHERE user_id = 4");

$update_success = $sql->affected_rows() > 0;

// Obter informações do usuário atualizado para mostrar na tabela
$user_info = $sql->select("SELECT user_id, user_name, user_city, user_country
                           FROM user
                           WHERE user_id = 4");
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
            <h1>Atualizar País do ID 4</h1>
        </div>
        <div class="table-responsive">
        <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Cidade</th>
                        <th>País</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($user_info): ?>
                        <?php foreach ($user_info as $user): ?>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['user_name']; ?></td>
                                <td><?php echo $user['user_city']; ?></td>
                                <td><?php echo $user['user_country']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum usuário encontrado com ID 4</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
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