<?php
$numero=array(17, 34, 3=>45, 2, 7=>9, 10=>-5, 7);
$desplazamiento=0;
for($i=0;$i<(count($numero)+$desplazamiento);$i++){
    if(isset($numero[$i]))
        echo $numero [$i]."<br />";
    else 
            $desplazamiento++;
    
}