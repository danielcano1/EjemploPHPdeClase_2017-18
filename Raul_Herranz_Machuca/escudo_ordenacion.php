<?php
$fila=0;
echo "<form action='escudo.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

$equipos["Real Madrid"]["escudo1"]=10;
$equipos["Barcelona"]["escudo2"]=20;
$equipos["Valencia"]["escudo3"]=30;
$equipos["Bilbao"]["escudo4"]=40;



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
            <th><a href='escudo_ordenacion.php?ORDENA=Eq'>Equipo</th>
            <th>Escudo</th>
            <th><a href='escudo_ordenacion.php?ORDENA=Puntos'>Puntos</a></th>
        <tr>
";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>".key($equipos)."</td>";
        echo "<td>".key($escudos)."</td>";
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
?>