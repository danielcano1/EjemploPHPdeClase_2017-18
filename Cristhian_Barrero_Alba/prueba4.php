<?php

//Variables estáticas

function estatica(){
       static $cuenta=0;
       $cuenta++;
       echo "Esta es la llamada $cuenta <br />";
}

for($i=1;$i<=10;$i++){
    estatica();
}