<?php
//Login de Hash

$arrayUser["Cristhian"]="Asir";
$hash=password_hash($arrayUser["Cristhian"], PASSWORD_DEFAULT);

if ((password_verify($_POST["pass"], $hash)))
{
    //VARIABLES GLOBALES   
    $equipos["Atleti"]["https://www.ligafutbol.net/wp-content/2009/04/escudo-atletico-de-madrid.png"]=40;
    $equipos["Valencia"]["https://www.ligafutbol.net/wp-content/2009/04/valenciacf.jpg"]=20;
    $equipos["Sevilla"]["https://www.ligafutbol.net/wp-content/2009/04/sevilla_fc.gif"]=15;
    $equipos["Espayol"]["https://www.ligafutbol.net/wp-content/2009/04/espanyol_rcd.gif"]=5;
    
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
        <th><a href='hashClasi.php?ordena=equipos'>Equipos</a></th>
        <th>Escudo</th>
        <th><a href='hashClasi.php?ordena=puntos'>Puntos</a></th>";
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
    
    echo cargarDatosTabla($equipos);
    
    echo "<br/>";
    
    echo "El numero de equipos son:" . count($equipos);
}else{
    echo "Imposible acceder a esta página, vuelva a intentarlo.";
}