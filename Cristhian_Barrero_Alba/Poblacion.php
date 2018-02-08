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

echo "<table><th>Pueblo</th>
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