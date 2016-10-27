<?php

use JCS\Banco;
use JCS\Conexao;


if(!empty($_POST)){
    
    if(isset($_POST['id_excluir'])){
        
        
        $auxid = $_POST['id_excluir'];
        $auxnome = $_POST['nome_excluir'];
        
        $db = new Conexao();
        $obj = new Banco($db->getDB());
        
        $obj->deletar($auxid);
        header("Location:index.php?page=views_produtos");
        
    
        
    }
}
