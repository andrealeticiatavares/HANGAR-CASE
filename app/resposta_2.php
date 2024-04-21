<?php
/**2. Monte uma página que liste todos os pedidos em um formato de tabela,
 como um relatório. As cores de fundo devem alternar para facilitar a 
 leitura. Um botão com a função de imprimir deve ser adicionado. */

require "conexao.php";

$sql = new Sql();

$result = $sql->select("SELECT u.user_name
                        FROM orders o
                        INNER JOIN user u
                        ON o.oorder_user_id = u.user_id");

if($result){
    foreach($result as $key=>$value){
    }
} else{
    echo "Não foram encontrados resultados";
}
?>