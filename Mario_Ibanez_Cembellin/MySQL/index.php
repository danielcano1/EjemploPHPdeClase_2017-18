<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/master.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    creaTablaCarta();
    creaTablaPartidos();
    inicializarBaseDatos();
    introducirDatosenTablaPartidos();
    imprimirTabla();
    imprimirTablaPartidos();
      ?>
  </body>
</html>
