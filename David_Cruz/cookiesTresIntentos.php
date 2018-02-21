<!DOCTYPE>
<html>
<head></head>
<body>
<?php
$intentos=3;
$_GET["usuarioValido"]="David";
$_GET["contraseñaValida"]="Azuqueca67";
if (isset($_COOKIE["intentos"])){
    if (isset($_GET["usuario"]) && isset($_GET["contraseña"]) && $_GET["usuarioValido"]==$_GET["usuario"] && $_GET["contraseñaValida"]==$_GET["contraseña"]){
        echo "<h1>Bienvenido David<h1>";
    }else{
        $intentos=$_COOKIE["intentos"];
        if ($_COOKIE["intentos"]<3 && $_COOKIE["intentos"]>0){
            echo "Le quedan ".$intentos." intentos";
            $intentos--;
            setcookie("intentos",$intentos, time()+120);
            echo pintarTabla();
        }else{
            echo "Se ha quedado sin intentos, espere 2 minutos";
        }
    }
}else{
    echo "Le quedan ".$intentos." intentos";
    $intentos--;
    setcookie("intentos",$intentos, time()+120);
    echo pintarTabla();
}
function pintarTabla(){
    echo "<table>
	<form action='cookiesTresIntentos.php' method='get'>
		<tr>
			<td><label for='usuario'>Escriba el nombre del usuario</label></td>
			<td><input type='text' name='usuario'/></td>
		</tr>
		<tr>
			<td><label for='contraseña'>Escriba la contraseña</label></td>
			<td><input type='password' name='contraseña'/></td>
		</tr>
		<tr>
    		<td><input type='submit' value='enviar'/></td>
    	</tr>
	</form>
</table>";
}
?>
</body>
</html>