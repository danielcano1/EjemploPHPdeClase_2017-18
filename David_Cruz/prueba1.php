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
echo "</br></br>";

$desplazamiento=0;
$numero=array(17, 34, 3=>45, 2, 7=>9,10=>-5, 7);
for($i=0; $i<(count($numero)+$desplazamiento); $i++){
    if(isset($numero[$i])){
        echo $numero[$i]."</br>";
    }else{
        $desplazamiento++;
    }
}
echo "</br></br>";

$nota=array("Antonio"=>12, 5, 5=>6);
foreach ($nota as $indice=>$valor){
    echo "La nota de $indice es $valor </br>";
}
echo "</br></br>";

$nota2[0]=9;
$nota2[1]=7;
$nota[0]=$nota2;
echo $nota[0][0]."</br>";
echo $nota[0][1]."</br>";
echo "</br></br>";

$notaA[0][0][0]="hola";
$notaA[0][0][1]="adios";
$notaA[0][1][0]="pepe";
$notaA[0][1][1]="juan";
$notaA[1][0][0]="fin";
$notaA[1][0][1]="inicio";
$notaA[1][1][0]="[";
$notaA[1][1][1]="]";
echo $notaA[1][1][0]." ".$notaA[0][0][0]." ".$notaA[0][1][0]." ".$notaA[1][1][1]."</br>";
echo $notaA[1][1][0]." ".$notaA[0][0][1]." ".$notaA[0][1][0]." ".$notaA[1][1][1]."</br>";
echo $notaA[0][1][1]." ".$notaA[0][0][1]." ".$notaA[1][1][0].$notaA[0][1][0].$notaA[1][1][1]."</br>";
echo "</br></br>";

$saludos[0]="hola";
$saludos[1]="adios";
$nombres[0]="pepe";
$nombres[1]="juan";
$estados[0]="fin";
$estados[1]="inicio";
$extremos[0]="[";
$extremos[1]="]";
$conversacion[0]=$saludos;
$conversacion[1]=$nombres;
$reglas[0]=$estados;
$reglas[1]=$extremos;
$todo[0]=$conversacion;
$todo[1]=$reglas;
echo $todo[1][1][0]." ".$todo[0][0][0]." ".$todo[0][1][0]." ".$todo[1][1][1]."</br>";
echo $todo[1][1][0]." ".$todo[0][0][1]." ".$todo[0][1][0]." ".$todo[1][1][1]."</br>";
echo $todo[0][1][1]." ".$todo[0][0][1]." ".$todo[1][1][0].$todo[0][1][0].$todo[1][1][1]."</br>";
echo "</br></br>";

/*Los indices en singular y lo demas en plural*/
$notaAlumnos["SMR"][1]["Pepe"]=10;
$notaAlumnos["SMR"][1]["Maria"]=9;
$notaAlumnos["SMR"][1]["Juan"]=7;
$notaAlumnos["SMR"][1]["Susana"]=10;
$notaAlumnos["SMR"][2]["Andres"]=5;
$notaAlumnos["SMR"][2]["Maria"]=4;
$notaAlumnos["ASIR"][1]["Tomas"]=3;
$notaAlumnos["DAW"][2]["Antonio"]=8;
$notaAlumnos["DAW"][1]["Cristina"]=9;
$notaAlumnos["SMR"][1]["Pepe"]=10;
$notaAlumnos["ASIR"][2]["Susana"]=9;
foreach ($notaAlumnos as $curso=>$niveles){
    foreach ($niveles as $nivel=>$nombres){
        foreach ($nombres as $nombre=>$nota){
            echo "El curso ".$curso." del nivel ".$nivel." tiene un alumno llamado ".$nombre." cuya nota es ".$nota."<br/>";
        }
    }
}
?>
