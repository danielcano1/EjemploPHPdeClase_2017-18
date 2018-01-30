<?php
    echo "Segundo PHP DE EJEMPLo: Diego Blanco.";
    //Ejemplo encadenar
    
    function encadenar($numero,$caracterRelleno){
        global $texto;
        for ($i=1;$i<=$numero;$i++){
            $texto.=$caracterRelleno;
        }
    }
 ?>
