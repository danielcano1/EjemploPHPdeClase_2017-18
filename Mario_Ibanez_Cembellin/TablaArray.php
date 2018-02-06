<?php
$notaAlumnos["SMR"][1]["Pepe"]=10;
$notaAlumnos["SMR"][2]["Maria"]=9;
$notaAlumnos["SMR"][3]["Juan"]=7;
$notaAlumnos["SMR"][1]["Susana"]=10;
$notaAlumnos["SMR"][1]["Andres"]=5;
$notaAlumnos["SMR"][1]["Maria"]=4;
$notaAlumnos["ASIR"][1]["Tomas"]=3;
$notaAlumnos["DAW"][1]["Antonio"]=8;
$notaAlumnos["DAW"][1]["Cristina"]=9;
$notaAlumnos["ASIR"][1]["Susana"]=2;


echo "<table>

<th>Curso</th>
<th>Nivel</th>
<th>Nombre</th>
<th>Nota</th>";

foreach ($notaAlumnos as $curso =>  $niveles){
    foreach ($niveles as $nivel => $nombres){
        foreach ($nombres as $nombre => $valor){
           
            echo"<tr>
                <td>$curso</td> 
                <td>$nivel</td>
                <td> $nombre</td>
                <td> $valor</td>
            </tr>";
        }
    }    
}
echo "</table>";
echo "Cantidad de cursos en el Instituto ".count($notaAlumnos). "<br/>";
echo "Cantidad de cursos en SMR " .count($notaAlumnos["SMR"]). "<br/>";
echo "Cantidad de cursos en ASIR " .count($notaAlumnos["ASIR"]). "<br/>";
echo "Cantidad de cursos en DAW " .count($notaAlumnos["DAW"]). "<br/>";
echo "Cantidad de alumnos en 3 SMR " .count($notaAlumnos["SMR"][3]). "<br/>";
echo "Cantidad de alumnos en 1 SMR " .count($notaAlumnos["SMR"][1]). "<br/>";
   //te da las notas a la bruto echo "$nombres";
function calculoMedia($notaAlumnos,$curso,$nivel){
   $notaTotal=0;
   foreach ($notaAlumnos["SMR"][1] as $nombre => $valor){
       $notaTotal=$notaTotal+$valor;
       $notaMedia=$notaTotal/count($notaAlumnos["SMR"][1]);
   }
     echo "Nota media $notaMedia";
       
}
echo calculoMedia($notaAlumnos,"SMR",1);