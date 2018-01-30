<?php
    echo "Segundo PHP DE EJEMPLo: Diego Blanco.";
    //Ejemplo potencia
    
    function potencia($base,$exponente=2){
        $valor=1;
        for($i=1;$i<=$exponente;$i++){
            $valor*=$base;
        }
        return $valor;
    }   
        echo "</br>";
        echo potencia(2,3);
        echo "</br>";
        echo potencia(4);
    
 ?>
