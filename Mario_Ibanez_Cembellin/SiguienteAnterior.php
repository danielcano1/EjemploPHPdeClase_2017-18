<?php
//VARIABLES GLOBALES
$fila=0;
$nombreArchivoPHP = "EjemploSiguienteAnterior_Cookie.php";

$permisoParaIrAAnterior = false;
$permisoParaIrASiguiente = false;



$equipos["Real Madrid"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/real-madrid/escudo_peq.png"]=10;
$equipos["Barcelona"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/barcelona/escudo_peq.png"]=20;
$equipos["Valencia"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/valencia-cf/escudo_peq.png"]=30;
$equipos["Bilbao"]["http://www.lne.es/deportes/futbol/imgCompeticiones/primera-division/equipos/athletic-club/escudo_peq.png"]=40;


//RECOGEMOS LOS PARAMETROS DE INVOCACION A LA PAGINA SI EXISTEN

//SI SE QUIERE AGREGAR UNA NUEVA FILA
if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"])){
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    insertarArray($equipo,$escudo,$puntos);
}

comprobarSiHayUnaCookieParaLaFilaActualDeLosEquipos();

//SI SE QUIERE DESPLAZAR POR LA TABLA CON LOS BOTONES ANTERIOR Y SIGUIENTE
if(isset($_GET["Movimiento"]) && isset($_GET["posicion"])){
    
    if ($_GET["Movimiento"] == "Anterior"){
        $fila= $_GET["posicion"] - 1;
    }else{
        $fila= $_GET["posicion"] + 1;
    }
    
    //Limite Anterior es 0
    if ($fila <= 0){
        $fila = 0;
        $permisoParaIrAAnterior = false;
    }else{
        $permisoParaIrAAnterior = true;
    }
    
    //Limite Siguiente es el tamaño del array
    if ($fila + 1 >= count($equipos)){
        $fila = count($equipos) - 1;
        $permisoParaIrASiguiente = false;
    }else{
        $permisoParaIrASiguiente = true;
    }
    
    grabarCookieFilaActualEquipos();
    
    
}else{
    //SI EL PARAMETRO MOVIMIENTO NO EXISTE
    
    //Limite Siguiente es el tamaño del array
    if (count($equipos) > 0){
        if ($fila < count($equipos))
        {
            $permisoParaIrASiguiente = true;
        }else{
            $permisoParaIrASiguiente = false;
        }
    }else{
        $permisoParaIrASiguiente = false;
    }
    
    grabarCookieFilaActualEquipos();
    
}



//SI SE QUIERE ORDENAR LA TABLA EN FUNCION DE LOS EQUIPOS
if (isset($_GET["ORDENA"])){
    global $fila;
    $fila = 0;
    grabarCookieFilaActualEquipos();
    
    $Ordena=$_GET["ORDENA"];
    
    if ($Ordena=="Eq"){
        ksort($equipos);
        reset($equipos);
        //CargarDatosEnTabla($equipos);
    } else {
        reset($equipos);
        asort($equipos, SORT_NUMERIC); //NO FUNCIONARA CORRECTAMENTE POR SE PRETENDE ORDENAR UN ARRAY MULTIDIMENSIONAL Y asort ES SOLO PARA ARRAY UNIDIMENSIONAL
        
        reset($equipos);
        //CargarDatosEnTabla($equipos);
    }
    
} else {
    //ESTE ES EL CASO DONDE NO HAY PARAMETRO DE ORDENACION
    //CargarDatosEnTabla($equipos);
}

//*******************************************


//FUNCIONES

function grabarCookieFilaActualEquipos(){
    //GRABAMOS LA NUEVA POSICION EN LA COOKIE
    global $fila;
    setcookie("FilaActualEquipos", $fila, time()+60); //Solo se guarda 60seg desde que se creo la cookie
}
function comprobarSiHayUnaCookieParaLaFilaActualDeLosEquipos(){
    global $fila;
    if(isset($_COOKIE["FilaActualEquipos"])) {
        $fila = $_COOKIE["FilaActualEquipos"];
    }
}

function insertarBotonesAnteriorSiguiente($posicion){
    global $nombreArchivoPHP;
    global $permisoParaIrAAnterior;
    global $permisoParaIrASiguiente;
    
    echo "<form action='" . $nombreArchivoPHP . "' method='get'>";
    if ( $permisoParaIrAAnterior)
    {
        echo        "<input type='submit' name = 'Movimiento' value='Anterior'/>";
    }else{
        echo        "<input type='submit' disabled='disabled' name = 'Movimiento' value='Anterior'/>";
    }
    
    if ( $permisoParaIrASiguiente)
    {
        echo        "<input type='submit' name = 'Movimiento' value='Siguiente'/>";
    }else{
        echo        "<input type='submit' disabled='disabled' name = 'Movimiento' value='Siguiente'/>";
    }
    echo        "<input type='hidden' name = 'posicion' value='" . $posicion . "'/>";
    echo"</form>";
}

function insertarArray($equipo,$escudo,$puntos){
    global $equipos;
    $equipos["$equipo"]["$escudo"]="$puntos";
}

function CargarDatosEnTabla($equipos){
    global $fila;
    global $nombreArchivoPHP;
    
    echo "<table border='1'>
        <tr>
            <th>Escudo</th>
            <th><a href='" . $nombreArchivoPHP . "?ORDENA=Eq'>Equipo</a></th>
            <th><a href='" . $nombreArchivoPHP . "?ORDENA=Puntos'>Puntos</a></th>
        <tr>
    ";
    
    $numeroFilaTabla = 0;
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>"."<img src='".key($escudos)."'/>"."</td>";
        if ($numeroFilaTabla == $fila){
            //SE MARCA EN ROJO LA CELDA DEL EQUIPO ACTUAL
            echo "<td style='background-color: red;'>".key($equipos)."</td>";
        }else{
            echo "<td>".key($equipos)."</td>";
        }
        echo "<td>".current($escudos)."</td>";
        echo "</tr>";
        next($equipos);
        $numeroFilaTabla++;
    }
    echo "</table>";
    
}






//*********************************


//HTML
echo "<form action='" . $nombreArchivoPHP . "' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
                <input type='submit' value='Enviar'/>
      </form>";

CargarDatosEnTabla($equipos); //MUESTRA LA TABLA DE LOS EQUIPOS

insertarBotonesAnteriorSiguiente($fila); //MUESTRA LOS BOTONES DE NAVEGACION ANTERIOR Y SIGUIENTE

echo "El total de equipos es: ".count($equipos);


?>
