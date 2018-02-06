<html>
    <body>
        <?php
        $notaALUMNOS["SMR"][1]["PEPE"]=10;
        $notaALUMNOS["SMR"][2]["MARIA"]=9;
        $notaALUMNOS["SMR"][3]["JUAN"]=7;
        $notaALUMNOS["SMR"][1]["SUSANA"]=10;
        $notaALUMNOS["SMR"][1]["ANDRES"]=5;
        $notaALUMNOS["SMR"][1]["MARIA"]=4;
        $notaALUMNOS["SMR"][1]["ANDRES"]=5;
        $notaALUMNOS["ASIR"][1]["TOMAS"]=3;
        $notaALUMNOS["ASIR"][1]["TOMAS"]=3;
        $notaALUMNOS["DAW"][2]["ANTONIO"]=8;
        $notaALUMNOS["DAW"][1]["CRISTINA"]=9;
        $notaALUMNOS["ASIR"][2]["SUSANA"]=2;   
        function calcularMedia($cursito, $nivelsito){
            $notaALUMNOS["SMR"][1]["PEPE"]=10;
            $notaALUMNOS["SMR"][2]["MARIA"]=9;
            $notaALUMNOS["SMR"][3]["JUAN"]=7;
            $notaALUMNOS["SMR"][1]["SUSANA"]=10;
            $notaALUMNOS["SMR"][1]["ANDRES"]=5;
            $notaALUMNOS["SMR"][1]["MARIA"]=4;
            $notaALUMNOS["SMR"][1]["ANDRES"]=5;
            $notaALUMNOS["ASIR"][1]["TOMAS"]=3;
            $notaALUMNOS["ASIR"][1]["TOMAS"]=3;
            $notaALUMNOS["DAW"][2]["ANTONIO"]=8;
            $notaALUMNOS["DAW"][1]["CRISTINA"]=9;
            $notaALUMNOS["ASIR"][2]["SUSANA"]=2;
            $suma=0;
            foreach ($notaALUMNOS[$cursito][$nivelsito] as $nombre => $nota){
                
                $suma=$suma+$nota;
            }
            $media=$suma/count($notaALUMNOS[$cursito][$nivelsito]);
            return  "La nota media de ".$nivelsito." de ".$cursito." es ".$media. "  </br>";
        }

        echo "<table border=1>
        	<tr>
        		<th>Curso</th>
        		<th>Nivel</th>
        		<th>Nombre</th>
        		<th>Nota</th>
        	</tr>";
        foreach ($notaALUMNOS as $curso => $niveles){  
            foreach ($niveles as $nivel => $nombres){
                foreach ($nombres as $nombre => $nota){
                    echo "<tr><td>".$curso."</td><td>".$nivel."</td><td>".$nombre. "</td><td>".$nota."</td></tr>";                 
                }
            }
        }
        echo "</table>";
        echo "Cantidad de cursos: ". count($notaALUMNOS)."</br>";
        echo "Para el curso SMR hay ". count($notaALUMNOS["SMR"])." niveles </br>";
        echo "Para el curso ASIR hay ". count($notaALUMNOS["ASIR"])." niveles </br>";
        echo "Para el curso DAW hay ". count($notaALUMNOS["DAW"])." niveles </br>";
        echo "En tercero de SMR hay ". count($notaALUMNOS["SMR"][3])." alumnos </br>";
        echo "En primero de SMR hay ". count($notaALUMNOS["SMR"][1])." alumnos </br>";
        
        echo calcularMedia("SMR",1);               
        ?>
    </body>

</html>
