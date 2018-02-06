<?php

function primo($num,$divisor=2){
    if($divisor>=$num) return true;
    if($num%$divisor==0){
        return false;
    }
    else return primo($num,$divisor+1);
}
if (primo(8)){
    echo "Es primo";
}else echo "No es primo";
?>