<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de SESI&Oacute;N p&aacute;g.:2</title>
	</head>
	<body>
    	<?php
            session_start(); //Se crea la sesión
            echo "Mi id de sesisi&oacute;n es: " . session_id();
        ?> 
        <br/>
        <br/>
        <h1>Registro de SESI&Oacute;N p&aacute;g.:2</h1>
        <?php
            if (isset($_SESSION["usuario"])){
                
                echo "<h3>" . $_SESSION["usuario"] . " esta es tu web 2 </h3>";
                echo "<p> Aqu&iacute; hay cosas super importantes para ver </p>";
                echo "<p>Puedes ir a la <a href='Sesiones1.php'> p&aacute;g.:1 </a></p><br/>";
                
                ?>
                <form action='Sesiones1.php' method='post'>
                	<input type="hidden" name="Sesion" value="cerrar"/>
                	<input type="submit" value="CERRAR sesi&oacute;n"/>
                </form>
        		<?php 
            }else{
                echo "<h3 style='color: red;'> NO TIENES PERMISOS PARA VER ESTA WEB !!! </h3>";
                echo "<p>Registrese en <a href='Sesiones1.php'> p&aacute;g.:1 </a></p><br/>";
                
            }
        ?>
        <hr/>
        
	</body>
</html>
