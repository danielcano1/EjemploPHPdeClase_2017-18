<?php

$recorrefilas=0;
setcookie("cookie",$recorrefilas);

$nombrearchivo = "PartidosLaliga.php";



//array
$equipos["Betis"]["https://ssl.gstatic.com/onebox/media/sports/logos/S0fDZjYYytbZaUt0f3cIhg_96x96.png"]="50";
$equipos["Levante"]["https://ssl.gstatic.com/onebox/media/sports/logos/SQB-jlVosxVV1Ce79FhbOA_96x96.png"]="63";
$equipos["Villareal"]["https://ssl.gstatic.com/onebox/media/sports/logos/WKH7Ak5cYD6Qm1EEqXzmVw_96x96.png"]="47";
$equipos["Alaves"]["https://ssl.gstatic.com/onebox/media/sports/logos/meAnutdPID67rfUecKaoFg_96x96.png"]="38";


$partidos["Bet-Cel"]="3-1";
$partidos["Bet-Mal"]="2-1";
$partidos["Lev-Atm"]="4-4";
$partidos["Lev-Rso"]="1-2";
$partidos["Vil-Atm"]="0-1";
$partidos["Vil-Val"]="1-1";
$partidos["Alv-Leg"]="1-2";
$partidos["Alv-Dp"]="0-0";




if (isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
{
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    insertarEquipo($equipo,$escudo,$puntos);
    
}


if (isset($_GET["movimiento"]) && isset($_COOKIE["cookie"])){ //compruebo que movimiento y cookie no estan vacios
    $moverse=$_COOKIE["cookie"]; //guardo en la variable moverse el valor de cookie
    $valorrecorrer=$_GET["movimiento"]; //guardo en valorrecorrer el valor de movimiento Anterior o Siguiente
    
    if ($valorrecorrer == "Siguiente"){ // Creo un if, si $valor recorrer es siguiente
        $moverse++; // sumo 1 a la variable moverse cada vez que le doy a siguiente
        setcookie("cookie",$moverse); // vuelvo a llamar a una cookie y guardo moverse+1
        for($recorrefilas=0;$recorrefilas<=$moverse;$recorrefilas++){ // el for mostrara el siguiente partido hasta que $moverse este en el ultimo partido
            next($partidos);
        }
        echo key($partidos) ." ". current($partidos);
    }
    else
        if($valorrecorrer == "Anterior"){
        $moverse=$moverse-1;
        setcookie("cookie",$moverse);
            reset($partidos);
            for($recorrefilas=0;$recorrefilas<=$moverse;$recorrefilas++){ // el for mostrara el siguiente partido hasta que $moverse este en el ultimo partido
                next($partidos);
            }
            echo key($partidos) ." ". current($partidos);
         }
    }
 

function insertarEquipo($equipo,$escudo,$puntos){
    global $equipos;
    $equipos[$equipo][$escudo]=$puntos;
}



function cargarDatosTabla($equipos){
    echo "<table border='1'>
        <th>Equipo</th>
        <th>Escudo</th>
        <th>Puntos</th>";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos); // la imagen y puntos
        echo "<td>".key($equipos)."</td>"; //nombre del equipo
        echo "<td>"."<img src='".key($escudos)."'/>"."</td>"; //url de la imagen
        echo "<td>". current($escudos) ."</td>"; //solo los puntos
        echo "<tr>";
        next($equipos); // vas saltando de equipo en equipo
        
    }
    echo "</table>";
}


 








    
    

//HTML
//Para añadir nuevos equipos

echo "<form action='Liga.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Enviar'/>
      </form>";
echo cargarDatosTabla($equipos);

// siguiente - anterior

echo "<form action='PartidosLaliga.php' method='get'>
        <input type='submit' value='Siguiente' name='movimiento'/>
         <input type='submit' value='Anterior'name='movimiento'/>
      </form>";

    


