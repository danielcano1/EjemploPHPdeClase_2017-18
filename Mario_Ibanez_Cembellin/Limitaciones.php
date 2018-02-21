<?php
//Variables globales
$nombreproyecto = "Limitaciones.php";
$intentos=0;



if(isset($_GET["usuario"]) && isset($_GET["pass"])){
<<<<<<< HEAD
    
    
    
    if($_GET["usuario"] == "valido" && $_GET["pass"] == "hola") {
        echo "Hola bienvenido";
=======
    if($_COOKIE["VecesAcceso"]<=3){
   
        if($_GET["usuario"] == "valido" && $_GET["pass"] == "hola") {
            echo "Hola bienvenido";
        }
        else{
            echo "Error";
               $intetos=$intentos+1;
               numeroDeIntentos();
        }   
>>>>>>> branch 'master' of https://github.com/danielcano1/EjemploPHPdeClase_2017-18
    }
<<<<<<< HEAD
    else{
        echo "Error";
           $intetos=$intentos+1;
    }
    numeroDeIntentos();
=======
    else 
            echo "Numero de intentos Maximos";
                setcookie("VecesAcceso",4,time()+1);
>>>>>>> branch 'master' of https://github.com/danielcano1/EjemploPHPdeClase_2017-18
}

           


// funcion cookie es menor que tres
function numeroDeIntentos(){
    global $intentos;
    setcookie("VecesAcceso", $intentos); 
    
}
    
    
//HTML FORMULARIO ACCESO
    
echo "<form action='" . $nombreproyecto . "' method='get'>
        Usuario: <input type='text' name='usuario'/>
        Contraseña: <input type='text' name='pass'/>
                <input type='submit' value='Enviar' name='enviar'/>
      </form>";