<?php

echo     '<html>'
        . '<body>'
        . '<form method=post action=index.php?page=controller_novo_produto>'
        . '<table>'
        . '<tr>'
        . '<label>N° do Produto:<input type=hidder name=id_pizza autofocus></label>'
        . '<label>Nome da Pizza:<input type=text name=nome_pizza autofocus></label>'
        . '<label>Descrição:<input type=text name=descricao_pizza size=50 autofocus></label>'
        . '<label>Criado_em:<input type=text name=criado_pizza autofocus></label>'
        . '<label>Atualizado_em:<input type=text name=atualizado_pizza autofocus></label>'
        . '<label><input type=submit name=Novo value=Novo>'
        . '<input type=reset name=limpar value=Limpar></label>'
        . '</tr>'
        . '</table>'
        . '</form>'
        . '</body>'
        . '</html>';
