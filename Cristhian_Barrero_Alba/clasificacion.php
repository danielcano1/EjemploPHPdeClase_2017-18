<?php
//VARIABLES GLOBALES
$fila=0;
$permisoAnterior=false;
$permisoSiguiente=false;

$equipos["Atleti"]["https://www.ligafutbol.net/wp-content/2009/04/escudo-atletico-de-madrid.png"]=40;
$equipos["Valencia"]["https://www.ligafutbol.net/wp-content/2009/04/valenciacf.jpg"]=20;
$equipos["Sevilla"]["https://www.ligafutbol.net/wp-content/2009/04/sevilla_fc.gif"]=15;
$equipos["Espayol"]["https://www.ligafutbol.net/wp-content/2009/04/espanyol_rcd.gif"]=5;

$partidos["Betis"]["Betis - Valencia"]="2-0";
$partidos["Betis"]["Madrid - Betis"]="1-0";
$partidos["Levante"]["Levante - Depor"]="0-0";
$partidos["Levante"]["Barsa - Levante"]="3-0";
$partidos["Villareal"]["Villareal - Atleti"]="0-2";
$partidos["Villareal"]["Sevilla - Villareal"]="2-2";
$partidos["Alaves"]["Alaves - Malaga"]="2-2";
$partidos["Alaves"]["Celta - Alaves"]="4-4";

//Parametros IFS
//Añadir un equipo
if(isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
{
    
    $equipo=$_GET["equipo"];
    $escudo=$_GET["escudo"];
    $puntos=$_GET["puntos"];
    
    echo añadirEquipo($equipo,$escudo,$puntos);
    
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



function cargarDatosTabla($equipos){
    echo "<table border='1'>
        <th><a href='clasificacion.php?ordena=equipos'>Equipos</a></th>
        <th>Escudo</th>
        <th><a href='clasificacion.php?ordena=puntos'>Puntos</a></th>";
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
echo "<form action='clasificacion.php' method='get'>
        Equipo: <input type='text' name='equipo'/>
        Escudo: <input type='text' name='escudo'/>
        Puntos: <input type='text' name='puntos'/>
        <input type='submit' value='Insertar'>
      </form>";

echo cargarDatosTabla($equipos);

echo "El numero de equipos son:" . count($equipos);

//Manejo de equipos y partidos
echo "<form action='clasificacion.php' method='get'>
        <input type='hidden' value='puntos()' name='fila'/>
        <input type='submit' value='Anterior' name='listado'/>
        <input type='submit' value='Siguiente' name='listado'/>
      </form>";





