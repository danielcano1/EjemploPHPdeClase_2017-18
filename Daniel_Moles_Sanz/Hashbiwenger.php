<?php
$clave=$_POST["password"];
$hash=password_hash("moles", PASSWORD_DEFAULT);
$arrayUsuario["daniel"]=$hash;
if (password_verify($clave, current($arrayUsuario))){


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
    cargarDatosEnTabla($equipos);
} else {
    echo "Error. No puedes acceder a este documento";
}

?>