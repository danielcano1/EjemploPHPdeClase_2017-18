<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php
	$Incremento=0;
	$Decremento=0;
	$fila=0;
	setcookie("fila",$fila);
	
	//Array equipos
    $ligaArray["Levante"]["http://www.lafutbolteca.com/wp-content/uploads/2010/01/LEVANTE.jpg"]=20;
    $ligaArray["Betis"]["https://img.vavel.com/real-betis-bob-6154023143.jpg"]=33;
    $ligaArray["Ath. Bilbao"]["http://2.bp.blogspot.com/--bcIfGzj2PQ/UHxNyJIugpI/AAAAAAAAEGU/J0UQ1SWqGAI/s1600/Athletic+Club1.jpg"]=28;
    $ligaArray["Sevilla"]["http://www.estadiodeportivo.com/elementosWeb/gestionCajas/EDE/Image/escudo-sevilla.jpg"]=36;
    
    //Array partidos
    $partidosArray["Real Madrid - Sevilla"]="3-2";
    $partidosArray["Barcelona - Real Madrid"]="2-0";
    $partidosArray["Eibar - Levante"]="0-0";
    $partidosArray["Eibar - Atletico de Madrid"]="0-2";
    $partidosArray["Betis - Levante"]="2-2";
    $partidosArray["Real Madrid - Betis"]="1-2";
    
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
    //Siguiente y anterior
    if(isset($_GET["desplazamiento"]) && isset($_COOKIE["fila"])){
        $desplazamiento=$_GET["desplazamiento"];
        $fila=$_COOKIE["fila"];
        if ($desplazamiento=="siguiente"){
            $fila++;
            setcookie("fila",$fila);
            reset($partidosArray);
            for ($Incremento=2; $Incremento<=$fila ;$Incremento++){
                next($partidosArray);
            }
            echo key($partidosArray)." ".current($partidosArray);
        }elseif ($desplazamiento=="anterior"){
            $fila--;
            setcookie("fila",$fila);
            reset($partidosArray);
            for ($Decremento=2; $Decremento<=$fila ;$Decremento++){
                next($partidosArray);
            }
            echo key($partidosArray)." ".current($partidosArray);
        }
    }
    ?>
    
    <form action="comunio.php" method="get">
    	<input type='hidden' value='obtenerPunteroFila()' name='fila'/>
    	<input type="submit" name="desplazamiento" value="siguiente"/>
    	<input type="submit" name="desplazamiento" value="anterior"/>
    </form>
    
    <?php
    //Ordenar aquipos
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