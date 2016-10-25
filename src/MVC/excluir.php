<?php
echo     '<html>'
        . '<body>'
        . '<form method=post action=index.php?page=controller_excluir>'
        . '<table>'
        . '<tr>'
        . '<label>N° Produto::<input type=number name=id_excluir autofocus></label>'
        . '<label>Nome ::<input type=text name=nome_excluir autofocus ></label>'
        . '<label><input type=submit name=excluir value=excluir>'
        . '<input type=reset name=limpar value=limpar></label>'
        . '</tr>'
        . '</table>'
        . '</form>'
        . '</body>'
        . '</html>';
?>
