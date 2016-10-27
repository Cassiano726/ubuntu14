<?php
chdir(dirname(__DIR__));

require 'vendor/autoload.php';
require 'html/header.php';
require 'html/menu.php';
?>


<div id="conteudo">
<?php

if (!isset($_GET['page']))/* Na 1° versão desse código foi usado o <PHP if(!$_GET['page']).. */
    
    require("html/home.php");
else 
    require("src/JCS/{$_GET['page']}.php");//Lembrar que pode implementar dessa forma.



    //require_once($_GET['page'].".php");
    // require $_GET['page']."php";
/* Concatenação usando o (.)Ponto - Ele fala pra navegação.
  /* menu caso exista uma página .php sem ser a home.php! Então mostre ela aqui concatenando. */
?>
</div>
    <?php require('html/footer.php'); ?>



