<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php
    $ligaArray["Levante"]["http://www.lafutbolteca.com/wp-content/uploads/2010/01/LEVANTE.jpg"]=20;
    $ligaArray["Betis"]["https://img.vavel.com/real-betis-bob-6154023143.jpg"]=33;
    $ligaArray["Ath. Bilbao"]["http://2.bp.blogspot.com/--bcIfGzj2PQ/UHxNyJIugpI/AAAAAAAAEGU/J0UQ1SWqGAI/s1600/Athletic+Club1.jpg"]=28;
    $ligaArray["Sevilla"]["http://www.estadiodeportivo.com/elementosWeb/gestionCajas/EDE/Image/escudo-sevilla.jpg"]=36;
    $partidosArray["Real Madrid"]["Real Madrid - Sevilla"]="3-2";
    $partidosArray["Real Madrid"]["Barcelona - Real Madrid"]="2-0";
    $partidosArray["Eibar"]["Eibar - Levante"]="0-0";
    $partidosArray["Eibar"]["Eibar - Atletico de Madrid"]="0-2";
    $partidosArray["Betis"]["Betis - Levante"]="2-2";
    $partidosArray["Betis"]["Real Madrid - Betis"]="1-2";
    function cargarDatosEnTabla($array){
        echo "<table border='1'>
        <tr>
            <td><a href='ordenacionTablaComunio.php?ordenar=equipos'>Equipo</a></td>
            <td>Escudo</td>
         <td>Puntos</td>
        </tr>";
        reset($array);
        while(current($array)){
            $escudos=current($array);
            echo "<tr>";
                echo "<td>".key($array)."</td>";
                echo "<td><img src='".key($escudos)."'width='100px''height='100px'></td>";
                echo "<td>".current($escudos)."</td>";
            echo "</tr>";
        next($array);
        }
        echo "</table>";
        $cuenta=count($ligaArray);
        echo "El numero de equipos es ".$cuenta;
    }
    function añadirEquipo($equipo, $escudo, $puntos){
        global $ligaArray;
        $ligaArray["$equipo"]["$escudo"]=$puntos;
        echo cargarDatosEnTabla($ligaArray);
    }
    function siguienteEquipo($partidosArray){
        echo "<table border='1'>
        <tr>
            <td>Equipos</td>
            <td>Partidos</td>
            <td>Resultado</td>
        </tr>";
        while(next($partidosArray)){
            $partidos=current($partidosArray);
            echo "<tr>";
                echo "<td>".key($partidosArray)."</td>";
                echo "<td>".key($partidos)."</td>";
                echo "<td>".current($partidos)."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"])){
        echo añadirEquipo($_GET["equipo"], $_GET["escudo"], $_GET["puntos"]);
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
        echo "El numero de equipos es ".$cuenta;
    ?>
    <form action="comunio.php" method="get">
    	<label for="equipo">Escriba el nombre del equipo</label>
    	<input type="text" name="equipo"/><br/>
    	<label for="escudo">Escriba la URL del escudo</label>
    	<input type="url" name="escudo"/><br/>
    	<label for="puntos">Escriba el numero de puntos</label>
    	<input type="number" name="puntos"/><br/>
    	<input type="submit" value="enviar"/><br/><br/>
    </form>
    <?php
    }
    if(isset($_GET["siguiente"])){
        echo siguienteEquipo($partidosArray);
        next($partidosArray);
    }elseif(isset($_GET["anterior"])){
        echo anteriorEquipo($partidosArray);
        prev($partidosArray);
    }else{
    ?>
    <form action="comunio.php" method="get">
    	<input type="button" name="siguiente" value="siguiente"/>
    	<input type="button" name="anterior" value="anterior"/>
    </form>
    <?php
    }
    if (isset($_GET["ordenar"])){
        $ordenar=$_GET["ordenar"];
        if ($ordenar=="equipos"){
            ksort($ligaArray);
            reset($ligaArray);
            cargarDatosEnTabla($ligaArray);
        }
    }
    ?>
	</body>
</html>