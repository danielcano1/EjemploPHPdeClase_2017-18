<!DOCTYPE html>
<html>
    <body>
    
        <?php
            $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
            $a2=array("c"=>"purple");
            
            print_r($a1);
            echo "<br/> <p>Ejemplo Modificar un elemento de un array. Cambiamos 'blue' por 'purple'</p>";
            array_splice($a1,2,1,$a2);
            print_r($a1);
            echo "<p>¡OJO! que ha cambiado la key de 'c' por '0' </p>";
            echo "<hr/>";
            
            $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
            $a3="verde";
            $a1 = Reemplazar($a1,"b",$a3);
            print_r($a1);
            
            echo "<hr/><br/>";
            $equipos["Real Madrid"]["Sevilla"]="1-2";
            $equipos["Barcelona"]["Valencia"]="2-2";
            $equipos["Valencia"]["Real Madrid"]="0-2";
            
            print_r($equipos);
            $a4["Sevilla"]="4-0";
            $equipos = Reemplazar($equipos,"Real Madrid",$a4);
            echo "<br/>";
            print_r($equipos);
            
            
            function Reemplazar($arrayOrigen, $key, $elementoNuevo){
                $nuevoArray;
                
                reset($arrayOrigen);
                while(current($arrayOrigen)){
                    if (key($arrayOrigen) == $key){
                                                 
                        AñadirNuevoElemento($nuevoArray,array(key($arrayOrigen) => $elementoNuevo));
                        
                    }else{
                        AñadirNuevoElemento($nuevoArray,array(key($arrayOrigen) => current($arrayOrigen)));
                    }
                    next($arrayOrigen);
                }
                
                return $nuevoArray;
                
            }
            
            function AñadirNuevoElemento(&$array,$nuevoArray){
                $array = array_merge((array)$array,(array)$nuevoArray);
            }
            
            
            
        ?>
    
    </body>
</html>