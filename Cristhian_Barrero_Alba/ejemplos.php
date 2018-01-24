<?php
function potencia($base,$exponente=2){
    $valor=1;
    for($i=1;$i<=$exponente;$i++){
        $valor*=$base;
    }
    return $valor;
}
echo "Ejemplo 1"."<br/>";
echo potencia(2,3)."<br/>";
echo potencia(4)."<br/>";
echo "<hr/>";
 
echo "Variables Globlales"."<br/>";

global $texto;


function encadenar($numero,$caracterRelleno){
    for ($i = 1; $i <= $numero; $i++) {
        $texto.=$caracterRelleno;
    }
    
}
$texto="Hola";
encadenar(12, "d");
echo $texto."<br/>";
encadenar(9, "+-");
echo $texto."<br/>";
?>