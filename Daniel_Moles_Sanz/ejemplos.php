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
$texto="Hola ";
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

echo "<hr/>";

echo "Arrays"."<br/>";

$numero=array(17, 34, 3=>45, 2, 7=>9, 10=>-5, 7);
$desplazamiento=0;
for ($i=0;$i<(count($numero)+$desplazamiento);$i++){
    if (isset($numero[$i])){
        echo $numero[$i]."<br/>";
    }else{
        $desplazamiento++;
    }
}

echo "<hr/>";

$nota=array("Antonio"=>5, 4, 7, 5=>6, "Luis"=>9, 2, "Berta"=>7);
foreach ($nota as $i=>$v){
    echo "La nota de $i es $v"."<br/>";
}

echo "<hr/>";

//$nota2[0]=9;
//$nota2[1]=7;
//$nota[0]=$nota2;

//echo $nota[0][0]."<br/>"; 
//echo $nota[0][1];


$notaA[0][0][0]="Hola";
$notaA[0][0][1]="Adios";
$notaA[0][1][0]="Pepe";
$notaA[0][1][1]="Juan";
$notaA[1][0][0]="Fin";
$notaA[1][0][1]="Inicio";
$notaA[1][1][0]="[";
$notaA[1][1][1]="]";
echo $notaA[1][1][0]." ".$notaA[0][0][0]." ".$notaA[0][1][0]." ".$notaA[1][1][1]."<br/>";
echo $notaA[1][1][0]." ".$notaA[0][0][1]." ".$notaA[0][1][0]." ".$notaA[1][1][1]."<br/>";
echo $notaA[0][1][1]." ".$notaA[0][0][1]." ".$notaA[1][1][0].$notaA[0][1][0].$notaA[1][1][1]."<br/>";
echo "<hr/>";
$saludos[0]="Hola";
$saludos[1]="Adios";
$nombres[0]="Pepe";
$nombres[1]="Juan";
$estados[0]="Fin";
$estados[1]="Inicio";
$extremos[0]="[";
$extremos[1]="]";


$conversacion[0]=$saludos;
$conversacion[1]=$nombres;
$reglas[0]=$estados;
$reglas[1]=$extremos;
$todos[0]=$conversacion;
$todos[1]=$reglas;
echo $todos[1][1][0]." ".$todos[0][0][0]." ".$todos[0][1][0]." ".$todos[1][1][1]."<br/>";
echo $todos[1][1][0]." ".$todos[0][0][1]." ".$todos[0][1][0]." ".$todos[1][1][1]."<br/>";
echo $todos[0][1][1]." ".$todos[0][0][1]." ".$todos[1][1][0].$todos[0][1][0].$todos[1][1][1]."<br/>";

?>