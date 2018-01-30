<?php
function estatica(){
    static $cuenta=0;
    $cuenta++;
    echo "Esta es la llamada numero". $cuenta."</br>";
}
for ($i=1;$i<=10;$i++){
    estatica();
}
 ?>
