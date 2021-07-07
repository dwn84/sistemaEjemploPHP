<?php

	include "inicio.php";
	if($_SESSION['rolUsuario']!='administrador'):
		header('Location: inicio.php');
	else:	
        echo "
        <a href='crearGrupos.php'><button class='btn btn-primary'>Crear Grupos</button></a>
        <a href='crearUsuarios.php'><button class='btn btn-primary'>Crear Usuarios</button></a>
        ";
    endif;

?>
        