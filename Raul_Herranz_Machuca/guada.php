<?php
<?php
$sitios["Azuqueca"]["Mujeres"]=6500;
$sitios["Azuqueca"]["Hombres"]=2500;
$sitios["Cabanillas"]["Mujeres"]=5500;
$sitios["Cabanillas"]["Hombres"]=1500;
$sitios["Alovera"]["Mujeres"]=2000;
$sitios["Alovera"]["Hombres"]=6000;
$sitios["Guadalajara"]["Mujeres"]=10000;
$sitios["Guadalajara"]["Hombres"]=20000;
$sitios["Siguenza"]["Mujeres"]=1500;
$sitios["Siguenza"]["Hombres"]=2000;
$sitios["Villanueva"]["Mujeres"]=3000;

echo "<table border='1'>
        <tr>
            <td>ciudad</td>
            <td>sexo</td>
            <td>poblacion</td>
        </tr>";
foreach ($sitios as $ciudad => $sexos){
    foreach ($sexos as $sexo => $poblacion){
        //echo "<p>curso: $curso, nivel: $nivel, nombre: $nombre, nota: $nota";
        echo "<tr>
                    <td>$ciudad</td>
                    <td>$sexo</td>
                    <td>$poblacion</td>
                  </tr>";
    }
}

function cadaCiudad($sitios,$ciudad){
    $habitantes=0;
    foreach ($sitios["$ciudad"] as $sexo => $poblacion){
        //echo "En " . $ciudad . " hay " . $poblacion . " " . $sexo . "<br/>";
        $habitantes=$habitantes + $poblacion;
    }
    return "La poblacion de " . $ciudad . " es " . $habitantes . "<br/>";
}

function todas($sitios){
    $habitantes_todas=0;
    foreach ($sitios as $ciudad => $sexos){
        foreach ($sexos as $sexo => $poblacion){
            $habitantes_todas=$habitantes_todas + $poblacion;
        }
    }
    return $habitantes_todas ;
}

function total_generos($sitios,$sexo){
    $total_sexos=0;
    foreach ($sitios as $ciudad => $ciudades){
        foreach ($ciudades as $genero => $poblacion){
            if ($sexo==$genero){
                $total_sexos=$total_sexos + $poblacion;
            }
        }
    }
    return $total_sexos;
}

function porcentaje($array, $sexo){