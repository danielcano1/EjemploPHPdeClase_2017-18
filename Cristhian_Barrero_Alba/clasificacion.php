<?php
echo "<form action='clasificacion.php' method='get'>
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

$equipos["Atleti"]["https://www.ligafutbol.net/wp-content/2009/04/escudo-atletico-de-madrid.png"]=40;
$equipos["Valencia"]["https://www.ligafutbol.net/wp-content/2009/04/valenciacf.jpg"]=20;
$equipos["Sevilla"]["https://www.ligafutbol.net/wp-content/2009/04/sevilla_fc.gif"]=15;
$equipos["Espayol"]["https://www.ligafutbol.net/wp-content/2009/04/espanyol_rcd.gif"]=5;

function cargarDatosTabla($equipos){
    echo "<table border='1'>
        <th><a href='clasificacion.php?ordena=equipos'>Equipos</a></th>
        <th>Escudo</th>
        <th><a href='clasificacion.php?ordena=puntos'>Puntos</a></th>";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>".key($equipos)."</td>";
        echo "<td>"."<img src='".key($escudos)."' width='100px' height='100px'/>"."</td>";
        echo "<td>".current($escudos)."</td>";
        echo "<tr>";
        next($equipos);
    }
    echo "</table>";
}

if(isset($_GET["ordena"]))
{
    $ordena=$_GET["ordena"];
    
    if($ordena=='equipos')
    {
        echo $ordena;
        ksort($equipos);
        reset($equipos);
        cargarDatosTabla($equipos);
    }
    else
    {
        echo $ordena;
        reset($equipos);
        asort($equipos,SORT_NUMERIC);
        reset($equipos);
        cargarDatosTabla($equipos);
    }
}
else
{
    echo cargarDatosTabla($equipos);
}

echo "El numero de equipos son:" . count($equipos);

