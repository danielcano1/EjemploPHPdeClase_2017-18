<?php
$fila=0;
setcookie("fila",$fila);

echo "<form action='biwenger.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

$equipos["Real Madrid"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/real-madrid/escudo_peq.png"]=42;
$equipos["Barcelona"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/barcelona/escudo_peq.png"]=59;
$equipos["Valencia"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/valencia-cf/escudo_peq.png"]=43;
$equipos["Bilbao"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/athletic-club/escudo_peq.png"]=28;



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

//Arrays Partidos 
$partidos["Sevilla-RM"]="3-2";
$partidos["Barcelona-RM"]="2-2";
$partidos["Barcelona-Valencia"]="3-2";
$partidos["Barcelona-Betis"]="5-2";
$partidos["Atletico-Valencia"]="3-2";
$partidos["Valencia-RM"]="2-2";
$partidos["Bilbao-Valencia"]="5-2";
$partidos["Bilbao-Getafe"]="2-3";



//Ordenar Equipos
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

echo "<br/>";
echo "El total de equipos es: ".count($equipos)."</br>";
echo "<br/>";


//Botones Siguiente y Anterior

    echo "<form action='biwenger.php' method='get'>";
    echo "<input type='submit' value='Anterior' name='movimiento' />"; 
    echo "<input type='submit' value='Siguiente' name='movimiento'/>";
    echo "</form>";

if (isset($_GET["movimiento"]) && isset($_COOKIE["fila"])){
    $movimiento=$_GET["movimiento"];
    $fila=$_COOKIE["fila"];
    
    
    if ($movimiento == "Anterior"){
        $fila=$fila-1;
        setcookie("fila",$fila);    
        reset($partidos);
        for ($numeroIncremento = 2; $numeroIncremento <= $fila ;$numeroIncremento++){
                next($partidos);   
        }
        echo key($partidos)." ".current($partidos);

    } else {
        if ($movimiento == "Siguiente"){
            $fila++;
            setcookie("fila",$fila);
            for ($numeroIncremento = 2; $numeroIncremento <= $fila ;$numeroIncremento++){
                next($partidos);
            }
            echo key($partidos)." ".current($partidos);      
        }
    }
}

