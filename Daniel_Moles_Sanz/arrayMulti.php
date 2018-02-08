<?php
$notasAlumno["SMR"][1]["Pepe"]=10;
$notasAlumno["SMR"][2]["Maria"]=9;
$notasAlumno["SMR"][3]["Juan"]=7;
$notasAlumno["SMR"][1]["Susana"]=10;
$notasAlumno["SMR"][1]["Andres"]=5;
$notasAlumno["SMR"][1]["Maria"]=4;
$notasAlumno["ASIR"][1]["Tomas"]=3;
$notasAlumno["DAW"][1]["Antonio"]=8;
$notasAlumno["DAW"][1]["Cristina"]=9;
$notasAlumno["ASIR"][2]["Susana"]=2;


echo "<table border=1>
        <tr>
            <th>Curso</th>
            <th>Nivel</th>
            <th>Nombre</th>
            <th>Nota</th>
        <tr>
";
foreach ($notasAlumno as $curso => $niveles){
    foreach ($niveles as $nivel => $nombres){
        foreach ($nombres as $nombre => $nota){
           
            echo "<tr>
                		<td>$curso</td>
                		<td>$nivel</td>
                		<td>$nombre</td>
                        <td>$nota</td>
                  </tr>
                  ";
        }
    }
    
}
echo "</table>";
echo "Cantidad de cursos en el instituto: ".count($notasAlumno)."<br/>";
echo "Cantidad de cursos en SMR: ".count($notasAlumno["SMR"])."<br/>";
echo "Cantidad de cursos en ASIR: ".count($notasAlumno["ASIR"])."<br/>";
echo "Cantidad de cursos en DAW: ".count($notasAlumno["DAW"])."<br/>";
echo "En 3 de smr hay: ".count($notasAlumno["SMR"][3])."<br/>";
echo "En 1 de smr hay: ".count($notasAlumno["SMR"][1])."<br/>";


function calcularMedia($notasAlumno,$curso,$nivel){
    $suma=0;
    foreach ($notasAlumno[$curso][$nivel] as $nombre => $nota){
        $suma=$nota+$suma;
        $numNotas=count($notasAlumno[$curso][$nivel]);   
    }
    $media=$suma/$numNotas;
    return "Las nota media es ".$media;
}

echo calcularMedia($notasAlumno,"SMR",1);




