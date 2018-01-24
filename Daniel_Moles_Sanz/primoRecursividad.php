<?php
function primo($nPrimo,$divisor){
   if ($divisor<2){
        return true;
   }
   
   if ($nPrimo%$divisor==0){
      return false;
   } else {
      return primo($nPrimo, $divisor -1);
   }
   
  
}
if(primo(7,6)){
    echo "es primo";
}else {
    echo "no es primo";
}
