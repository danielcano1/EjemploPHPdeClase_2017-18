<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    
    $SERVIDOR="localhost";
    $USUARIO="root";
    $PASS="";
    $BBDD="test";
    /*
    $SERVIDOR="localhost";
    $USUARIO="sergio";
    $PASS="sergio1234";
    $BBDD="sergio";
    
    */
    include "functions.php";
    include "createTable.php";
      creaTablaPartidos();
      inicializarBaseDatos();
      introducirDatosenTablaPartidos();
      imprimirTabla();
      imprimirTablaPartidos();
      
      ?>
  </body>
</html>