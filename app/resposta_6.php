<?php
/**6. Utilizando comandos SQL com o resultado da query que você desenvolveu acima,
  faça uma junção das tabelas (User, Order) selecionando apenas a coluna Total e Date, 
  de forma que exiba a SOMA dos totais de venda por MÊS/ANO. */

    require "conexao.php";

    $sql = new Sql();

    //Faz a consulta e soma os pedidos que tem o mesmo mês e ano
    $result = $sql->select("SELECT 
                                DATE_FORTMAT(o.order_date, '%Y-%M') AS order_date,
                                SUM(o.order_total) AS total_order
                            FROM order o
                            INNER JOIN user u
                            ON o.order_user_id = u.user_id");

    if($result){
        foreach($result as $key=>$value){
        }
    } else{
            echo "Não foram encontrados resultados";
    }
?>
