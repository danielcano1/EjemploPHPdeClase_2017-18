<?php
$sesionIntentada=0;

if(isset($_COOKIE["sesion"]))
{
    if(isset($_GET["usuario"]) && isset($_GET["pass"]))
    {
        $sesionIntentada=$_COOKIE["sesion"];
        $usuario=$_GET["usuario"];
        $pass=$_GET["pass"];
        
        if($_COOKIE["sesion"] <= 1)
        {
            
            if($_GET["usuario"] == "pepe" && $_GET["pass"] == 1234) 
            {                        
                echo "Estas dentro";
            }
            else 
            {
                $sesionIntentada=$sesionIntentada+1;
                echo "<form action='limitacionCookie.php' method='get'>
                    Usuario: <input type='text' name='usuario'/>
                    Contraseña: <input type='text' name='pass'/>
                    <input type='submit' value='Entrar'>
                </form>";
                echo "No puedes acceder";
                
            }
            grabarCookie();
        }
        else 
        {
           echo "Se te acabaron los intentos, prueba dentro de 2 minutos";
           setcookie("sesion",4,time()+120);
           
        }
    }
    
    else 
    {
        echo "<form action='limitacionCookie.php' method='get'>
            Usuario: <input type='text' name='usuario'/>
            Contraseña: <input type='text' name='pass'/>
            <input type='submit' value='Entrar'>
        </form>";
        
        grabarCookie();
    }
}
else
{
    echo "<form action='limitacionCookie.php' method='get'>
            Usuario: <input type='text' name='usuario'/>
            Contraseña: <input type='text' name='pass'/>
            <input type='submit' value='Entrar'>
        </form>";
    
    grabarCookie();
}

function grabarCookie(){
    global $sesionIntentada;
    setcookie("sesion",$sesionIntentada);
}
