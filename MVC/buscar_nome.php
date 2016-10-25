<?php

echo '<table>'
     . '<form method=post action=index.php?page=controller_BN>'
     . '<tr>'
     . '<td>Digite o Nome:</td>'
     . '<td><label>:<input type=text name=buscar_nome  autofocus></label></td>'
     . '<td alingn=middle width=200> <input type=submit name=buscar value=Buscar ></td>'
     . '<td><input type=reset name=limpar value=limpar></td>'   
     . '</tr>'
     . '</table>'
     . '</form>'           ;
?>
