<?php
    /**5. Utilizando comandos SQL, altere o campo Country do ID 4 da tabela User para "Canada" */

    require_once "conexao.php";

    $sql = new Sql();

    $result = $sql->select("UPDATE user
                            SET user_country = 'Canada' 
                            WHERE user_id = '4'");

    if($result > 0){
        echo "Campo 'Country' atualizado com sucesso para 'Canada' para o usuario de ID 4";
    }else{
        echo "Campo 'Country' do usuario ID 4 não atualizado";
    }
?>