<?php
// FUNCION TABLA EQUIPOS
function creaTablaequipos(){
    // Create connection
    $conn =  dameConexion();//new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // TABLA EQUIPOS
    $sql = "CREATE TABLE equipos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Escudo VARCHAR(250),
    Puntos INT(3),
    Entrada INT(6)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    } else {
        
        //echo "Error creando la tabla: " . $conn->error;
    }
    $conn->close();
}

    // FUNCION TABLA PARTIDOS
function creaTablaPartidos(){
        // Create connection
        $conn =  dameConexion();//new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        // TABLA PARTIDOS
        $sql = "CREATE TABLE partidos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Local VARCHAR(15) NOT NULL,
        Visitante VARCHAR(15),
        Resultado VARCHAR(5),
        Entrada INT(6)
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "Tabla creada correctamente";
        } else {
            
            //echo "Error creando la tabla: " . $conn->error;
        }
        
        $conn->close();
}
// fUNCION CREAR USUARIOS
function creaTablaUsuarios(){
    // Create connection
    $conn =  dameConexion();//new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // TABLA USUARIOS 
    $sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(15) NOT NULL,
    password VARCHAR(250)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    } else {
        
        //echo "Error creando la tabla: " . $conn->error;
    }
    
    $conn->close();
}

?>
    


?>