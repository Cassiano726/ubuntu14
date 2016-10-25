<?php
require'src/JCS/Banco.php';



if(!empty($_POST)){
 
if(isset($_POST['buscar_nome'])){

$buscar = $_POST['buscar_nome']; 
    

$obj = new JCS\Banco(require'src/JCS/conexao.php');

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