<?php

$arrayDeUsuarios["Mario"]="mario123";
$funcionresumen=password_hash($arrayDeUsuarios["Mario"], PASSWORD_DEFAULT);
if (password_verify("mario123", $funcionresumen)){
    $equipos["Betis"]["https://ssl.gstatic.com/onebox/media/sports/logos/S0fDZjYYytbZaUt0f3cIhg_96x96.png"]="50";
    $equipos["Levante"]["https://ssl.gstatic.com/onebox/media/sports/logos/SQB-jlVosxVV1Ce79FhbOA_96x96.png"]="63";
    $equipos["Villareal"]["https://ssl.gstatic.com/onebox/media/sports/logos/WKH7Ak5cYD6Qm1EEqXzmVw_96x96.png"]="47";
    $equipos["Alaves"]["https://ssl.gstatic.com/onebox/media/sports/logos/meAnutdPID67rfUecKaoFg_96x96.png"]="38";
    
    if (isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
    {
        $equipo=$_GET["equipo"];
        $escudo=$_GET["escudo"];
        $puntos=$_GET["puntos"];
        insertarEquipo($equipo,$escudo,$puntos);
        
        
        
    }
    
    function insertarEquipo($equipo,$escudo,$puntos){
        global $equipos;
        $equipos[$equipo][$escudo]=$puntos;
    }
    
    
    
    function cargarDatosTabla($equipos){
        echo "<table border='1'>
        <th><a href='OrdenLaLiga.php?ordena=equipos'>Equipo</a></th>
        <th>Escudo</th>
        <th><a href='OrdenLaLiga.php?ordena=Puntos'>Puntos</a></th>";
        while(current($equipos)){ //comprubea si el current de equipos esta vacio
            echo "<tr>";
            $escudos = current($equipos); // la imagen y puntos
            echo "<td>".key($equipos)."</td>"; //nombre del equipo
            echo "<td>"."<img src='".key($escudos)."'/>"."</td>"; //url de la imagen
            echo "<td>". current($escudos) ."</td>"; //solo los puntos
            echo "<tr>";
            next($equipos); // vas saltoando de equipo en equipo
            
        }
        echo "</table>";
    }
    
    
    
    if (isset($_GET["ordena"]))
    {
        $nombvariable=$_GET["ordena"];
        
        if ($nombvariable=='equipos'){
            echo  $nombvariable;
            ksort($equipos);
            reset($equipos); //vuelve el puntero arriba
            cargarDatosTabla($equipos);
        }
        else{
            reset($equipos);
            asort($equipos);
            reset($equipos);
            cargarDatosTabla($equipos);
        }
        
    } else{
        cargarDatosTabla($equipos);
    }
    
    
    
    echo "Los equipos so " .count($equipos);

}
        else{
    	    echo "No puedes ver el documento";
    	}
    	?>
