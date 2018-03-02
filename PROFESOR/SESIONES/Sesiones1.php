<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Registro de SESI&Oacute;N p&aacute;g.:1</title>
	</head>
	<body>
    	<?php
            session_start(); //Se crea la sesión
            echo "Mi id de sesisi&oacute;n es: " . session_id();
        ?> 
        <br/>
        <br/>
        <h1>Registro de SESI&Oacute;N p&aacute;g.:1</h1>
        <?php
            if (isset($_SESSION["usuario"])){
                if (isset($_POST["Sesion"]) && $_POST["Sesion"] == "cerrar"){
                    //Se manda cerrar la sesión por parte del usuario
                    unset($_SESSION);
                    session_destroy();
                    $_SESSION = array();
                    header('Location: Sesiones1.php'); //redirecciono otra vez a la misma página pero ahora SIN estar logeado
                    
                }
                echo "<h3>Bienvenido " . $_SESSION["usuario"] . " </h3>";
                echo "<p>Puede ir a la <a href='Sesiones2.php'> p&aacute;g.:2 </a></p>";
                
            }else{
                if (isset($_POST["usuario"]) && isset($_POST["clave"])){
                    if ($_POST["usuario"]=="Antonio" && $_POST["clave"]=="1234"){
                        //Usuario correcto
                        $_SESSION["usuario"] = "Antonio";
                        header('Location: Sesiones1.php'); //redirecciono otra vez a la misma página pero ahora ya estará logeado el usuario
                    }else{
                        echo "<h3 style='color: red;'> Usuario y/o clave incorrectas, intentelo de nuevo </h3>";
                    }
                }else{
                    echo "<h3> Usted debe registrarse </h3>";
                    echo "<p><b>NO puede</b> ir a la <a href='Sesiones2.php'> p&aacute;g.:2 </a></p>";
                }
            }
        ?> 
        <hr/>
        <br/>
        <?php if (!isset($_SESSION["usuario"]))
        { ?>
            <form action='Sesiones1.php' method='post'>
            	<input type="text" name="usuario" placeholder="nombre"/>
            	<input type="password" name="clave" placeholder="clave"/>
            	<input type="submit" value="Iniciar sesi&oacute;n"/>
            	<input type="reset"/>
            </form>
        <?php }else
        {?>
            <form action='Sesiones1.php' method='post'>
            	<input type="text" name="usuario" value='<?php echo $_SESSION["usuario"] ?>' />
            	<input type="hidden" name="Sesion" value="cerrar"/>
            	<input type="submit" value="CERRAR sesi&oacute;n"/>
            </form>
        <?php 
        }?>
	</body>
</html>

    