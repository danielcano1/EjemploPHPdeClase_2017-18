<?php
//Variables GLobales
$numeroDeIntentos=0;
setcookie("intento",$numeroDeIntentos);

if (isset($_POST["usuario"]) && isset($_POST["password"])){
    echo $_COOKIE["intento"];
    if ($_COOKIE["intento"] <= 3){
        if ($_POST["usuario"] == "daniel" && $_POST["password"] == "moles"){
            echo "Correcto";
        } else {
            echo "Error";
            $numeroDeIntentos++;
            setcookie("intento",$numeroDeIntentos);
            
        }
    } else {
        echo "Demasiados Intentos";
    }
    
    

}

//Formulario Login
echo "<form action='loginConCookie.php' method='post'>
        Equipo: <input type='text' name='usuario'/>
        Escudo: <input type='text' name='password'/>
                <input type='submit' value='Enviar'/>
      </form>";