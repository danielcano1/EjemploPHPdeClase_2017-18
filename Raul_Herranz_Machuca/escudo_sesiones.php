<?php
$numeroIncremento=0;
$numeroDecremento=0;
$fila=0;

setcookie("fila",$fila);
echo "<form action='escudo.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

$equipos["Real Madrid"]["escudo1"]=42;
$equipos["Barcelona"]["escudo2"]=59;
$equipos["Valencia"]["escudo3"]=43;
$equipos["Bilbao"]["escudo4"]=28;

function CargarDatosEnTabla($equipos){
    echo "<table border='1'>
        <tr>
            <th><a href='escudo_ordenacion.php?ORDENA=Eq'>Equipo</th>
            <th>Escudo</th>
            <th><a href='escudo_ordenacion.php?ORDENA=Puntos'>Puntos</a></th>
        <tr>
";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>".key($equipos)."</td>";
        echo "<td>".key($escudos)."</td>";
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


echo "El total de equipos es: ".count($equipos)."</br>";


//Botones Siguiente y Anterior
echo "<form action='escudo.php' method='get'>
          <input type='hidden' value='obtenerPunteroFila()' name='fila'/>
           <input type='submit' value='Anterior' name='movimiento' />
          <input type='submit' value='Siguiente' name='movimiento'/>
      </form>";

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

//sesiones
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
                	<form action="escudo_sesiones.php" method="get">
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
                	<form action="escudo_sesiones.php" method="get">
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
                  	<form action="escudo_sesiones.php" method="post">
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
?>