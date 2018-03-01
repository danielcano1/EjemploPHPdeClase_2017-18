<?php
//Variables GLobales
$numeroDeIntentos=0;
if (isset($_COOKIE["intento"])){
    $cookie=$_COOKIE["intento"];
} else {
    setcookie("intento",$numeroDeIntentos,time()+120);
    $numeroDeIntentos++;
    cargarFormulario();
}

if (isset($_POST["usuario"]) && isset($_POST["password"])){
    if ($cookie < 3){
        if ($_POST["usuario"] == "daniel" && $_POST["password"] == "moles"){
            echo "Correcto";
        } else {
            $numeroDeIntentos=$_COOKIE["intento"];
            echo "Error, vuelve a intentarlo. Le quedan ".$numeroDeIntentos;           
            $numeroDeIntentos++;
            setcookie("intento",$numeroDeIntentos,time()+120);
            cargarFormulario();
        }
    } else {
        echo "Prueba en un rato";
        setcookie("intento",$numeroDeIntentos,time()+120);
    }
}



//Formulario Login
function cargarFormulario(){
echo "<form action='loginConCookie.php' method='post'>
        Equipo: <input type='text' name='usuario'/>
        Escudo: <input type='text' name='password'/>
                <input type='submit' value='Enviar'/>
      </form>";
}