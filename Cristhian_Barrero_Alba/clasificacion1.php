<?php
//Login de Hash
$arrayUser["Cristhian"]="Asir";
$hash=password_hash($arrayUser["Cristhian"], PASSWORD_DEFAULT);
if (password_verify($_POST["pass"], $hash))
{
//VARIABLES GLOBALES
$fila=0;
$permisoAnterior=false;
$permisoSiguiente=false;

$equipos["Atleti"]["https://www.ligafutbol.net/wp-content/2009/04/escudo-atletico-de-madrid.png"]=40;
$equipos["Valencia"]["https://www.ligafutbol.net/wp-content/2009/04/valenciacf.jpg"]=20;
$equipos["Sevilla"]["https://www.ligafutbol.net/wp-content/2009/04/sevilla_fc.gif"]=15;
$equipos["Espayol"]["https://www.ligafutbol.net/wp-content/2009/04/espanyol_rcd.gif"]=5;

$partidos["Atleti - Valencia"]="2-0";
$partidos["Madrid - Atleti"]="1-0";
$partidos["Valencia - Depor"]="0-0";
$partidos["Barsa - Valencia"]="3-0";
$partidos["Villareal - Sevilla"]="0-2";
$partidos["Sevilla - Villareal"]="2-2";
$partidos["Espayol - Malaga"]="2-2";
$partidos["Espayol - Alaves"]="4-4";

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
    
    if ($fila + 1 >= count($partidos)){
        $fila = count($partidos) - 1;
        $permisoSiguiente = false;
    }else{
        $permisoSiguiente = true;
    }
    
    grabarCookie();
    
    for($recorrerPartido=0;$recorrerPartido<$fila;$recorrerPartido++){
        next($partidos);
    }
    
}else{
    if (count($partidos) > 0){
        if ($fila < count($partidos)){
            $permisoSiguiente = true;
        }else{
            $permisoSiguiente = false;
        }
    }else{
        $permisoSiguiente = false;
    }
    grabarCookie();
    
    for($recorrerPartido=0;$recorrerPartido<$fila;$recorrerPartido++){
        next($partidos);
    }
    
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

//Ejercicio de Borrar y modificar los equipos

function BotonesModElm(){
    echo "<form action='clasificacion1.php' method='get'>
        <input type='submit' value='Modificar' name='ModElm'/>
        <input type='submit' value='Borrar' name='ModElm'/>
      </form>";
}

function Cambiar($equipoOriginal,$equipoAMod,$equipoModificado){
    $EditEquipo;
    reset ($equipoOriginal);
    
    while(current($equipoOriginal)){
        if (key($equipoOriginal) == $equipoAMod){
            InsertarMod($EditEquipo,array(key($equipoOriginal) => $equipoModificado));
        }else{
            InsertarMod($EditEquipo,array(key($equipoOriginal) => current($equipoOriginal)));
        }
            next($equipoOriginal);
    }
    return $EditEquipo;
}

function InsertarMod(&$Edit,$EditEquipo){
    $Edit = array_merge((array)$Edit,(array)$EditEquipo);
}

if(isset($_GET["Editar"]))
{
    $editarEquipo=$_GET["Editar"];    
    if($editarEquipo == 'EliminarEquipo'){
        $equipoBorr=$_GET["EquipoBorrar"];
        unset($equipos[$equipoBorr]);
    }else{
        $equipoMod=$_GET["EquipoModificar"];
        $escudoMod=$_GET["escudoMod"];
        $puntosMod=$_GET["puntosMod"];
        $arrayMod[$escudoMod]=$puntosMod;
        $equipos=Cambiar($equipos,$equipoMod,$arrayMod);
    }
}
else{
    if(isset($_GET["ModElm"])){

        $boton=$_GET["ModElm"];
        
        if($boton == 'Borrar'){
            echo "<form action='clasificacion1.php' method='get'>
                Que equipo quieres borrar?: <input type='text' name='EquipoBorrar'/>
                <input type='submit' value='EliminarEquipo' name='Editar'/>
              </form>
                <hr/>";
        } else {
            echo "<form action='clasificacion1.php' method='get'>
                Que equipo quieres modificar?: <input type='text' name='EquipoModificar'/>
                Escudo: <input type='text' name='escudoMod'/>
                Puntos: <input type='text' name='puntosMod'/>
                <input type='submit' value='ModificarEquipo' name='Editar'/>
              </form>
                <hr/>";
        }
    }
}

//Acaba el ejerc de borrar y modificar

//HTML
echo "<form action='clasificacion1.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Insertar'>
      </form>";

echo cargarDatosTabla($equipos);

insertarBotones($fila);

BotonesModElm();

echo key($partidos) . " " . current($partidos);

echo "<br/>";

echo "El numero de equipos son:" . count($equipos);
}else{
    echo "Imposible acceder a esta página, vuelva a intentarlo.";
}
