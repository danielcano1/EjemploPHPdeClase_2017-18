<?php
$fila=0;
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
            <th>Equipo</th>
            <th>Escudo</th>
            <th>Puntos</th>
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

echo CargarDatosEnTabla($equipos);

$partidos["Real Madrid"]["Sevilla-RM"]="3-2";
$partidos["Real Madrid"]["Barcelona-RM"]="2-2";
$partidos["Barcelona"]["Barcelona-Valencia"]="3-2";
$partidos["Barcelona"]["Barcelona-Betis"]="5-2";
$partidos["Valencia"]["Atletico-Valencia"]="3-2";
$partidos["Valencia"]["Valencia-RM"]="2-2";
$partidos["Bilbao"]["Bilbao-Valencia"]="5-2";
$partidos["Bilbao"]["Bilbao-Getafe"]="2-3";


//echo "<form action='biwenger.php' method='get'>
//          <input type='hidden' value='obtenerPunteroFila()' name='fila'/>
//           <input type='submit' value='Anterior' name='movimiento' />
//          <input type='submit' value='Siguiente' name='movimiento'/>
//      </form>";
//$nombrePartidos=current($partidos);

//function obtenerPunteroFila(){
//    return $fila;
//}
//if (isset($_GET["movimiento"])){ 
//    $movimiento=$_GET["movimiento"];       
//        if ($movimiento == "Anterior"){
//            $fila=$_GET["fila"]-1;
//            echo $fila;
//            echo key($nombrePartidos)." ".current($nombrePartidos);
//            prev($partidos) ;
//        } else {
//            if ($movimiento == "Siguiente"){
//                echo key($nombrePartidos)." ".current($nombrePartidos);
//                next($partidos);
//           }
//      }
//}

