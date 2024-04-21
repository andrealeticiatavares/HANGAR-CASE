<?php
/**1. Utilizando PHP, escreva um algoritmo que calcule a média dos 
 pedidos por dia e os exiba em um formato de tabela no HTML.  
 Caso a média seja inferior a 3.000, a linha deve ficar vermelha,
 se for maior, deve ficar verde. E se for igual, deve ser cinza. */

require "conexao.php";

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

//Verifica se a resultados da consulta e coloca dentro do array
if($result){
    foreach($result as $key=>$value){
    }
} else{
    echo "Não foram encontrados resultados";
}
?>