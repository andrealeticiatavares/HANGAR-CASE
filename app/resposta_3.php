<?php

/**3. Desenvolva uma página que exiba a soma dos totais
  de venda por país. Nessa mesma página, insira uma 
  forma de filtrar por um país desejado. */

require_once "conexao.php";

$sql = new Sql();

//Busca o total dos pedidos por pais e soma os pedidos
$result = $sql->select("SELECT
            SUM(o.order_total) AS total_orders,
            u.user_country
        FROM orders o
        INNER JOIN user u
        ON o.order_user_id = u.user_id");

if($result){
    foreach($result as $key=>$value){
    }
} else{
    echo "Não foram encontrados resultados";
}
?>