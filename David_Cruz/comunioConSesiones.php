<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<?php
session_start();
echo "Mi id de sesion es: " . session_id();
echo "<br/>";
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
        }
        if (isset($_SESSION["usuario"])){
            echo "Bienvenido ". $_SESSION["usuario"];
            if (isset($_POST["cerrarSesion"]) && $_POST["cerrarSesion"]=="cerrar"){
                unset($_SESSION);
                session_destroy();
                $_SESSION=array();
                header('Location: comunioConSesiones.php');
            }
            if ($_SESSION["usuario"]=="Juan"){
                echo " tu si puedes acceder a los botones";
                ?>
                <table>
                	<form action="comunioConSesiones.php" method="get">
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
                <table>
                	<form action="comunioConSesiones.php" method="get">
                	<tr>
                		<td><label for="nombreEquipo">Escriba el nombre del equipo que desea borrar</label></td>
                		<td><input type="submit" name="nombreEquipo" value="borrar"/></td>
                	</tr>
                	<tr>
                		<td><input type="submit" name="modificar" value="modificar"/></td>
                	</tr>
                	</form>
                </table><br/>
                <?php
            }else{
                echo ". Usted no tiene derecho a ver los botones para editar la tabla";
            }
            ?>
            <form action='comunioConSesiones.php' method='post'>
            	<input type="text" name="usuario" value='<?php echo $_SESSION["usuario"] ?>'/>
            	<input type="hidden" name="cerrarSesion" value="cerrar"/>
            	<input type="submit" value="Cerrar sesion"/>
            </form><br/>
        <?php
        }else{
            if(isset($_POST["usuario"]) && isset($_POST["contraseña"])){
                if (($_POST["usuario"]=="Juan" && $_POST["contraseña"]=="1234") || ($_POST["usuario"]=="Maria" && $_POST["contraseña"]=="1111")){
                    $_SESSION["usuario"]=$_POST["usuario"];
                    header('Location: comunioConSesiones.php');
                }else{
                    echo "Su usuario y/o contraseña no son validas";
                }
            }else{
                echo "Tienes que logearte primero para acceder a los botones para modificar la tabla";
                ?>
                <table>
                  	<form action="comunioConSesiones.php" method="post">
                    <tr>
                    	<td><label for="usuario">Escriba el nombre del usuario</label></td>
                    	<td><input type="test" name="usuario"/></td>
                    </tr>
                    <tr>
                    	<td><label for="contraseña">Escriba la contraseña</label></td>
                    	<td><input type="password" name="contraseña"/></td>
                    </tr>
                    <tr>
                    	<td><input type="submit" name="enviar" value="Enviar"/></td>
                    </tr>
                    </form>
                </table><br/>
                <?php
            }
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
                    echo "<form action='comunioConSesiones.php' method='get'>";
                    
                    echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
                    
                    echo "<input type='submit' name='desplazamiento' value='anterior'/>";
                    
                    echo "</form><br/>";
                }elseif ($desplazamiento=="siguiente" && $fila>count($ligaArray)+1) {
                    echo "<form action='comunioConSesiones.php' method='get'>";
                    
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
                    echo "<form action='comunioConSesiones.php' method='get'>";
                    
                    echo "<input type='submit' name='desplazamiento' value='siguiente'/>";
                    
                    echo "<input type='submit' name='desplazamiento' value='anterior'/>";
                    
                    echo "</form><br/>";
                }elseif ($desplazamiento=="anterior" && $fila<=1){
                    echo "<form action='comunioConSesiones.php' method='get'>";
                    
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
                echo "<form action='comunioConSesiones.php' method='get'>";
                
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
        ?>
	</body>
</html>