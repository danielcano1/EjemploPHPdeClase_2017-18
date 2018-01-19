<?php
function swp (&$x, &$y){
    $aux=$x;
    $x=$y;
    $y = $aux;
}

$valor1=12;
$valor2=27;
swp($valor1, $valor2);
    echo "<br/>" . $valor1 . " ".$valor2;
?>