<?php

$nota[0][0][0]="HOLA";
$nota[0][0][1]="ADIOS";
$nota[0][1][0]="PEPE";
$nota[0][1][1]="JUAN";
$nota[1][0][0]="FIN";
$nota[1][0][1]="INICIO";
$nota[1][1][0]="[";
$nota[1][1][1]="]";
$saludos[0]="HOLA";
$saludos[1]="ADIOS";
$nombres[0]="PEPE";
$nombres[1]="JUAN";
$estados[0]="INICIO";
$estados[1]="FIN";
$extremos[0]="[";
$extremos[1]="]";
$conversacion[0]=$saludos;
$conversacion[1]=$nombres;
$reglas[0]=$estados;
$reglas[1]=$extremos;
$todo[0]=$conversacion;
$todo[1]=$reglas;

//FACIL
echo $nota[1][1][0]. $nota[0][0][0] ." ".$nota[0][1][0]. $nota[1][1][1]."</br>";
echo $nota[1][1][0]. $nota[0][0][1] ." ".$nota[0][1][0]. $nota[1][1][1]."</br>";
echo $nota[0][1][1]." ". $nota[0][0][1]." ".$nota[1][1][0]. $nota[0][1][0]. $nota[1][1][1]."</br>";

//SIMPLIFICADO
echo $todo[1][1][0]. $todo[0][0][0] ." ".$todo[0][1][0]. $todo[1][1][1]."</br>";
echo $todo[1][1][0]. $todo[0][0][1] ." ".$todo[0][1][0]. $todo[1][1][1]."</br>";
echo $todo[0][1][1]." ". $todo[0][0][1]." ".$todo[1][1][0]. $todo[0][1][0]. $todo[1][1][1]
?>