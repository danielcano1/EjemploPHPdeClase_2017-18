<?php
echo "PRIMER PHP DE EJEMPLO: Mario Iba�ez";
echo "<hr/>";
//EJEMPLO DE FUNCIONES 19-Enero-18
$resultado = 0;
function doble($valor1){
    $resultado = 2 * $valor1;
    
    return $resultado;
}

$var1 = 10;
$resultado1 = doble($var1);
echo "<br/> la variable '$resultado' es: " . $resultado;
echo "<br/> El doble de " . $var1 . " es " . $resultado1;
echo "<br/> El doble de 15 es: " . doble(15);
echo "<br/> El doble del doble de 15 es: " . doble(doble(15));

function swap(&$x, &$y){
    $aux=$x;
    $x = $y;
    $y = $aux;
}

$valor1=82;
$valor2=77;
swap($valor1, $valor2);
echo "<br/> " . $valor1 . " ".$valor2;










?>