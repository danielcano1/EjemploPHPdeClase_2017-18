<?php
$fila=0;
echo "<form action='biwenger.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

$equipos["Real Madrid"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/real-madrid/escudo_peq.png"]=10;
$equipos["Barcelona"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/barcelona/escudo_peq.png"]=20;
$equipos["Valencia"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/valencia-cf/escudo_peq.png"]=30;
$equipos["Bilbao"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/athletic-club/escudo_peq.png"]=40;



if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"])){
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    insertarArray($equipo,$escudo,$puntos);
}

function insertarArray($equipo,$escudo,$puntos){
    global $equipos;
    $equipos["$equipo"]["$escudo"]="$puntos";
}

function CargarDatosEnTabla($equipos){
    echo "<table border='1'>
        <tr>
            <th>Escudo</th>            
            <th><a href='biwengerOrdenacion.php?ORDENA=Eq'>Equipo</a></th>
            <th><a href='biwengerOrdenacion.php?ORDENA=Puntos'>Puntos</a></th>
        <tr>
";
    while(current($equipos)){
       echo "<tr>";
       $escudos = current($equipos);
       echo "<td>"."<img src='".key($escudos)."'/>"."</td>";
       echo "<td>".key($equipos)."</td>";       
       echo "<td>".current($escudos)."</td>";
       echo "</tr>";
       next($equipos);       
    }
    echo "</table>";
    
}

if (isset($_GET["ORDENA"])){
    $Ordena=$_GET["ORDENA"];  
    
    if ($Ordena=="Eq"){
        ksort($equipos);
        reset($equipos);
        CargarDatosEnTabla($equipos);
    } else {
        reset($equipos);
        asort($equipos, SORT_NUMERIC);
        
        reset($equipos);
        CargarDatosEnTabla($equipos);
    }

} else {
    CargarDatosEnTabla($equipos);
}


echo "El total de equipos es: ".count($equipos);
