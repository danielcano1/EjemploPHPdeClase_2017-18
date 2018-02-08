<?php

$guadalajara["Azu"]["Hombres"]=5000;
$guadalajara["Azu"]["Mujeres"]=6000;
$guadalajara["Villa"]["Hombres"]=3000;
$guadalajara["Villa"]["Mujeres"]=2500;
$guadalajara["Alo"]["Hombres"]=4000;
$guadalajara["Alo"]["Mujeres"]=4500;
$guadalajara["Guada"]["Hombres"]=7000;
$guadalajara["Guada"]["Mujeres"]=8000;
$guadalajara["Caba"]["Hombres"]=2000;
$guadalajara["Caba"]["Mujeres"]=1500;
$guadalajara["Fonta"]["Mujeres"]=2000;

echo "<table border=1><th>Pueblo</th>
<th>Genero</th>
<th>Habitantes</th>";

foreach ($guadalajara as $pueblo => $generos) {
    foreach ($generos as $genero => $habitantes) {
            echo "<tr>
                <td>$pueblo</td>
                <td>$genero</td>
                <td>$habitantes</td>
                </tr>";
    }
}

echo "</table>";

echo "<br/>";
echo "<h2>" . "ESTADISTICAS: " . "</h2>";
echo "<hr/>";
echo "<br/>";

function habitantesPueblo($guadalajara,$pueblo){
    $resultadoHP=0;
    foreach ($guadalajara[$pueblo] as $genero => $habitantes){
        $resultadoHP=$habitantes+$resultadoHP;
    }
    return $resultadoHP;
}

foreach ($guadalajara as $pueblo => $generos){
    echo "Habitantes totales del pueblo $pueblo: " . habitantesPueblo($guadalajara,$pueblo) . "</br>";
}

function habitantesTotales($guadalajara){
    $resultadoTotal=0;
    foreach ($guadalajara as $pueblo => $generos){
        foreach ($generos as $genero => $habitantes){
        $resultadoTotal=$resultadoTotal+$habitantes;
        }
    }
    return $resultadoTotal;
}

echo "Habitantes totales en toda la provincia: " . habitantesTotales($guadalajara);

function porcentajeGenero($guadalajara,$sexo){
    $resultadoPor=0;
    $habTotal=0;
    foreach ($guadalajara as $pueblo => $generos){
        foreach ($generos as $genero => $habitantes){
            if ($sexo==$genero){
            $resultadoPor=$resultadoPor+$habitantes;
            }
            $habTotal=$habTotal+$habitantes;
        }
    }
    $porcentaje=($resultadoPor*100)/$habTotal;
    return $porcentaje;
}

echo "<br/>" . "El total de Hombres en toda la provincia es: " . round(porcentajeGenero($guadalajara,"Hombres"),2) . "%";
echo "<br/>" . "El total de Mujeres en toda la provincia es: " . round(porcentajeGenero($guadalajara,"Mujeres"),2) . "%";


