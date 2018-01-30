<?php
echo "PRIMER PHP DE EJEMPLO: Daniel Cano </br>";
/*Las variables de dentro de una funcion son independientes de otras variables de otras funciones o del propio programa*/
$resultado=0;
    function doble($valor1){
        $resultado=2*$valor1;
        return $resultado;
    }
$var1=10;
$resul=doble($var1);
echo "El doble de ".$var1." es ".$resul."</br>";
echo "el doble del doble de 15 es: ".doble(doble(15))."</br></br></br>";



    function cambio(&$x,&$y){
        $aux=$x;
        $x=$y;
        $y=$aux;
    }
$valor1=12;
$valor2=17;
cambio($valor1, $valor2);
echo $valor1." ".$valor2."</br></br>";



function potencia($base,$exponente=2){
    $valor1=1;
    for ($i=1; $i<=$exponente; $i++){
        $valor1*=$base;
    }
    return $valor1."</br>";
}
echo potencia(2,3);
echo potencia(4);

function encadenar($numero,$caracterRelleno){
    global $texto;
    for ($i=1; $i<=$numero; $i++){
        $texto.=$caracterRelleno;
    }
}
$texto="Hola";
encadenar(12, "d");
echo $texto."</br>";

function factorial($n){
    if ($n<=1) {
        return 1;
    }else{
        return $n*factorial($n-1);
    }
}
echo factorial(5);
?>
