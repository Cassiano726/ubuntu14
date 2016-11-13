<div>
    <!-- Página inicial. -->
    <form method="post" action="" name="produtos" class="navbar-form navbar-right">
        <div class="form-group">
            <input type="number" name="telanumero" class="form-control" placeholder="N° de produtos na tela" autofocus><!--Search -->
        </div>
        <button type="submit" name="produtos"class="btn btn-default">Exibir</button>                    
    </form>

    <?php
//defini o número de itens exibidos.
    $itens_por_pagina = 2;
    if (isset($_POST['produtos'])) {

        $itens_por_pagina = $_POST['telanumero'];        
    }else{
        $itens_por_pagina = 2;
    }
    ?>

    <?php
    include 'src/JCS/paginacao/Paginacao.php';


//pegando a pagina atual
//$pagina = intval($_GET['pagina']);

    $pagina = 0;

    if (isset($_GET['pagina'])) {
        $pagina = intval($_GET['pagina']);
    }



//puxando produtos do bano de dados 
    $sql_code = "SELECT nome,descricao FROM produtos LIMIT $pagina, $itens_por_pagina";
    $execute = $mysqli->query($sql_code) or die($mysqli->error);
    $produto = $execute->fetch_assoc();
    $num = $execute->num_rows;

//pega a quantidade total de objetos do banco
    $num_total = $mysqli->query("SELECT nome,descricao FROM produtos ")->num_rows;

//define o núemro de páginas 
    $num_paginas = ceil($num_total / $itens_por_pagina); //ceil arredonda para cima
//$num_paginas = ($num_total * $itens_por_pagina) - $itens_por_pagina;
    ?>


    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
            <title>Pizzaria D'Italia</title>

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
                        <h2>Pizza!</h2>
<?php if ($num > 0) { ?>
                            <table class="table table-bordered table-hover">
                                <thead >
                                    <tr>
                                        <td>Nome</td>
                                        <td>Descrição</td>                                                                 
                                    </tr>
                                </thead>
                                <tbody>
    <?php do { ?>
                                        <tr>                                        
                                            <td><?php echo $produto['nome']; ?></td>
                                            <td><?php echo $produto['descricao']; ?></td>
                                        </tr>
    <?php } while ($produto = $execute->fetch_assoc()); ?>   
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="index.php? pagina=0" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
    <?php
    for ($i = 0; $i < $num_paginas; $i++) {
        $estilo = "";
        if ($pagina == $i) {
            $estilo = "class=\"acton\"";
        }
        ?>       
                                        <li <?php echo $estilo; ?> > <a href="index.php?pagina=<?php echo $i; ?>"><?php echo $i + 1; ?></a></li>
                                    <?php } ?>
                                    <li>
                                        <a href="index.php?pagina=<?php echo $num_paginas - 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        <?php } ?>
                    </div>
                </div>
            </div>  


            <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
            <script src="js/bootstrap.min.js"></script>
        </body>
    </html>
</div>
