<?php
$guadalajara["Azuqueca"]["Mujer"]=6500;
$guadalajara["Azuqueca"]["Hombre"]=2500;
$guadalajara["Alovera"]["Mujer"]=1500;
$guadalajara["Alovera"]["Hombre"]=900;
$guadalajara["Quer"]["Mujer"]=100;
$guadalajara["Quer"]["Hombre"]=100;
$guadalajara["Cabanillas"]["Mujer"]=1000;
$guadalajara["Cabanillas"]["Hombre"]=1200;
$guadalajara["Villanueva"]["Mujer"]=500;
$guadalajara["Villanueva"]["Hombre"]=700;
$guadalajara["Alpedrete"]["Hombre"]=700;


    echo "<table border='1'>
        <th>Pueblo</th>
        <th>Genero</th>
        <th>Poblacion</th>";

    foreach ($guadalajara as $pueblo => $generos){
        foreach($generos as $genero =>$numpoblacion){
            echo "<tr>
                    <td>$pueblo</td>
                    <td>$genero</td>
                    <td>$numpoblacion</td>
                  </tr>";
                
        }
    }

     echo "<hr/>";
    echo "Estadisticas.<br/>";
    $alrededores="Cabanillas";
    foreach($guadalajara as $pueblo => $generos){
        

        echo "El numero de Habitantes de $pueblo es: ". calculoTotalCiudad($guadalajara, "$pueblo")."<br/>";
    }
    
    echo "El total es". calculoTotalProvincia($guadalajara)."<br/>";




//Habitantes en TOTAL
    function calculoTotalProvincia($array){
        $poblacionT=0;
        foreach($array  as $pueblo => $generos){
            foreach($generos as $genero => $numpoblacion) {
                $poblacionT+=$numpoblacion;
            }
        }
        return $poblacionT;
    }
    
        
    
//Habitantes por CIUDAD
    function calculoTotalCiudad($array,$pueblo){
    $resultado=0;
    foreach($array[$pueblo] as $genero =>$numpoblacion ){
            $resultado=$numpoblacion+$resultado;   
        }
        return $resultado;    
    }
    
//Porcentaje de hombres y mujeres
    function totalHabitantesPorGenero($array,$sexo){
        $sumaDeSexo=0;
        foreach($array as $pueblo => $generos){
            foreach($generos as $genero => $numpoblacion){
                if($sexo==$genero){
                    $sumaDeSexo=$numpoblacion+$sumaDeSexo;   
                  
                }
                
              
            }
        }
      return  $sumaDeSexo;
     
    }
    
 $numeroMujeresTotales=(totalHabitantesPorGenero($guadalajara,"Mujer"));
 $numeroPersonasProvincia=(calculoTotalProvincia($guadalajara));

 $porcentajeMujeres=($numeroMujeresTotales/$numeroPersonasProvincia)*100;
 echo "Mujeres " .round($porcentajeMujeres,2)."%";
 
 $porcentajeHombres=100-$porcentajeMujeres;
 echo "Hombres " .round($porcentajeHombres,2)."%";

    
    
    
    