<?php
//Login de Hash

$arrayUser["raul"]="123";
$hash=password_hash($arrayUser["raul"], PASSWORD_DEFAULT);

//Comprobamos la contraseña con el hash
if ((password_verify($_POST["pass"], $hash)))
{
    //VARIABLES GLOBALES
    $equipos["Atleti"]["escudo1"]=40;
    $equipos["Valencia"]["escudo2"]=20;
    $equipos["Sevilla"]["escudo3"]=15;
    $equipos["Espayol"]["escudo4"]=5;
    
    //Parametros IFS
    
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
    
    function cargarDatosTabla($equipos){
        echo "<table border='1'>
        <th><a href='escudo_ordenacion.php?ordena=equipos'>Equipos</a></th>
        <th>Escudo</th>
        <th><a href='escudo_ordenacion.php?ordena=puntos'>Puntos</a></th>";
        while(current($equipos)){
            echo "<tr>";
            $escudos = current($equipos);
            echo "<td>".key($equipos)."</td>";
            echo "<td>".key($escudos)."</td>";
            echo "<td>".current($escudos)."</td>";
            echo "<tr>";
            next($equipos);
        }
        echo "</table>";
    }
    //HTML
    
    echo cargarDatosTabla($equipos);
    
    echo "<br/>";
    
    echo "El numero de equipos son:" . count($equipos);
}else{
    echo "Imposible acceder a esta página, vuelva a intentarlo.";
}