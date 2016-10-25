<?php


/*incluir classe Banco.php*/
require 'src/JCS/Banco.php';

/*incluir classe Produto.php*/
//require'src/JCS/Produtos.php';

$obj_produto = new \JCS\Banco(require'src/JCS/conexao.php');
$obj_produto->listar();
