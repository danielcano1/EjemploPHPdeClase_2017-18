 <?php        

 //Array Equipos
 $equipos["Betis"]["https://ssl.gstatic.com/onebox/media/sports/logos/S0fDZjYYytbZaUt0f3cIhg_96x96.png"]="50";
 $equipos["Levante"]["https://ssl.gstatic.com/onebox/media/sports/logos/SQB-jlVosxVV1Ce79FhbOA_96x96.png"]="63";
 $equipos["Villareal"]["https://ssl.gstatic.com/onebox/media/sports/logos/WKH7Ak5cYD6Qm1EEqXzmVw_96x96.png"]="47";
 $equipos["Alaves"]["https://ssl.gstatic.com/onebox/media/sports/logos/meAnutdPID67rfUecKaoFg_96x96.png"]="38";

 
 if (isset($_GET["equipo"]) && isset($_GET["escudo"]) && isset($_GET["puntos"]))
 {
     $equipo=$_GET["equipo"];
     $escudo=$_GET["escudo"];
     $puntos=$_GET["puntos"];
     insertarEquipo($equipo,$escudo,$puntos);
     
     
     
 }
 
 function insertarEquipo($equipo,$escudo,$puntos){
     global $equipos;
     $equipos[$equipo][$escudo]=$puntos;
 }
 
 function cargarDatosTabla($equipos){
     echo "<table border='1'>
        <th>Equipo</th>
        <th>Escudo</th>
        <th>Puntos</th>";
     while(current($equipos)){
         echo "<tr>";
         $escudos = current($equipos); // la imagen y puntos
         echo "<td>".key($equipos)."</td>"; //nombre del equipo
         echo "<td>"."<img src='".key($escudos)."'/>"."</td>"; //url de la imagen
         echo "<td>". current($escudos) ."</td>"; //solo los puntos
         echo "<tr>";
         next($equipos); // vas saltoando de equipo en equipo
         
     }
     echo "</table>";
 }
 
 
 //Ordenar Equipos
 if (isset($_GET["ORDENA"])){
     $Ordena=$_GET["ORDENA"];
     
     if ($Ordena=="Eq"){
         ksort($equipos);
         reset($equipos);
         CargarDatosTabla($equipos);
     } else {
         reset($equipos);
         asort($equipos, SORT_NUMERIC);
         
         reset($equipos);
         CargarDatosTabla($equipos);
     }
     
 }
 // CargarDatosEnTabla($equipos);
 
 
 
 
 
 //Botones Siguiente y Anterior
 
 echo "Ver partidos";
 echo "<form action='AgregarBorrar.ph' method='get'>";
 echo "<input type='submit' value='Anterior' name='movimiento' />";
 echo "<input type='submit' value='Siguiente' name='movimiento'/>";
 echo "</form>";
 
 if (isset($_GET["movimiento"]) && isset($_COOKIE["fila"])){
     $movimiento=$_GET["movimiento"];
     $fila=$_COOKIE["fila"];
     
     
     if ($movimiento == "Anterior"){
         $fila=$fila-1;
         setcookie("fila",$fila);
         reset($partidos);
         for ($numeroIncremento = 2; $numeroIncremento <= $fila ;$numeroIncremento++){
             next($partidos);
         }
         echo key($partidos)." ".current($partidos);
         
     } else {
         if ($movimiento == "Siguiente"){
             $fila++;
             setcookie("fila",$fila);
             for ($numeroIncremento = 2; $numeroIncremento <= $fila ;$numeroIncremento++){
                 next($partidos);
             }
             echo key($partidos)." ".current($partidos);
         }
     }
 }
 
 
 // Modificar/Borrar
 
 echo "<hr/>";
 echo "Modificar";
 botonesBorrarModificar();
 
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
 
 function botonesBorrarModificar(){
     echo "<form action='AgregarBorrar.php' method='get'>
                <input type='submit' value='borrar' name='accion'/>
                <input type='submit' value='modificar' name='accion'/>
      </form>";
 }
 
 
 if (isset($_GET["accionEq"])){
     $eqModificarOBorrar=$_GET["accionEq"];
     $nombreEqModificarOBorrar=$_GET["equipoBorrar"];
     if ($eqModificarOBorrar == "modificarEq"){
         $equipoACambiar=$_GET["equipoBorrar"];
         $puntosN=$_GET["puntosN"];
         $escudoN=$_GET["escudoN"];
         $nuevoA[$escudoN]=$puntosN;
         $equipos = Reemplazar($equipos, $equipoACambiar, $nuevoA);
         
     } else {
         if ($eqModificarOBorrar == "borrarEq"){
             unset($equipos[$nombreEqModificarOBorrar]);
         }
     }
 } else {
     if (isset($_GET["accion"])){
         $accionARealizar=$_GET["accion"];
         if ($accionARealizar == "borrar"){
             echo "<form action='AgregarBorrar.php' method='get'>
                Equipo que quieres Borrar: <input type='text' name='equipoBorrar'/>
                <input type='submit' value='borrar' name='accionEq'/>
                 
      </form>";
         } else {
             if ($accionARealizar == "modificar"){
                 echo "<form action='AgregarBorrar.php' method='get'>
                Equipo que quieres Modificar: <input type='text' name='equipoBorrar'/>
                                      Escudo: <input type='text' name='escudoN'/>
                                      Puntos: <input type='text' name='puntosN'/>
                <input type='submit' value='modificar' name='accionEq'/>
                     
                      </form>";
             }
         }
     }
 }
 
 echo "<hr/>";
 echo "Tabla";
 cargarDatosTabla($equipos);
 
 echo "<br/>";
 echo "El total de equipos es: ".count($equipos)."</br>";
 echo "<br/>";
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 