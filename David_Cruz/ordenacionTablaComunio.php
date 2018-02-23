<?php
$ligaArray["Levante"]["http://www.lafutbolteca.com/wp-content/uploads/2010/01/LEVANTE.jpg"]=20;
$ligaArray["Betis"]["https://img.vavel.com/real-betis-bob-6154023143.jpg"]=33;
$ligaArray["Ath. Bilbao"]["http://2.bp.blogspot.com/--bcIfGzj2PQ/UHxNyJIugpI/AAAAAAAAEGU/J0UQ1SWqGAI/s1600/Athletic+Club1.jpg"]=28;
$ligaArray["Sevilla"]["http://www.estadiodeportivo.com/elementosWeb/gestionCajas/EDE/Image/escudo-sevilla.jpg"]=36;
function cargarDatosEnTabla($ligaArray){
    echo "<table border='1'>
        <tr>
            <td><a href='ordenacionTablaComunio.php?ordenar=equipos'>Equipo</a></td>
            <td>Escudo</td>
         <td>Puntos</td>
        </tr>";
    while(current($ligaArray)){
        $escudos=current($ligaArray);
        echo "<tr>";
        echo "<td>".key($ligaArray)."</td>";
        echo "<td><img src='".key($escudos)."'width='100px''height='100px'></td>";
        echo "<td>".current($escudos)."</td>";
        echo "</tr>";
        next($ligaArray);
    }
    echo "</table>";
    $cuenta=count($ligaArray);
    echo "El numero de quipos es ".$cuenta;
}
if (isset($_GET["ordenar"])){
    $ordenar=$_GET["ordenar"];
    if ($ordenar=="equipos"){
        ksort($ligaArray);
        reset($ligaArray);
        cargarDatosEnTabla($ligaArray);
    }
}else{
    echo "<table border='1'>
        <tr>
            <td><a href='ordenacionTablaComunio.php?ordenar=equipos'>Equipo</a></td>
            <td>Escudo</td>
         <td>Puntos</td>
        </tr>";
    reset($ligaArray);
    while(current($ligaArray)){
        $escudos=current($ligaArray);
        echo "<tr>";
        echo "<td>".key($ligaArray)."</td>";
        echo "<td><img src='".key($escudos)."'width='100px''height='100px'></td>";
        echo "<td>".current($escudos)."</td>";
        echo "</tr>";
        next($ligaArray);
    }
    echo "</table>";
    $cuenta=count($ligaArray);
    echo "El numero de quipos es ".$cuenta;
}