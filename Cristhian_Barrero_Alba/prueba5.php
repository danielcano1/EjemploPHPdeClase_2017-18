<?php

//Recursividad

function factorial($n){
    if($n<=0) {
        return 1; //condicion de salida
    }
    else {
        $resultado = $n*factorial($n-1);
        return $resultado;
    }
}

echo factorial(5);