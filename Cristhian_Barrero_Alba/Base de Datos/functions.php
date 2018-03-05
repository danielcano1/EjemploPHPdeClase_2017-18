<<?php

//Funciones de la pagina INDEX. IMPORTANTE TENER ENCENDIDO MYSQL
function dameConexion(){
    //Para dar conexion con la bd
    global $SERVIDOR;
    global $USUARIO;
    global $PASS;
    global $BBDD;
    
    $conexion = new mysqli ($SERVIDOR, $USUARIO, $PASS, $BBDD);
    //#2002 -  — El servidor no está respondiendo (o el zócalo local al servidor MySQL no está configurado correctamente).
    return $conexion;
}

//Carga los archivos del .txt y los clasifica, introduciendolos a la tabla
function inicializarBaseDatos(){
    $conexion = dameConexion(); // new mysqli ('localhost', 'root', '', 'foro');
    $conexion->query("truncate table equipos");
    $carga= "LOAD DATA LOCAL INFILE 'bbdd.txt'
  INTO TABLE equipos
  FIELDS TERMINATED BY '|'
  LINES TERMINATED BY ';'
  (Nombre, Escudo, Puntos, Entrada)";
    $conexion->query($carga);
    echo($conexion->error);
    $conexion->close();
}

function introducirDatosenTablaPartidos(){
    $conexion = dameConexion(); // new mysqli ('localhost', 'root', '', 'foro');
    $conexion->query("truncate table partidos");
    $carga= "LOAD DATA LOCAL INFILE 'bbdd2.txt'
  INTO TABLE partidos
  FIELDS TERMINATED BY '|'
  LINES TERMINATED BY ';'
  (Local, Visitante, Resultado, Entrada)";
    $conexion->query($carga);
    echo($conexion->error);
    $conexion->close();
}

//Para contar filas y entradas 
function contarFilas($numEntradas){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="select count(*) from equipos;";
    $resultado=$conexion->query($select);
    $numFilas=ceil(mysqli_fetch_row($resultado)[0]/$numEntradas);
    $conexion->close();
    return $numFilas;
}

function contarEntradas(){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="select count(*) from equipos;";
    $resultado=$conexion->query($select);
    $numEntradas=ceil(mysqli_fetch_row($resultado)[0]);
    $conexion->close();
    return $numEntradas;
}

//Para obtener los valores de la tabla de la BASE DE DATOS
function obtenerImagen($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select escudo
  from equipos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $imagenes=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $imagenes;
};

function obtenerNombreEquipo($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select nombre
  from equipos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $nombreEquipo=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $nombreEquipo;
};

function obtenerPuntosEquipo($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select puntos
  from equipos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $puntos=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $puntos;
};

function obtenerLocal($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select local
  from partidos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $local=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $local;
};

function obtenerVisitante($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select visitante
  from partidos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $visitante=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $visitante;
};

function obtenerResultado($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select resultado
  from partidos
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $resultado=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $resultado;
};

//Con esto imprimos una tabla con los valores que hemos obtenido de la base de datos
function imprimirTabla(){
    $actual=0;
    echo "
  <div class='container-fluid'>
  <table class='table' border=1>
    <th>Escudo</th>
    <th>Nombre</th>
    <th>Puntos</th>
";
    $columnasPorFila = 1;
    $filasNecesarias = contarFilas($columnasPorFila);
    for ($i=0; $i < $filasNecesarias; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columnasPorFila; $j++) {
            $actual=($i*$columnasPorFila)+$j;
            //if ($actual <= $filasNecesarias){
            echo "<td>";
            $imagen=obtenerImagen($actual);
            echo "<img src=" . "'" . $imagen . "'" ."' width='75px' height='75px'";
            echo "</td>";
            echo "<td>";
            echo obtenerNombreEquipo($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerPuntosEquipo($actual);
            echo "</td>";
            //}
        }
        echo "</tr>";
    }
    echo "
  </table>
  </div>";
}

function imprimirTablaPartidos(){
    $actual=0;
    echo "
  <div class='container-fluid'>
  <table class='table' border=1>
    <th>Local</th>
    <th>Visitante</th>
    <th>Resultado</th>
";
    $columnasPorFila = 1;
    $filasNecesarias = contarFilas($columnasPorFila);
    for ($i=0; $i < $filasNecesarias; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columnasPorFila; $j++) {
            $actual=($i*$columnasPorFila)+$j;
            //if ($actual <= $filasNecesarias){
            echo "<td>";
            echo obtenerLocal($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerVisitante($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerResultado($actual);
            echo "</td>";
            //}
        }
        echo "</tr>";
    }
    echo "
  </table>
  </div>";
}
?>