<?php
$equipos["Real Madrid"]["escudo1"]=42;
$equipos["Barcelona"]["escudo2"]=40;
$equipos["Atletico de Madrid"]["escudo3"]=6;
$equipos["Valencia"]["escudo4"]=38;

echo "<form>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Enviar'/>
     </form>";

if (isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
{
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    insertarTeam($equipo,$escudo,$puntos);
    
    
    
}

function insertarTeam($equipo,$escudo,$puntos){
    global $equipos;
    $equipos[$equipo][$escudo]=$puntos;
}

function cargarDatosTabla($equipos){
    echo "<table border='1'>
            <tr>
                <td>Equipo</td>
                <td>Escudo</td>
                <td>Puntos</td>
            </tr>
";
    while (current($equipos)){
        $escudos=(current($equipos));
        echo "<tr>
                <td>" . key($equipos) . "</td>";
        echo   "<td>" . key($escudos) . "</td>";
        echo   "<td>" . current($escudos) . "</td>";
        echo "</tr>";
        next($equipos);
    }
    echo "</table>";
}

if (isset($_GET["ordena"]))
{
    $nombvariable=$_GET["ordena"];
    
    if ($nombvariable=='puntos'){
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

cargarDatosTabla($equipos);
?>