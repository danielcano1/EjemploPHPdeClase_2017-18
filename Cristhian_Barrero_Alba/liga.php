<?php
echo "<form action='liga.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Insertar'>
      </form>";

if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
{

    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    
    echo añadirEquipo($equipo,$escudo,$puntos);

}

function añadirEquipo($equipo,$escudo,$puntos){
    global $equipos;
    $equipos["$equipo"]["$escudo"]=$puntos;
}

$equipos["Betis"]["https://ssl.gstatic.com/onebox/media/sports/logos/S0fDZjYYytbZaUt0f3cIhg_96x96.png"]=10;
$equipos["Levante"]["https://ssl.gstatic.com/onebox/media/sports/logos/SQB-jlVosxVV1Ce79FhbOA_96x96.png"]=20;
$equipos["Villareal"]["https://ssl.gstatic.com/onebox/media/sports/logos/WKH7Ak5cYD6Qm1EEqXzmVw_96x96.png"]=30;
$equipos["Alaves"]["https://ssl.gstatic.com/onebox/media/sports/logos/meAnutdPID67rfUecKaoFg_96x96.png"]=40;

function cargarDatosTabla($equipos){
    echo "<table border='1'>
        <th>Equipo</th>
        <th>Escudo</th>
        <th>Puntos</th>";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>".key($equipos)."</td>";
        echo "<td>"."<img src='".key($escudos)."'/>"."</td>";
        echo "<td>".current($escudos)."</td>";
        echo "<tr>";
        next($equipos);        
    }
    echo "</table>";
}
echo cargarDatosTabla($equipos);
echo "<br/>";

//Se necesita JavaScript para lo de abajo.
echo "<form action='liga.php' method='get'>
        <input type='submit' value='Anterior' name='listado'/>
        <input type='submit' value='Siguiente' name='listado'/>
      </form>";

$partidos["Betis"]["Betis - Valencia"]="2-0";
$partidos["Betis"]["Madrid - Betis"]="1-0";
$partidos["Levante"]["Levante - Depor"]="0-0";
$partidos["Levante"]["Barsa - Levante"]="3-0";
$partidos["Villareal"]["Villareal - Atleti"]="0-2";
$partidos["Villareal"]["Sevilla - Villareal"]="2-2";
$partidos["Alaves"]["Alaves - Malaga"]="2-2";
$partidos["Alaves"]["Celta - Alaves"]="4-4";




