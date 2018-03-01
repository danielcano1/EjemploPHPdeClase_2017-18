<?php
//VARIABLES GLOBALES
$fila=0;
$permisoAnterior=false;
$permisoSiguiente=false;

$equipos["Atleti"]["https://www.ligafutbol.net/wp-content/2009/04/escudo-atletico-de-madrid.png"]=40;
$equipos["Valencia"]["https://www.ligafutbol.net/wp-content/2009/04/valenciacf.jpg"]=20;
$equipos["Sevilla"]["https://www.ligafutbol.net/wp-content/2009/04/sevilla_fc.gif"]=15;
$equipos["Espayol"]["https://www.ligafutbol.net/wp-content/2009/04/espanyol_rcd.gif"]=5;

$partidos["Atleti"]["Atleti - Valencia"]="2-0";
$partidos["Atleti"]["Madrid - Atleti"]="1-0";
$partidos["Valencia"]["Valencia - Depor"]="0-0";
$partidos["Valencia"]["Barsa - Valencia"]="3-0";
$partidos["Sevilla"]["Villareal - Sevilla"]="0-2";
$partidos["Sevilla"]["Sevilla - Villareal"]="2-2";
$partidos["Espayol"]["Espayol - Malaga"]="2-2";
$partidos["Espayol"]["Espayol - Alaves"]="4-4";

//Parametros IFS
//Añadir un equipo
if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
{
    
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    
    echo añadirEquipo($equipo,$escudo,$puntos);
    
}


//Para desplazarse
if(isset($_GET["listado"]) && isset($_GET["posicion"])){
    
    if ($_GET["listado"] == "Anterior"){
        $fila= $_GET["posicion"] - 1;
    }else{
        $fila= $_GET["posicion"] + 1;
    }
    
    if ($fila <= 0){
        $fila = 0;
        $permisoAnterior = false;
    }else{
        $permisoAnterior = true;
    }
    
    if ($fila + 1 >= count($equipos)){
        $fila = count($equipos) - 1;
        $permisoSiguiente = false;
    }else{
        $permisoSiguiente = true;
    }
    
    grabarCookie();
}else{
    if (count($equipos) > 0){
        if ($fila < count($equipos)){
            $permisoSiguiente = true;
        }else{
            $permisoSiguiente = false;
        }
    }else{
        $permisoSiguiente = false;
    }
    grabarCookie();
}

//Ordenar
if(isset($_GET["ordena"]))
{
    $ordena=$_GET["ordena"];
    
    if($ordena=='equipos')
    {
        ksort($equipos);
        reset($equipos);
    }
    else
    {
        reset($equipos);
        asort($equipos,SORT_NUMERIC);
        reset($equipos);
    }
}
else
{
    
}


//FUNCIONES

function añadirEquipo($equipo,$escudo,$puntos){
    global $equipos;
    $equipos["$equipo"]["$escudo"]=$puntos;
}

function comprobarCookie(){
    global $fila;
    if(isset($_COOKIE["FilaActual"])){
        $fila = $_COOKIE["FilaActual"];
    }
}

function grabarCookie(){
    global $fila;
    setcookie("FilaActual", $fila, time()+60);
}

function insertarBotones($posicion){
    
    global $permisoAnterior;
    global $permisoSiguiente;
    
    echo "<form action='clasificacion1.php' method='get'>";
    if ($permisoAnterior)
    {
        echo "<input type='submit' name='listado' value='Anterior'/>";
    }else{
        echo "<input type='submit' name='listado' value='Anterior' disabled='disabled'/>";
    }
    
    if ($permisoSiguiente)
    {
        echo "<input type='submit' name='listado' value='Siguiente'/>";
    }else{
        echo "<input type='submit' name='listado' value='Siguiente' disabled='disabled'/>";
    }
    echo "<input type='hidden' name='posicion' value='" . $posicion . "'/>";
    echo "</form>";
}

function cargarDatosTabla($equipos){
    echo "<table border='1'>
        <th><a href='clasificacion1.php?ordena=equipos'>Equipos</a></th>
        <th>Escudo</th>
        <th><a href='clasificacion1.php?ordena=puntos'>Puntos</a></th>";
    while(current($equipos)){
        echo "<tr>";
        $escudos = current($equipos);
        echo "<td>".key($equipos)."</td>";
        echo "<td>"."<img src='".key($escudos)."' width='75px' height='75px'/>"."</td>";
        echo "<td>".current($escudos)."</td>";
        echo "<tr>";
        next($equipos);
    }
    echo "</table>";
}


//HTML
echo "<form action='clasificacion1.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Insertar'>
      </form>";

echo cargarDatosTabla($equipos);

insertarBotones($fila);

echo "El numero de equipos son:" . count($equipos);