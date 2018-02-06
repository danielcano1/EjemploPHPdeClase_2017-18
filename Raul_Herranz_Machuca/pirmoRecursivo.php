<?php
function esPrimo($primo, $divisor=2){
    if ($primo % $divisor == 0){
        return false;
    }
    if ($primo = $divisor){
        return true;
    }
    else {
        return esPrimo($primo, $divisor+1);
    }
}
if (esPrimo(6)){
    echo "es primo";
}
else{
    echo "no es primo";
}