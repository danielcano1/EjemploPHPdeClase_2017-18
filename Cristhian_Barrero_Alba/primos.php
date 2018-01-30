<?php

//PRIMOS

function primos($primo,$divisor){        
    if ($divisor<2){
        return true;
    }
    else {
        if ($primo%$divisor==0)
            return false;
        
            else 
            return primos($primo,$divisor-1);  
    }
}

if (primos(11,10)){
    echo "Es primo";
} else {
    echo "No es primo";
}

