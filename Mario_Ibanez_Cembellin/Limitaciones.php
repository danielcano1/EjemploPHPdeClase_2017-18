<?php
//Variables globales
$nombreproyecto = "Limitaciones.php";
$intentos=0;



if(isset($_GET["usuario"]) && isset($_GET["pass"])){
    
    
    
    if($_GET["usuario"] == "valido" && $_GET["pass"] == "hola") {
        echo "Hola bienvenido";
    }
    else{
        echo "Error";
           $intetos=$intentos+1;
    }
    numeroDeIntentos();
}

           


// funcion cookie es menor que tres
function numeroDeIntentos(){
    global $intentos;
    setcookie("VecesAcceso", $intentos); 
    
}
    
    
//HTML FORMULARIO ACCESO
    
echo "<form action='" . $nombreproyecto . "' method='get'>
        Usuario: <input type='text' name='usuario'/>
        Contraseņa: <input type='text' name='pass'/>
                <input type='submit' value='Enviar' name='enviar'/>
      </form>";