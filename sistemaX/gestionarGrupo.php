<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador'):
        header('Location: inicio.php');
    else:	
        echo "En construcción";
    endif;

?>