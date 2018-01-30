<?php

$valor=array(17, 34, 3=>45, 2, 7=>9, 10=>5, 6);
$tope=count($valor);
for ($i=0;$i<$tope;$i++){
    if(isset($valor[$i]))
        echo $valor[$i]. "</br>";
    else $tope++;
}
?>