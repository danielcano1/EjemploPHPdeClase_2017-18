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




function encadenar($numero,$caracterRelleno){
    global $texto;
    for ($i = 1; $i <= $numero; $i++) {
        $texto.=$caracterRelleno;
    }
    
}
$texto="Hola";
encadenar(12, "d");
echo $texto."<br/>";
encadenar(9, "+-");
echo $texto."<br/>";
echo "<hr/>";

echo "Variables Estaticas"."<br/>";

function estatica(){
    static $cuenta=0;
    $cuenta++;
    echo "Esta es la llamada numero $cuenta<br/>";
}

for ($i=1;$i<=10;$i++){
    estatica();    
}

echo "<hr/>";

echo "Recursividad"."<br/>";

function factorial($n){
    if($n<=1) return 1;
    else return $n*factorial($n-1);
}
echo factorial(5);
?>