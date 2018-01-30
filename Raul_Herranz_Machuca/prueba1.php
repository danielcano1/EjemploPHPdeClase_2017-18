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
        
        //VARIABLES GOBALES
        
        
        function encadenar ($numero, $caracterParaRellenar){
            global $texto;
            for($i=0;$i<$numero;$i++){
                $texto.= $caracterParaRellenar;
            }
            
        }
        $texto="hola";
        encadenar (12,"d");
        echo $texto."<br/>"; //Escribe holadddddddddddd
        encadenar(9,"+-");
        echo $texto."<br/>"; //Escribe hola+-+-+-+-+-+-+-+-+-
        
        //VARIABLES ESTATICAS
        
        function estatica(){
            static $cuenta=0;
            $cuenta++;
            echo "Esta es la llamada numero $cuenta<br/>";
        }
        for($i=1;$i<=10;$i++){
            estatica();
        }
        
        function factorial($n){
            if($n<=0) return 1; //condicion de salida
            else return $n*factorial($n-1);
        }
        echo factorial(5);
        //ARRAYS
        $numero=array(17, 34, 3=>45, 2, 7=>9, 10=>-5, 7);
        $desplazamiento=0;
        
        for ($i=0; $i<(count($numero)+$desplazamiento);$i++){
            if (isset($numero[$i])){
                echo $numero[$i] . "<br/>";
            }
            else {
                $desplazamiento++;
            }
        }
?>
