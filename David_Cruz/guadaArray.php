<?php
$guadaArray["Azuqueca"]["H"]=18000;
$guadaArray["Azuqueca"]["M"]=15000;
$guadaArray["Yunquera"]["H"]=2000;
$guadaArray["Yunquera"]["M"]=1800;
$guadaArray["Horche"]["H"]=1200;
$guadaArray["Horche"]["M"]=1000;
$guadaArray["Sigüenza"]["H"]=1000;
$guadaArray["Sigüenza"]["M"]=2000;
$guadaArray["Aragosa"]["H"]=16;
$guadaArray["Aragosa"]["M"]=10;
$guadaArray["Utopia"]["M"]=5000;
echo "<br/><br/>";


function numHabitantesCiudad($array){
    foreach ($array as $ciudad=>$generos){
        foreach ($generos as $genero=>$numHabitantes){
            if (!isset($array[$ciudad]["H"])){
                $array[$ciudad]["H"]=0;
            }
            if (!isset($array[$ciudad]["M"])){
                $array[$ciudad]["M"]=0;
            }
            $suma=$array[$ciudad]["H"]+$array[$ciudad]["M"];
            echo "<table>";
            echo "<tr><td>El numero total de habitantes en ".$ciudad." es ".$suma."</td></tr>";
            echo "</table>";
        }
    }
}
function numHabitantesProvincia($array){
    $sumatorio=0;
    foreach ($array as $ciudad=>$generos){
        foreach ($generos as $genero=>$numHabitantes){
            $sumatorio=$sumatorio+$numHabitantes;  
        }
    }
    return $sumatorio;
}
function totalPorGenero($array, $sexo){
    $sumaHombres=0;
    $sumaMujeres=0;
    foreach ($array as $ciudad=>$generos){
        foreach ($generos as $genero=>$numHabitantes){
            if ($genero=="H"){
                $sumaHombres=$sumaHombres+$numHabitantes;
            }
            if ($genero=="M"){
                $sumaMujeres=$sumaMujeres+$numHabitantes;
            }
        }
    }
    if ($sexo=="H"){
        return $sumaHombres;
    }else{
          return $sumaMujeres;
        }
}
function porcentajePoblacion($array, $sexo){
    $numeroTotalHabitantes=numHabitantesProvincia($array);
    $numeroTotalGenero=totalPorGenero($array, $sexo);
    $porcentaje=($numeroTotalGenero/$numeroTotalHabitantes)*100;
    $porcentaje=round($porcentaje, 2);
    return $porcentaje;
}
echo "<table>
    <tr>
        <td>Ciudad</td>
        <td>Genero</td>
        <td>Habitantes</td>
    </tr>";

foreach ($guadaArray as $ciudad=>$generos){
    foreach ($generos as $genero=>$numHabitantes){
        echo "<tr><td>".$ciudad."</td><td>".$genero."</td><td>".$numHabitantes."</td>";
    }
}
"</table>";
$sexo="M";
$suma=numHabitantesCiudad($guadaArray, $ciudad);
$totalHabitantesProvincia=numHabitantesProvincia($guadaArray);
$porcentajeMujeres=porcentajePoblacion($guadaArray, $sexo);
$porcentajeHombres=100-$porcentajeMujeres;
echo "<table>";
echo "<tr><td>El numero de habitantes en la privincia es ".$totalHabitantesProvincia."</td></tr>";
echo "<tr><td>El numero de habitantes en la privincia de genero ".$sexo." es ".$porcentajeMujeres."%</td></tr>";
echo "<tr><td>El numero de habitantes en la privincia de genero H es ".$porcentajeHombres."%</td></tr>";
echo "</table>";
echo "<br/><br/>";



?>