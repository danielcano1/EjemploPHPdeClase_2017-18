<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    //La pagina principal para la base de datos. IMPORTANTE TENER CONECTADO MYSQL
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
    //Incluye las funciones en este php
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