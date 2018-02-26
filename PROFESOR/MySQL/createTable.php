<?php

function creaTablaCarta(){
    // Create connection
    $conn =  dameConexion();//new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
    // sql to create table carta (Nombre, Coleccion, Imagen, fecha, entrada)
    $sql = "CREATE TABLE carta (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(30) NOT NULL,
    Coleccion VARCHAR(30) NOT NULL,
    Imagen VARCHAR(250),
    fecha TIMESTAMP,
    entrada INT(6)
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tabla creada correctamente";
    } else {
        
        //echo "Error creando la tabla: " . $conn->error;
    }
    
    $conn->close();
}
?>