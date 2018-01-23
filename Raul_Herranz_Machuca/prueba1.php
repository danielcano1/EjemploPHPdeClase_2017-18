<?php
    echo "PRIMER PHP DE EJEMPLO: Raul Herranz";
    //ejemplo de funciones y de commit
    
    function doble($valor1){
        $resultado = 2 * $valor1;
        
        return $resultado;
    }
        $var1 = 10;
        $resul = doble($var1);
        echo "<br/> El doble de " . $var1 . " es " . $resul;
        echo "<br/> El doble del doble de 15 es " . doble(doble(15));
        
        function swap(&$x, &$y){
            $aux = $x;
            $x = $y;
            $y = $aux;
        }
        $valor1 = 12;
        $valor2 = 17;
        swap($valor1, $valor2);
        echo "<br/> " . $valor1 . " " . $valor2;
        
?>
