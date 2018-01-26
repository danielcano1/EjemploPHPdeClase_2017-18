<?php
function esPrimo($primo, $divisor=2){
    if ($primo = $divisor) return true;
    elseif ($primo % $divisor == 0) return false;
    else esPrimo($primo, $divisor+1);
}
if (esPrimo(8)) echo "es primo";
else echo "no es primo";