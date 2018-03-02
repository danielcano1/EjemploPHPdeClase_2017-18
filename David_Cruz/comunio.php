<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php
	
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
    
    //si existen equipos que añadir, se añaden, si no te muestra la tabla
    
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
        echo "El numero de equipos es ".$cuenta."<br/>";
    ?>
    <table>
    	<form action="comunio.php" method="get">
    	<tr>
    		<td><label for="equipo">Escriba el nombre del equipo</label></td>
    		<td><input type="text" name="equipo"/></td>
    	</tr>
    	<tr>
    		<td><label for="escudo">Escriba la URL del escudo</label></td>
    		<td><input type="url" name="escudo"/></td>
    	</tr>
    	<tr>
    		<td><label for="puntos">Escriba el numero de puntos</label></td>
    		<td><input type="number" name="puntos"/></td>
    	</tr>
    	<tr>
    		<td><input type="submit" value="enviar"/></td>
    	</tr>
    	</form>
    </table><br/><br/>
    <?php
    }
    //Siguiente y anterior
    $incremento=0;
    $decremento=0;
    
        if(isset($_GET["desplazamiento"]) && isset($_COOKIE["fila"])){
            $desplazamiento=$_GET["desplazamiento"];
            $fila=$_COOKIE["fila"];
            if ($desplazamiento=="siguiente" && $fila<=count($ligaArray)+1){
                $fila++;
                setcookie("fila",$fila);
                for ($incremento=2; $incremento<=$fila ;$incremento++){
                    next($partidosArray);
                }
                echo key($partidosArray)." ".current($partidosArray);
                echo "<form action='comunio.php' method='get'>";
                
                echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
                
                echo "<input type='submit' name='desplazamiento' value='anterior'/>";
                
                echo "</form><br/>";
            }elseif ($desplazamiento=="siguiente" && $fila>count($ligaArray)+1) {
                echo "<form action='comunio.php' method='get'>";
                
                echo "<input type='submit' disabled='disabled' name='desplazamiento' value='siguiente'/>";
                
                echo "<input type='submit' name='desplazamiento' value='anterior'/>";
                
                echo "</form><br/>";
                $fila++;
                setcookie("fila",$fila);
            }
            if ($desplazamiento=="anterior" && $fila>1){
                $fila--;
                setcookie("fila",$fila);
                for ($decremento=2; $decremento<=$fila ;$decremento++){
                    next($partidosArray);
                }
                echo key($partidosArray)." ".current($partidosArray);
                echo "<form action='comunio.php' method='get'>";
                
                echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
                
                echo "<input type='submit' name='desplazamiento' value='anterior'/>";
                
                echo "</form><br/>";
            }elseif ($desplazamiento=="anterior" && $fila<=1){
                echo "<form action='comunio.php' method='get'>";
                
                echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
                
                echo "<input type='submit' disabled='disabled' name='desplazamiento' value='anterior'/>";
                
                echo "</form><br/>";
                $fila=0;
                setcookie("fila",$fila);
            }
        }else{
            $fila=0;
            setcookie("fila",$fila);
            reset($partidosArray);
            echo "<form action='comunio.php' method='get'>";
            
            echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
            
            echo "<input type='submit' name='desplazamiento' value='anterior'/>";
            
            echo "</form><br/>";
        }
    
    //Ordenar aquipos
    if (isset($_GET["ordenar"])){
        $ordenar=$_GET["ordenar"];
        if ($ordenar=="equipos"){
            ksort($ligaArray);
            reset($ligaArray);
        }
    }
    //boton borrar y modificar
    ?>
    <table>
    	<form action="comunio.php" method="get">
    	<tr>
    		<td><label for="nombreEquipo">Escriba el nombre del equipo que desea borrar</label></td>
    		<td><input type="submit" name="nombreEquipo" value="borrar"/></td>
    	</tr>
    	<tr>
    		<td><input type="submit" name="modificar" value="modificar"/></td>
    	</tr>
    	</form><br/>
    </table>
	</body>
</html>