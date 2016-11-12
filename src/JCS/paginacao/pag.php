<?php
include 'Paginacao.php';

$itens_por_pagina = 3; //eu definir por quatro

//pegando a pagina atual
$pagina = isset($_GET['page']); //gambiarra!!!!! tinha que usar $_get['page'];
if (!$pagina) {
    $pagina = 1;
}

//puxando produtos do bano de dados 
$sql_code = "SELECT nome,descricao FROM produtos limit $pagina, $itens_por_pagina";
$execute = $mysqli->query($sql_code) or die($mysqli->error);
$produto = $execute->fetch_assoc();
$num = $execute->num_rows;

//pega a quantidade total de objetos do banco
$num_total = $mysqli->query("SELECT nome,descricao FROM produtos ")->num_rows;

$num_paginas = ceil($num_total / $itens_por_pagina);
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
        <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <h1>Produtos!</h1>
                    <?php if ($num > 0) { ?>
                        <table class="table table-bordered table-hover">
                            <thead >
                                <tr>
                                    <td>Código</td>
                                    <td>Nome</td>
                                                                 
                                </tr>
                            </thead>
                            <tbody>
                                <?php do { ?>
                                    <tr>
                                        
                                        <td><?php echo $produto['nome']; ?></td>
                                        <td><?php echo $produto['descricao']; ?></td>

                                    </tr>
                                <?php } while ($produtos = $execute->fetch_assoc()); ?>   
                            </tbody>
                        </table>
                   
                    <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="index.php? pagina=0" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 0; $i < $num_paginas; $i++) {
                                    $estilo  = "";
                                    if($pagina == $i){
                                        $estilo = "class=\"acton\"";
                                    }
                                ?>       
                                <li <?php echo $estilo;?> > <a href="index.php?pagina=<?php echo $i;?>"><?php echo $i+1;?></a></li>
                               <?php }?>
                                <li>
                                    <a href="index.php?pagina=<?php echo $num_paginas -1;?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    
                    <?php }?>
                </div>
            </div>
        </div>  


        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>