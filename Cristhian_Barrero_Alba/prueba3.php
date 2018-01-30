<?php
//Variables globales

function encadenar($numero,$caracterRelleno){
	global $texto;
    for ($i = 1; $i <= $numero; $i++) {
        $texto.=$caracterRelleno;
    }
    
}
$texto="Hola";
encadenar(12, "d");
echo $texto."<br/>";
encadenar(9, "+-");
echo $texto."<br/>";

?>