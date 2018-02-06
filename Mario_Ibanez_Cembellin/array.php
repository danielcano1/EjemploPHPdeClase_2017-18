<?php
$numero=array(17, 34, 3=>45, 2, 7=>9, 10=>-5, 7);
$desplazamiento=0;
for($i=0;$i<(count($numero)+$desplazamiento);$i++){
    if(isset($numero[$i]))
        echo $numero [$i]."<br />";
    else 
            $desplazamiento++;
    
}
echo "<hr/>";
//forech

//$nota=array("Antonio"=>5, 4, 7, "Nombre"=>6, "Luis"=>9, 2, "Berta"=>7 );
//foreach ($nota as $i=>$v){
  //  echo "La nota de  $i es $v\n";}

echo "<hr/>";
//MULTIDIMENSIONAL
//$nota2[0]=9;
//$nota2[1]=7;
//$nota[0]=$nota2; //guardas el array entero 
//echo $nota[0][0];
//echo $nota[0][1];

echo "<hr/>";

$nota[0][0][0]="Hola";
$nota[0][0][1]="adios";
$nota[0][1][0]="Pepe";
$nota[0][1][1]="Juan";
$nota[1][0][0]="Fin";
$nota[1][0][1]="Inicio";
$nota[1][1][0]="[";
$nota[1][1][1]="]";

echo $nota[1][1][0] . " ". $nota[0][0][0] . " ". $nota[0][1][0] . " ". $nota[1][1][1] . "<br \>";
echo $nota[1][1][0] . " ". $nota[0][0][1] . " ". $nota[0][1][1] . " ". $nota[1][1][1] . "<br \>";
echo $nota[1][1][0] . " ". $nota[0][1][1] . " ". $nota[0][0][1] . " ". $nota[1][1][1] . "<br \>";

//Primera Dimension
$saludos[0] ="Hola";
$saludos[1] ="Adios";
$nombres[0] ="Juan";
$nombres[1] ="Pepe";
$estados[0]="fin";
$estados[1] ="inicio";
$extremos[0]="[";
$extremos[0]="]";

//Segunda Dimension
$conversacion[0]=$saludos;
$conversacion[1]=$nombres;
$relgas[0]=$estados;
$reglas[1]=$extremos;

$todos[0]=$conversacion;
$todos[1]=$reglas;

echo $todos[1][1][0] . " ". $todos[0][0][0] . " ". $todos[0][1][0] . " ". $todos[1][1][1] . "<br />";

echo $todos[0][1][1] . " ". $todos[0][0][1] . " ". $todos[1][1][0] . " ". $todos[0][1][0] . "<br />";

