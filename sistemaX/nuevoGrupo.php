<?php
    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador' && !isset($_POST['txtnombre'])):
        header('Location: inicio.php');
    else:	
        require_once "conexionBD.php";
        $datos = $conexion->prepare("insert into grupos(descripcion) values(?);");        
        $datos->bind_param('s',$_POST['txtnombre']);
        $datos->execute() or die("<div class='alert alert-danger' role='alert'>
        Error interno del sistema</div>");
        echo "
            <div class='alert alert-success' role='alert'>
                Registro exitoso
            </div>";
    endif;
    require_once "piePagina.php";
?>