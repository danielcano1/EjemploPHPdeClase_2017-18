<?php
/**
 * Queremos crear un hash de nuestra contraseña usando el algoritmo DEFAULT actual.
 * Actualmente es BCRYPT, y producirá un resultado de 60 caracteres.
 *
 * Hay que tener en cuenta que DEFAULT puede cambiar con el tiempo, por lo que debería prepararse
 * para permitir que el almacenamento se amplíe a más de 60 caracteres (255 estaría bien)
 */
$clave ="hola Mundo";
echo $clave . " <br/>" ;

$Resumen1 =  password_hash("hola Mundo", PASSWORD_DEFAULT);
echo "Resumen1 = " . $Resumen1 ."<br/>";

$Resumen2 =   password_hash("hola Mundo", PASSWORD_DEFAULT);
echo "Resumen2 = " . $Resumen2 ."<br/>";

$Resumen3 = password_hash("hola Mundo", PASSWORD_DEFAULT);
echo  "Resumen3 = " . $Resumen3 ."<br/>";

$Resumen4 = password_hash("claveSuperSecreta", PASSWORD_DEFAULT);
echo  "Resumen4 = " . $Resumen4 ."<br/>";

/*
 * $Resumen1 es el resumen codificado de la cadena "hola Mundo" resumida en un tamaño fijo de 60 caracteres fijos sea cual sea el 
 * tamaño de la cadena codificada.
 * Este resumen es el que hay que guardar en la base de datos 
 * 
 * Si se vuelve a aplicar el algoritmo hash se obtiene otro resumen distinto cada vez, pero es igualmente válido.
 * 
 * Para comprobar si una clave resumen hash es válida se hace con password_verify ('clave original' , 'código del resumen hash' )
 */
if (password_verify($clave, $Resumen1)) {
    echo '¡La clave 1 es valida! <br/>';
} else {
    echo 'La clave 1 NO es valida. <br/>';
}

if (password_verify($clave, $Resumen2)) {
    echo '¡La clave 2 es valida! <br/>';
} else {
    echo 'La clave 2 NO es valida. <br/>';
}

if (password_verify($clave, $Resumen3)) {
    echo '¡La clave 3 es valida! <br/>';
} else {
    echo 'La clave 3 NO es valida. <br/>';
}

if (password_verify($clave, $Resumen4)) {
    echo '¡La clave 4 es valida! <br/>';
} else {
    echo 'La clave 4 NO es valida. <br/>';
}

if (password_verify($Resumen3, $Resumen3)) {
    echo '¡La clave $Resumen3 con $Resumen3 es valida! <br/>';
} else {
    echo 'La clave $Resumen3 con  $Resumen3 NO es valida. <br/>';
}

?>