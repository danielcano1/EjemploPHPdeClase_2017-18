<?php
$tabla["SMR"][1]["pepe"]=10;
$tabla["SMR"][2]["maria"]=9;
$tabla["SMR"][3]["juan"]=7;
$tabla["SMR"][1]["susana"]=10;
$tabla["SMR"][1]["andres"]=5;
$tabla["SMR"][1]["maria"]=4;
$tabla["ASIR"][1]["tomas"]=3;
$tabla["DAW"][2]["antonio"]=8;
$tabla["DAW"][1]["cristina"]=9;
$tabla["ASIR"][2]["susana"]=2;

echo "<table border='1'>
        <tr>
            <td>curso</td>
            <td>nivel</td>
            <td>nombre</td>
            <td>nota</td>
        </tr>";
foreach ($tabla as $curso => $niveles){
    foreach ($niveles as $nivel => $nombres){
        foreach ($nombres as $nombre => $nota){
            //echo "<p>curso: $curso, nivel: $nivel, nombre: $nombre, nota: $nota";
            echo "<tr>
                    <td>$curso</td>
                    <td>$nivel</td>
                    <td>$nombre</td>
                    <td>$nota</td>
                  </tr>";
        }
    }
}
echo "Cantidad de cursos en el colegio: " . count ($tabla) . "<br/>";
echo "Cantidad de niveles en SMR: " . count ($tabla["SMR"]) . "<br/>";
echo "Cantidad de niveles en ASIR: " . count ($tabla["ASIR"]) . "<br/>";
echo "Cantidad de niveles en DAW: " . count ($tabla["DAW"]) . "<br/>";
echo "Cantidad de alumnos en 3 de SMR: " . count ($tabla["SMR"][3]) . "<br/>";
//function medias($tabla [$curso][$nivel]){
//    $suma=0;
//    foreach ($tabla["$curso"][$nivel] as $nombre => $nota){
//        echo $nombre . " ha sacado un " . $nota . "<br/>";
//        $suma=$suma + $nota;
//        
//    }
//}
$suma=0;
foreach ($tabla["SMR"][1] as $nombre => $nota){
        echo $nombre . " ha sacado un " . $nota . "<br/>";
        $suma=$suma + $nota;
        $numNotas=count();
        
        $media=$suma / ($nota);
        echo $media;
}