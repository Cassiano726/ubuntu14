<?php
require'src/JCS/Banco.php';


if(!empty($_POST)){
    
    if(isset($_POST['id']) && isset($_POST['nome'])){
       
    $id_produto = $_POST['id'];
    $nome_novo_produto = $_POST['nome'];
    $descricao_nova_produto = $_POST['descricao'];
    $criado_em_aux = $_POST['criado_em'];
    $atualizado_em_aux = $_POST['atualizado_em'];
    
        
    $db = new \JCS\Banco(require'src/JCS/conexao.php');
    $db->editar($id_produto,$nome_novo_produto, $descricao_nova_produto, $criado_em_aux,$atualizado_em_aux);
    header("Location:index.php?page=views_produtos");
    
   } 
}
