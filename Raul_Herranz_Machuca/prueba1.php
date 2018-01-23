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
        
        function potencia($base, $exponente=2){
            $valor=1;
            for($i=1;$i<=$exponente;$i++){
                $valor*=$base;
            }
            return $valor;
        }
        echo potencia(2,3); //Escribe 8
        echo potencia(4);   //Escribe 16
        
        global $texto;
        function encadenar($numero, $caracterParaRellenar){
            for ($i=0;$i<=$numero;$i++){
                $texto.=$caracterRelleno;
            }
        }
        
?>
