<?php
//Variables globales
$nombreproyecto = "Limitaciones.php";
$intentos=0;

//HTML FORMULARIO ACCESO



if(isset($_GET["usuario"]) && isset($_GET["pass"])){
    if($_COOKIE["VecesAcceso"]<=3){
   
        if($_GET["usuario"] == "valido" && $_GET["pass"] == "hola") {
            echo "Hola bienvenido";
        }
        else{
            echo "Error";
               $intetos=$intentos+1;
               numeroDeIntentos();
        }   
    }
    else 
            echo "Numero de intentos Maximos";
                setcookie("VecesAcceso",4,time()+1);
}

           


// funcion cookie es menor que tres
function numeroDeIntentos(){
    global $intentos;
    setcookie("VecesAcceso", $intentos); 
    
}
    
    
  
    
echo "<form action='" . $nombreproyecto . "' method='get'>
        Usuario: <input type='text' name='usuario'/>
        Contraseña: <input type='text' name='pass'/>
                <input type='submit' value='Enviar' name='enviar'/>
      </form>";