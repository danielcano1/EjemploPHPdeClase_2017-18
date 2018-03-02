<?php
//Variables globales
$nombreproyecto = "Limitaciones.php";
$intentos=0;

//Intento

if(isset($_GET["usuario"]) && isset($_GET["pass"]))
{
    

    
    if($_COOKIE["intentos"] < 3 && $_COOKIE["intentos"] > 0)
    {
        if($_GET["usuario"] == "mario" && $_GET["pass"] == 1234) 
        {
        
            echo "Hola has entrado";
        }
        
        else {
            $intentos=$intentos+1;
            echo "Error ";
            grabarIntentoCookie();
        }
         
        }
        else {
            echo "Sin intentos prueba en un rato ";
            setcookie("intentos",4,time()+120);
            
        }
    }
     
         

// funcion cookie es menor que tres
    function grabarIntentoCookie(){
        global $sesionIntentada;
        setcookie("grabar",$sesionIntentada);
    }  
    
//HTML FORMULARIO ACCESO
    
echo "<form action='" . $nombreproyecto . "' method='get'>
        Usuario: <input type='text' name='usuario'/>
        Contraseña: <input type='text' name='pass'/>
                <input type='submit' value='Enviar' name='enviar'/>
      </form>";