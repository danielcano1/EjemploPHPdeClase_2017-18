<?php
session_start();
echo "Mi id de sesion es: " . session_id();
$fila=0;
setcookie("fila",$fila);
echo "<h2>Nuevo equipo</h2>";
echo "<form action='biwenger.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

//Array Equipos
$equipos["Real Madrid"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/real-madrid/escudo_peq.png"]=42;
$equipos["Barcelona"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/barcelona/escudo_peq.png"]=59;
$equipos["Valencia"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/valencia-cf/escudo_peq.png"]=43;
$equipos["Bilbao"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/athletic-club/escudo_peq.png"]=28;

//Arrays Partidos
$partidos["Sevilla-RM"]="3-2";
$partidos["Barcelona-RM"]="2-2";
$partidos["Barcelona-Valencia"]="3-2";
$partidos["Barcelona-Betis"]="5-2";
$partidos["Atletico-Valencia"]="3-2";
$partidos["Valencia-RM"]="2-2";
$partidos["Bilbao-Valencia"]="5-2";
$partidos["Bilbao-Getafe"]="2-3";


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
    
} 
// CargarDatosEnTabla($equipos);





//Botones Siguiente y Anterior

    echo "<hr/>";
    echo "<h2>Botones Para mostrar partidos</h2>";
    echo "<form action='biwenger.php' method='get'>";
    echo "<input type='submit' value='Anterior' name='movimiento' />"; 
    echo "<input type='submit' value='Siguiente' name='movimiento'/>";
    echo "</form>";

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


// Modificar o Borrar elementos

echo "<hr/>";
echo "<h2>Formulario para modificar.</h2>";


function Reemplazar($arrayOrigen, $key, $elementoNuevo){
    $nuevoArray;

    reset($arrayOrigen);
    while(current($arrayOrigen)){
        if (key($arrayOrigen) == $key){
            
            AñadirNuevoElemento($nuevoArray,array(key($arrayOrigen) => $elementoNuevo));
            
        }else{
            AñadirNuevoElemento($nuevoArray,array(key($arrayOrigen) => current($arrayOrigen)));
        }
        next($arrayOrigen);
    }
    
    return $nuevoArray;
    
}

function AñadirNuevoElemento(&$array,$nuevoArray){
    $array = array_merge((array)$array,(array)$nuevoArray);
}

function botonesBorrarModificar(){
    echo "<form action='biwenger.php' method='get'>
                <input type='submit' value='borrar' name='accion'/>
                <input type='submit' value='modificar' name='accion'/>
      </form>";
}


if (isset($_GET["accionEq"])){
    $eqModificarOBorrar=$_GET["accionEq"];
    $nombreEqModificarOBorrar=$_GET["equipoBorrar"];
    if ($eqModificarOBorrar == "modificarEq"){
        $equipoACambiar=$_GET["equipoBorrar"];
        $puntosN=$_GET["puntosN"];
        $escudoN=$_GET["escudoN"];
        $nuevoA[$escudoN]=$puntosN;
        $equipos = Reemplazar($equipos, $equipoACambiar, $nuevoA);
        
    } else {
        if ($eqModificarOBorrar == "borrarEq"){
            unset($equipos[$nombreEqModificarOBorrar]);
        }
    }
} else {
    if (isset($_GET["accion"])){
        $accionARealizar=$_GET["accion"];
        if ($accionARealizar == "borrar"){
            echo "<form action='biwenger.php' method='get'>
                Equipo que quieres Borrar: <input type='text' name='equipoBorrar'/>
                <input type='submit' value='borrarEq' name='accionEq'/>
                
      </form>";
        } else {
            if ($accionARealizar == "modificar"){
                echo "<form action='biwenger.php' method='get'>
                Equipo que quieres Modificar: <input type='text' name='equipoBorrar'/>
                                      Escudo: <input type='text' name='escudoN'/>
                                      Puntos: <input type='text' name='puntosN'/>
                <input type='submit' value='modificarEq' name='accionEq'/>
                    
                      </form>";
            } 
        }
    } 
}

echo "<hr/>";
echo "<h2>Tabla</h2>";
cargarDatosEnTabla($equipos);

echo "<br/>";
echo "El total de equipos es: ".count($equipos)."</br>";
echo "<br/>";

//Sesiones

if(isset($_SESSION["usuario"])){
    if (isset($_POST["sesion"]) && $_POST["sesion"] == "cerrar"){
        unset($_SESSION);
        session_destroy();
        $_SESSION=array();
        header('Location: biwenger.php');
    }
    echo "Bienvenido/a ". $_SESSION["usuario"];
    if ($_SESSION["usuario"] == "Juan"){
        echo " puedes realizar modificaciones sobre la tabla";
        botonesBorrarModificar();
    }
} else {
    if(isset($_POST["usuario"]) && isset($_POST["pass"])){
        if (($_POST["usuario"]=="Juan" && $_POST["pass"]=="1234") || ($_POST["usuario"]=="Maria" && $_POST["pass"]=="1111")){
            $_SESSION["usuario"] = $_POST["usuario"];
            echo $_SESSION["usuario"];
            header('Location: biwenger.php');
        } else {
            echo "Error. Su usuario o contraseña no son validos";
        }
    } else {
        echo "Tienes que loguearte primero";
    }
     
}
if (!isset($_SESSION["usuario"])){
echo "
<form action='biwenger.php' method='post'>
    <input type='text' name='usuario'/>
    <input type='password' name='pass'/>
    <input type='submit' value='Iniciar sesion'/>
</form>
";
} else {
echo "
<form action='biwenger.php' method='post'>
    <input type='text' name='usuario' value='"; echo $_SESSION["usuario"]; echo "'/>
    <input type='hidden' name='sesion' value='cerrar'/>
    <input type='submit' value='Cerrar sesion'/>
</form>
";
}

































