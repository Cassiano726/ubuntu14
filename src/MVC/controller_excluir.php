<?php

require'src/JCS/Banco.php';


if(!empty($_POST)){
    
    if(isset($_POST['id_excluir'])){
        
        //echo ''.$_POST['id_excluir'];
        $auxid = $_POST['id_excluir'];
        $auxnome = $_POST['nome_excluir'];
        
        $obj = new \JCS\Banco(require'src/JCS/conexao.php');
        
        $obj->deletar($auxid);
        header("Location:index.php?page=views_produtos");
        
    
        
    }
}
