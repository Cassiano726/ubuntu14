<?php
/*Modificações passadas por Luiz da code education*/

use JCS\Banco;
use JCS\Conexao;




if(!empty($_POST)){
 
if(isset($_POST['buscar_nome'])){
    
$conexao = new Conexao(); //Instanciando o objeto conexao para poder usar o getDB

$obj = new Banco($conexao->getDB()); //Instanciando o objeto banco e passando como parametro o obj/conexao/getdb

$buscar = $_POST['buscar_nome'];

$obj->listarPN($buscar);
       
echo '<body>'
      . '<table>'
      . '<tr>'
      . '<td>Voltar Lista :</td>'  
      . '<td alingn=middle width=550><a href=index.php?page=views_produtos><input  type="submit" name="produtos" value="produtos" ></a>'
      . '</td>'
      . '</tr>'
       . '</table>'  
      . '</body>';
 }
}
?>