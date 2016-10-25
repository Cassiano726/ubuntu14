<?php
chdir(dirname(__DIR__));

require 'html/header.php';
require 'html/menu.php';
?>


<div id="conteudo">
<?php
if (!isset($_GET['page']))/* Na 1° versão desse código foi usado o <PHP if(!$_GET['page']).. */
    require("html/home.php");
else {
    if ($_GET['page'] == 'views_produtos') {
       require 'MVC/views_produtos.php';
    } elseif ($_GET['page'] == 'novo_produto') {
        require 'MVC/novo_produto.php';
    } elseif ($_GET['page'] == 'controller_novo_produto') {
        require 'MVC/controller_novo_produto.php';
    }elseif($_GET['page'] == 'editar_produto'){
        require 'MVC/editar_produto.php';
    }elseif($_GET['page'] == 'controller_editar_produto'){
        require 'MVC/controller_editar_produto.php';
    }elseif($_GET['page'] == 'excluir'){
        require 'MVC/excluir.php';
    }elseif($_GET['page'] == 'controller_excluir'){
        require 'MVC/controller_excluir.php';
    }elseif($_GET['page'] == 'buscar_nome'){
        require 'MVC/buscar_nome.php';
    }elseif($_GET['page'] == 'controller_BN'){
        require 'MVC/controller_BN.php';
    }



    //require_once($_GET['page'].".php");
    // require $_GET['page']."php";
}/* Concatenação usando o (.)Ponto - Ele fala pra navegação.
  /* menu caso exista uma página .php sem ser a home.php! Então mostre ela aqui concatenando. */
?>
</div>
    <?php require('html/footer.php'); ?>



