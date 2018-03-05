<?php
function introducirDatosenTablaUsuarios(){
    $conexion = dameConexion(); // new mysqli ('localhost', 'root', '', 'foro');
    $conexion->query("truncate table usuarios");
    $carga= "LOAD DATA LOCAL INFILE 'bbdd3.txt'
  INTO TABLE usuarios
  FIELDS TERMINATED BY '|'
  LINES TERMINATED BY ';'
  (usuario, password, id, Entrada)";
    $conexion->query($carga);
    echo($conexion->error);
    $conexion->close();
}

function obtenerUsuario($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select usuario
  from usuarios
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $usuario=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $usuario;
};

function obtenerPass($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select password
  from usuarios
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $password=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $password;
};

function obtenerID($actual){
    $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
    $select="
  select id
  from usuarios
  WHERE Entrada = $actual;";
    $resultado=$conexion->query($select);
    echo $conexion->error;
    $password=mysqli_fetch_row($resultado)[0];
    $conexion->close();
    return $password;
};

function imprimirTablaUsuarios(){
    $actual=0;
    echo "
  <div class='container-fluid'>
  <table class='table' border=1>
    <th>Usuario</th>
    <th>Pass</th>
    <th>ID<th/>
";
    $columnasPorFila = 1;
    $filasNecesarias = contarFilas($columnasPorFila);
    for ($i=0; $i < $filasNecesarias; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $columnasPorFila; $j++) {
            $actual=($i*$columnasPorFila)+$j;
            //if ($actual <= $filasNecesarias){
            echo "<td>";
            echo obtenerUsuario($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerPass($actual);
            echo "</td>";
            echo "<td>";
            echo obtenerID($actual);
            echo "</td>";
            //}
        }
        echo "</tr>";
    }
    echo "
  </table>
  </div>";
}