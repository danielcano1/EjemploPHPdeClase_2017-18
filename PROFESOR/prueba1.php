<?php
    echo "PRIMER PHP DE EJEMPLO: Daniel Cano";
    echo "<hr/>";
    //EJEMPLO DE FUNCIONES
    $resultado = 0;
    function doble($valor1){
        $resultado = 2 * $valor1;
        
        return $resultado;
    }
    
    $var1 = 10;
    $resultado1 = doble($var1);
    echo "<br/> la variable '$resultado' es: " . $resultado;  
    echo "<br/> El doble de " . $var1 . " es " . $resultado1;
    echo "<br/> El doble de 15 es: " . doble(15);
    echo "<br/> El doble del doble de 15 es: " . doble(doble(15));
    
    function swap(&$x, &$y){
        $aux=$x;
        $x = $y;
        $y = $aux;
    }
    
    $valor1=12;
    $valor2=17;
    swap($valor1, $valor2);
    echo "<br/> " . $valor1 . " ".$valor2;
    
    //VARIABLES GLOBALES
    function encadenar ($numero, $caracterParaRellenar){
        global $texto; 
        for($i=0;$i<$numero;$i++){
            $texto .= $caracterParaRellenar;     
        }
        
    }
    $texto="Hola";
    encadenar(12, "d");
    echo $texto."</br>";
    
    function estatica(){
        static $cuenta=0;
        $cuenta++;
        echo "<br/>Esta es la llamada " . $cuenta;
        
    }
    
    for($i=1;$i<=10;$i++){
        estatica();
    }
    
    function factorial($n){
        if($n<=0) return 1;
        else return $n*factorial($n-1);
    }
    
    echo factorial(5);
?>
