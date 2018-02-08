<?php
$equipos["Betis"]["https://ssl.gstatic.com/onebox/media/sports/logos/S0fDZjYYytbZaUt0f3cIhg_96x96.png"]=50;
$equipos["Levante"]["https://ssl.gstatic.com/onebox/media/sports/logos/SQB-jlVosxVV1Ce79FhbOA_96x96.png"]=63;
$equipos["Villareal"]["https://ssl.gstatic.com/onebox/media/sports/logos/WKH7Ak5cYD6Qm1EEqXzmVw_96x96.png"]=47;
$equipos["Alaves"]["https://ssl.gstatic.com/onebox/media/sports/logos/meAnutdPID67rfUecKaoFg_96x96.png"]=38;

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

