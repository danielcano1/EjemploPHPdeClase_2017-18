<?php
/*Los indices en singular y lo demas en plural*/
$notaAlumnos["SMR"][1]["Pepe"]=10;
$notaAlumnos["SMR"][2]["Maria"]=9;
$notaAlumnos["SMR"][3]["Juan"]=7;
$notaAlumnos["SMR"][1]["Susana"]=10;
$notaAlumnos["SMR"][1]["Andres"]=5;
$notaAlumnos["SMR"][1]["Maria"]=4;
$notaAlumnos["ASIR"][1]["Tomas"]=3;
$notaAlumnos["DAW"][2]["Antonio"]=8;
$notaAlumnos["DAW"][1]["Cristina"]=9;
$notaAlumnos["SMR"][1]["Pepe"]=10;
$notaAlumnos["ASIR"][2]["Susana"]=9;
echo "<br/><br/>";
echo "<table>
    <tr>
        <td>Curso</td>
        <td>Año</td>
        <td>Nombre</td>
        <td>Nota</td>
    </tr>";
foreach ($notaAlumnos as $curso=>$niveles){
    foreach ($niveles as $nivel=>$nombres){
        foreach ($nombres as $nombre=>$nota){
                echo "<tr><td>".$curso."</td><td>".$nivel."</td><td>".$nombre."</td><td>".$nota."</tr>";
        }
    }
}
"</table>";
echo "<br/><br/>";

echo "El numero de niveles en SMR es ".count($notaAlumnos["SMR"])."<br/>";
echo "El numero de niveles en ASIR es ".count($notaAlumnos["ASIR"])."<br/>";
echo "El numero de niveles en DAW es ".count($notaAlumnos["DAW"])."<br/>";
echo "En primero de SMR hay ".count($notaAlumnos["SMR"][1])." alumnos <br/>";
echo "En segundo de SMR hay ".count($notaAlumnos["SMR"][2])." alumnos <br/>";
echo "En tercero de SMR hay ".count($notaAlumnos["SMR"][3])." alumnos <br/>";
function media($curso, $nivel){
    $sumatorio=0;
    foreach ($notaAlumnos["$curso"][$nivel] as $nombre=>$nota){
            $sumatorio=$sumatorio+$nota;
    }
    $numAlumnos=count($notaAlumnos[$curso][$nivel]);
    $media=$sumatorio/$numAlumnos;
    return "La media de ".$nivel." de ".$curso." es ".$media;
}
echo media($curso, $nivel);
echo "<br/><br/>";

?>