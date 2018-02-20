<?php
$equipos["Real Madrid"]["escudo1"]=42;
$equipos["Barcelona"]["escudo2"]=40;
$equipos["Atletico de Madrid"]["escudo3"]=6;
$equipos["Valencia"]["escudo4"]=38;

echo "<form>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
     </form>";

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
cargarDatosTabla($equipos);
?>