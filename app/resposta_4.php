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