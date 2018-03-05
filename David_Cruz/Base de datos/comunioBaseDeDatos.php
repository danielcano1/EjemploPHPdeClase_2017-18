<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php
//funcion para conectarme con la base de datos
function iniciarConexion(){
    $SERVIDOR="localhost";
    $USUARIO="root";
    $PASS="";
    $BBDD="test";
    $conexion = new mysqli ($SERVIDOR, $USUARIO, $PASS, $BBDD);
    return $conexion;
}
//Funciones para crear las tablas
function crearTablaUsuarios(){
    $conn=iniciarConexion();
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(15) NOT NULL,
    password VARCHAR(250)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    }
    $conn->close();
}
function crearTablaEquipos(){
    $conn = iniciarConexion();
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE equipos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Escudo VARCHAR(250),
    Puntos INT(3),
    Entrada INT(6)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    }
    
    $conn->close();
}
function  crearTablaPartidos(){
    $conn = iniciarConexion();
    if ($conn->connect_error) {
        die("Conexion fallida: " . $conn->connect_error);
    }
    $sql = "CREATE TABLE partidos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Partido VARCHAR(50) NOT NULL,
    Resultado VARCHAR(5),
    Entrada INT(6)
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    }
    
    $conn->close();
}
//funciones para rellenar las tablas
function intoducirDatosEnTablaEquipos(){
    $conexion = iniciarConexion();
    $conexion->query("truncate table equipos");
    $carga= "LOAD DATA LOCAL INFILE 'bbdd1.txt'
    INTO TABLE equipos
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY ';'
    (Nombre, Escudo, Puntos, Entrada)";
    $conexion->query($carga);
    echo($conexion->error);
    $conexion->close();
}
function introducirDatosEnTablaPartidos(){
    $conexion = iniciarConexion();
    $conexion->query("truncate table partidos");
    $carga= "LOAD DATA LOCAL INFILE 'bbdd2.txt'
    INTO TABLE partidos
    FIELDS TERMINATED BY '|'
    LINES TERMINATED BY ';'
    (Partido, Resultado, Entrada)";
    $conexion->query($carga);
    echo($conexion->error);
    $conexion->close();
}

//funciones para la creaccion de tabla EQUIPO en php
function contarFilas($numEntradas){
    $conexion = iniciarConexion();
    $select="select count(*) from equipos;";
    $resultado=$conexion->query($select);
    $numFilas=ceil(mysqli_fetch_row($resultado)[0]/$numEntradas);
    $conexion->close();
    return $numFilas;
}
function obtenerNombreEquipo($actual){
    $conexion = iniciarConexion();
    $select="select nombre from equipos WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $nombreEquipo=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $nombreEquipo;
}
function obtenerImagen($actual){
    $conexion = iniciarConexion();
    $select="select escudo from equipos WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $imagenes=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $imagenes;
}
function obtenerPuntosEquipo($actual){
    $conexion = iniciarConexion();
    $select="select puntos from equipos WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $puntos=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $puntos;
}
function imprimirTablaEquipos(){
    $actual=0;
    echo "
    <div class='container-fluid'>
    <table class='table' border='1'>
    <th>Nombre</th>
    <th>Escudos</th>
    <th>Puntos</th>
";
    $columnasPorFila = 1;
    $filasNecesarias = contarFilas($columnasPorFila);
    for ($i=0; $i < $filasNecesarias; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columnasPorFila; $j++) {
            $actual=($i*$columnasPorFila)+$j;
            echo "<td>";
            echo obtenerNombreEquipo($actual);
            echo "</td>";
            echo "<td>";
            $imagen=obtenerImagen($actual);
            echo "<img src='".$imagen."' width='100px' height='100px'";
            echo "</td>";
            echo "<td>";
            echo obtenerPuntosEquipo($actual);
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "
  </table>
  </div>";
}
//funciones para crear tabla PARTIDOS en php
function obtenerPartido($actual){
    $conexion = iniciarConexion();
    $select="select partido from partidos WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $partido=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $partido;
}
function obtenerResultado($actual){
    $conexion = iniciarConexion();
    $select="select resultado from partidos WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $resultado=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $resultado;
}
function imprimirTablaDePartidos(){
    $actual=0;
    echo "
  <div class='container-fluid'>
  <table class='table'>
    <th>Partidos</th>
    <th>Resultado</th>
";
    $columnasPorFila = 1;
    $filasNecesarias = contarFilas($columnasPorFila);
    for ($i=0; $i < $filasNecesarias; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columnasPorFila; $j++) {
            $actual=($i*$columnasPorFila)+$j;
            echo "<td>";
            echo obtenerPartido($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerResultado($actual);
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "
  </table>
  </div>";
}
crearTablaEquipos();
crearTablaPartidos();
intoducirDatosEnTablaEquipos();
introducirDatosenTablaPartidos();
imprimirTablaEquipos();
imprimirTablaDePartidos();
?>
</body>
</html>