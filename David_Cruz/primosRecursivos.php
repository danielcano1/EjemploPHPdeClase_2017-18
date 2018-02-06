<?php
function esPrimo($dividendo, $divisor){
    if($divisor<2){
        return true;
    }else{
        if($dividendo%$divisor==0){
            return false;
        }else{
            return esPrimo($dividendo, $divisor-1);
        }
    }
}
function dividir(){
    $dividendo=mt_rand(1,10);
    $divisor=$dividendo-1;
    echo "El numero: ".$dividendo;
    if (esPrimo($dividendo, $divisor)){
        echo " es primo";
    }else{
        echo " no es primo";
    }
}
echo dividir();
