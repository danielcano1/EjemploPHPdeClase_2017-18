<?php 

//Variables Gobales

function encadenar ($numero,$caracterRelleno){
    global $texto;
    for($i=1;$i<=$numero;$i++){
        $texto.=$caracterRelleno;    
    }   
}
$texto="Hola";
encadenar (12,"d");
echo $texto."<br/>"; //Escribe holaddddddddddd
encadenar (9,"+-");
echo $texto. "<br/>";


//Variables Estaticas
function estatica(){
    static $cuenta=0;
    $cuenta++;
    echo "Esta es la llamada numero $cuenta <br />";
}

for ($i=1;$i<=10;$i++){
    
    estatica();
}



?>



