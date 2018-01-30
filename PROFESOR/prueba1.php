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
    
    //RECURSIVIDAD
    function factorial($n){
        if($n<=0) {
            return 1;
        }
        else{
            $resultado = $n*factorial($n-1);
            return $resultado;
        }
    }
    
    echo "<br/> El factorial de 5 es: " . factorial(5);
    
    //PRIMOS CON RECURSIVIDAD
    function esUnNumeroPrimo($primo){
        return  esPrimo($primo,$primo);
        
    }
    
    
    function esPrimo($primo,$divisor){
        if ($primo <= $divisor){
            $divisor = $primo - 1; 
        }
               
        if ($divisor <= 1) return true;
        else {
            $resto = $primo % $divisor;
            if ($resto == 0)return false;
            else{
                return esPrimo($primo, $divisor - 1);
            }
        }
    }
    
    $numero=11;
    if (esUnNumeroPrimo($numero)) echo "<br/> El $numero es un n&uacutemero primo";
    else echo "<br/> El $numero NO es un n&uacutemero primo";
    
    echo "<hr/><br/>";
    //ARRAYS
    $numero = array(17, 34, 3=>45, 2, 7=>9, 10=> -5, 7);
    
    $desplazamiento = 0;
    for ($i=0; $i<(count($numero)+$desplazamiento); $i++){
        if(isset($numero[$i])){
            echo $numero[$i] . "<br/>";
        }else{
            
            $desplazamiento++;
        }
    }
    
    
    
?>
