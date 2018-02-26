<?php
function dameConexion(){
  global $SERVIDOR;
  global $USUARIO;
  global $PASS;
  global $BBDD;
  
  $conexion = new mysqli ($SERVIDOR, $USUARIO, $PASS, $BBDD);
      //#2002 -  — El servidor no está respondiendo (o el zócalo local al servidor MySQL no está configurado correctamente).
  return $conexion;
}

function inicializarBaseDatos(){
  $conexion = dameConexion(); // new mysqli ('localhost', 'root', '', 'foro');
  $conexion->query("truncate table carta");
  $carga= "LOAD DATA LOCAL INFILE 'bbdd.txt'
  INTO TABLE carta
  FIELDS TERMINATED BY '|'
  LINES TERMINATED BY ';'
  (Nombre, Coleccion, Imagen, fecha, entrada)";
  $conexion->query($carga);
  echo($conexion->error);
  $conexion->close();
}
function contarFilas($numEntradas){
  $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
  $select="select count(*) from carta;";
  $resultado=$conexion->query($select);
  $numFilas=ceil(mysqli_fetch_row($resultado)[0]/$numEntradas);
  $conexion->close();
  return $numFilas;
}
function contarEntradas(){
  $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
  $select="select count(*) from carta;";
  $resultado=$conexion->query($select);
  $numEntradas=ceil(mysqli_fetch_row($resultado)[0]);
  $conexion->close();
  return $numEntradas;
}
function obtenerImagen($actual){
  $conexion = dameConexion(); //$conexion = new mysqli ('localhost', 'root', '', 'foro');
  $select="
  select imagen
  from carta
  WHERE entrada = $actual;";
  $resultado=$conexion->query($select);
  echo $conexion->error;
  $imagenes=mysqli_fetch_row($resultado)[0];
  $conexion->close();
  return $imagenes;
};
function imprimirTabla(){
  $actual=0;
  echo "
  <div class='container-fluid'>
  <table class='table'>";
  $columnasPorFila = 5;
  $filasNecesarias = contarFilas($columnasPorFila);
  for ($i=0; $i < $filasNecesarias; $i++) {
      echo "<tr>";
      for ($j=1; $j <= $columnasPorFila; $j++) {
        $actual=($i*$columnasPorFila)+$j;
        //if ($actual <= $filasNecesarias){
          echo "<td>";
          $imagen=obtenerImagen($actual);
          echo "<img src=" . "'" . $imagen . "'";
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
