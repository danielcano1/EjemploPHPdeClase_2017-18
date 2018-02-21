<?php

$arrayDeUsuarios["Mario"]="mario123";
$funcionresumen=password_hash($arrayDeUsuarios["Mario"], PASSWORD_DEFAULT);
    if (password_verify("mario123", $funcionresumen)){
        echo "Estas dentro";
    }
    else{
      echo "No puedes ver el documento";
    }
?>
