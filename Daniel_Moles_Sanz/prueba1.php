<?php
    echo "PRIMER PHP DE EJEMPLO: Daniel Moles Sanz";
    
    //EJEMPLO DE FUNCIONES
    $resultado = 0;
    function doble($valor1){
        $resultado = 2 * $valor1;
        
        return $resultado;
    }
    
    $var1 = 10;
    doble($var1);
    echo "<br/> El doble de ". $var1 ." es ". $resultado;
    echo "<br/> El doble de 15 es:". doble(15);
    echo "<br/> El doble del doble de 15 es:". doble(doble(15))."<br/>";
    echo "<hr/>";
    
    
    function swap(&$x,&$y){
        $aux=$x;
        $x=$y;
        $y=$aux;
    }
    
    $valor1 = 12 ;
    $valor2 = 17 ;
    swap($valor1, $valor2);
    echo $valor1." ".$valor2 ;
    
    
    
?>
