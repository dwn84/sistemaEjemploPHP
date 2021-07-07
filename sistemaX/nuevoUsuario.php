<?php
    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador' && !isset($_POST['txtcedula'])):
        header('Location: inicio.php');
    else:	
        require_once "conexionBD.php";
        $datos = $conexion->prepare("insert into usuarios values(?,?,?,?,?);");
        $password = md5($_POST['txtpassword']);
        $datos->bind_param('ssssi',
                                    $_POST['txtcedula'],
                                    $_POST['txtnombre'],
                                    $_POST['txtapellido'],
                                    $password,
                                    $_POST['txtRol']
                            );
        $datos->execute() or die("<div class='alert alert-danger' role='alert'>
        Error interno del sistema</div>");
        echo "
            <div class='alert alert-success' role='alert'>
                Registro exitoso
            </div>";
    endif;
    require_once "piePagina.php";
?>