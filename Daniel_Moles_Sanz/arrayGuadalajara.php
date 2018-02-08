<?php
//Cuantos habitantes tiene 
//nº habitantes guada provincia
//porcent homb y muj prov guadajara
echo "<h1> Tabla Habitantes </h1>";
$guadalajara["Azuqueca"]["Mujer"]=6500;
$guadalajara["Azuqueca"]["Hombre"]=5000;
$guadalajara["Guadalajara"]["Mujer"]=9000;
$guadalajara["Guadalajara"]["Hombre"]=9500;
$guadalajara["Alovera"]["Mujer"]=2200;
$guadalajara["Alovera"]["Hombre"]=2100;
$guadalajara["Cabanillas"]["Mujer"]=3500;
$guadalajara["Cabanillas"]["Hombre"]=4000;
$guadalajara["Quer"]["Mujer"]=1023;
$guadalajara["Quer"]["Hombre"]=1320;
$guadalajara["Torija"]["Hombre"]=1350;
$guadalajara["Majaelrayo"]["Mujer"]=250;

echo "<table border='1'>
        <tr>
            <th>Ciudad</th>
            <th>Genero</th>
            <th>Numero Habitantes</th>
        <tr>
";
foreach ($guadalajara as $ciudad => $generos){
    foreach ($generos as $genero => $poblacion){
        echo "<tr>
                <td>$ciudad</td>
                <td>$genero</td>
                <td>$poblacion</td>
              </tr>";
    }
}
echo "</table>";
echo "<br/>";
echo "<h1> Estadisticas </h1>";



foreach ($guadalajara as $ciudad => $generos){
    echo "En $ciudad hay: ".habitantesCiudad($guadalajara,$ciudad)." habitantes";
    echo "<br/>";
}
echo "En la provincia de Guadalajara hay un total de: ".habitantesTotales($guadalajara)." habitantes"."<br/>";
echo "El porcentaje de Mujer es ".round(porcentaje($guadalajara,habitantesTotales($guadalajara),"Mujer"),2)."%"."<br/>";
echo "El porcentaje de Hombre es ".round(porcentaje($guadalajara,habitantesTotales($guadalajara),"Hombre"),2)."%";

function habitantesCiudad($guadalajara,$ciudad){
    $habitantes=0;
   
    foreach ($guadalajara[$ciudad] as $genero => $poblacion){
        $habitantes+=$poblacion;
    }
    $suma=$habitantes;
    return $suma;
}

function habitantesTotales($guadalajara){
    $habitantes=0;
    foreach ($guadalajara as $ciudad => $generos){
        foreach ($generos as $genero => $poblacion){
            $habitantes+=$poblacion;
        }
    }
    $suma=$habitantes;
    return $suma;
}

function porcentaje($guadalajara,$total,$sexo){
    $habitantes=0;
    foreach ($guadalajara as $ciudad => $generos){
        foreach ($generos as $genero => $poblacion){
            if($genero == $sexo){
                $habitantes+=$poblacion;
            }
        }
    }

   $porcentaje=($habitantes*100)/$total;
   return $porcentaje;
   
}