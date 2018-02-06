<?php

//Las tablas siempre tendrán las mismas dimensiones que columnas -1

$notaAlumno["SMR"][1]["PEPE"]=10;
$notaAlumno["SMR"][2]["MARIA"]=9;
$notaAlumno["SMR"][3]["JUAN"]=7;
$notaAlumno["SMR"][1]["SUSANA"]=10;
$notaAlumno["SMR"][1]["ANDRES"]=5;
$notaAlumno["SMR"][1]["MARIA"]=4;
$notaAlumno["ASIR"][1]["TOMAS"]=3;
$notaAlumno["DAW"][2]["ANTONIO"]=8;
$notaAlumno["DAW"][1]["CRISTINA"]=9;
$notaAlumno["ASIR"][2]["SUSANA"]=2;

echo "<table><th>Curso</th>
<th>Nivel</th>
<th>Nombre</th>
<th>Nota</th>";

foreach ($notaAlumno as $curso => $niveles) {
    foreach ($niveles as $nivel => $nombres) {
        foreach ($nombres as $nombre => $nota) {
            echo "<tr>
                <td>$curso</td>
                <td>$nivel</td>
                <td>$nombre</td>
                <td>$nota</td>
                </tr>";
        }
    }
}

echo "</table>";

echo "Cantidad de cursos en el instituto:" .count($notaAlumno) . "<br/>";

echo "Cantidad de niveles en SMR:" .count($notaAlumno["SMR"]) . "<br/>";
echo "Cantidad de niveles en ASIR:" .count($notaAlumno["ASIR"]) . "<br/>";
echo "Cantidad de niveles en DAW:" .count($notaAlumno["DAW"]) . "<br/>";

echo "Cantidad de alumnos en 3 de SMR:" .count($notaAlumno["SMR"][3]) . "<br/>";
echo "Cantidad de alumnos en 1 de SMR:" .count($notaAlumno["SMR"][1]) . "<br/>";

$notaTotal=0;
foreach ($notaAlumno["SMR"][1] as $nombre => $nota){
        $notaTotal=$notaTotal+$nota;
}

$notaMEDIASMR=$notaTotal/count($notaAlumno["SMR"][1]);
echo "La nota media de 1 de SMR es: $notaMEDIASMR";



