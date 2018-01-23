<?php
    echo "PRIMER PHP DE EJEMPL: Diego Blanco.";
    
    //EJEMPLO DE FUNCIONES
    
    function doble($valor1){
        $resultado = 2* $valor1;
        return $resultado;
    }
    $var1=10;
    $resul= doble($var1);
    echo "<br /> El doble de " . $var1 . " es " . $resul;
    echo "</br> El doble de 15 es ". doble(15);
    echo "</br> El doble del doble de 15 es ". doble(doble(15));
    
   echo "</br>";
   function swap(&$x , &$y){ //& hace un cambio literal en la posicion de memoria de la variable
       $aux=$x;
       $x=$y;
       $y=$aux;
   }
   $valor1=12;
   $valor2=17;
   swap($valor1, $valor2);
   echo $valor1. " ". $valor2;
 ?>
