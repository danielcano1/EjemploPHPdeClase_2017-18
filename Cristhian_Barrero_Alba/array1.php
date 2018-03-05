<?php

//Todo tipo de arrays, EJEMPLOS para poner
//ARRAYS

$numero=array(17, 34, 3=>45, 2, 7=>9, 10=>-5, 7);

echo $numero[4];

//Hacemos un for de la cuenta de cuantos numeros hay.
$desplazamiento=0;
for($i=0;$i<(count($numero)+$desplazamiento);$i++){
    if(isset($numero[$i]))
    echo $numero[$i]."<br />";
    else 
        $desplazamiento++;
}

echo "<br/><br/>";

//FOREACH
//Para ir pasando de un array a otro
$nota=array("Antonio"=>5, 4, 7, 5=>6, "Luis"=>9, 2, "Berta"=>7);
foreach ($nota as $i=>$v){
    echo "La nota de $i es $v<br/>";
}

echo "<br/><br/>";

//MULTIDIMENSIONAL

$nota2[0]=9;
$nota2[1]=7;
$nota[0]=$nota2;

$nota3[0]=9;
$nota[1]=$nota3;
echo $nota[0][0];
echo "<br/>";
echo $nota[1][0];
echo "<br/>";

$nota10[0][0][0]="HOLA";
$nota10[0][0][1]="ADIOS";
$nota10[0][1][0]="PEPE";
$nota10[0][1][1]="JUAN";
$nota10[1][0][0]="FIN";
$nota10[1][0][1]="INICIO";
$nota10[1][1][0]="[";
$nota10[1][1][1]="]";

echo $nota10[1][1][0] . " " . $nota10[0][0][0] . " " . $nota10[0][1][0] . " " . $nota10[1][1][1] . " " . "<br/>"; 
echo $nota10[1][1][0] . " " . $nota10[0][0][1] . " " . $nota10[0][1][0] . " " . $nota10[1][1][1] . " " . "<br/>"; 
echo $nota10[0][1][1] . " " . $nota10[0][0][1] . " " . $nota10[1][1][0] . " " . $nota10[0][1][0] . " " . $nota10[1][1][1] . " " . "<br/>"; 

$saludos[0]="HOLA";
$saludos[1]="ADIOS";

$nombres[0]="PEPE";
$nombres[1]="JUAN";

$estados[0]="FIN";
$estados[1]="INICIO";

$extremos[0]="[";
$extremos[1]="]";

$conversacion[0]=$saludos;
$conversacion[1]=$nombres;
$reglas[0]=$estados;
$reglas[1]=$extremos;

$todo[0]=$conversacion;
$todo[1]=$reglas;

echo "<br/>";
echo $todo[1][1][0] . " " . $todo[0][0][0] . " " . $todo[0][1][0] . " " . $todo[1][1][1] . " " . "<br/>";
echo $todo[1][1][0] . " " . $todo[0][0][1] . " " . $todo[0][1][0] . " " . $todo[1][1][1] . " " . "<br/>";
echo $todo[0][1][1] . " " . $todo[0][0][1] . " " . $todo[1][1][0] . " " . $todo[0][1][0] . " " . $todo[1][1][1] . " " . "<br/>"; 

















