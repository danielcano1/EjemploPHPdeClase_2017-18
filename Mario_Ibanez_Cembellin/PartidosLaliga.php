<?php
echo "<form action='Liga.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Enviar'/>
      </form>";

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
        next($equipos); // vas saltoando de equipo en equipo
        
    }
    echo "</table>";
}
echo cargarDatosTabla($equipos);

//No se puede hacer 
$partidos["Betis"]["Bet-Cel"]="3-1";
$partidos["Betis"]["Bet-Mal"]="2-1";
$partidos["Levante"]["Lev-Atm"]="4-4";
$partidos["Levante"]["Lev-Rso"]="1-2";
$partidos["Villareal"]["Vil-Atm"]="0-1";
$partidos["Villareal"]["Vil-Val"]="1-1";
$partidos["Alaves"]["Alv-Leg"]="1-2";
$partidos["Alaves"]["Alv-Dep"]="0-0";


echo "<form action='Liga.php' method='get'>
        <input type='submit' value='Siguiente'/>
         <input type='submit' value='Anterior'/>
      </form>";
