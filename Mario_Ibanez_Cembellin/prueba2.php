

<?php 
//Parametros predefinidos
function potencia($base,$exponente=2){
    $valor=1;
    for ($i=1;$i<=$exponente;$i++){
        $valor*=$base;
    }
    return $valor;
}

echo potencia(2,3) . " <br/> "; // no te coge el exponente ya que le das como valor 3
echo potencia(4); // te coge el exponente que vale 2


echo "<hr/>";
//Variables Gobales
function encadenar($numero, $caracterRelleno){
    global $texto;
    for($i=1;$i<=$numero;$i++){
        $texto .= $caracterRelleno;
    }
}

$texto="Holia";
encadenar (12,"d");
echo $texto."<br/>"; //Escribe holaddddddddddd
encadenar (9,"+-");
echo $texto. "<br/>";
?>