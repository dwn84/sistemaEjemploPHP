<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='profesor'):
        header('Location: inicio.php');
    else:
        if(is_null ($_SESSION['idGrupo'])):
            echo "
            <div class='alert alert-danger' role='alert'>
			    No ha sido asignado a un grupo, contacte al administrador
            </div>";                                 
        else:
            echo "
            <form method='post' action='guardarActividades.php' enctype='multipart/form-data'>
                <div class='mb-3'>
                    <label for='txtTitular' class='form-label'>Título de la actividad</label>
                    <input type='text' class='form-control' name = 'txtTitular' id='txtTitular' required>
                </div>
                <div class='mb-3'>
                    <label for='txtDescripcion' class='form-label'>Descripción de la actividad</label>
                    <textarea class='form-control' placeholder='Escriba las instrucciones de la actividad' id='txtDescripcion' name='txtDescripcion'></textarea>
                </div>
                <div class='mb-3'>
                    <label for='txtArchivo' class='form-label'>Archivo adjunto</label>
                    <input type='file' accept='.doc,.docx,.pdf' class='form-control form-control-lg' id='txtArchivo' name='txtArchivo'>
                </div>
                <div class='mb-3'>
                    <label for='txtFecha' class='form-label'>Fecha límite</label>
                    <input type='date' class='form-control' name = 'txtFecha' id='txtFecha' required>    
                </div>
                <input type='hidden' class='form-control' name = 'txtGrupo' id='txtGrupo' value='$_SESSION[idGrupo]'>    
        
                <button type='submit' class='btn btn-primary'>Ingresar</button>
            </form> 
            ";
        endif;
    endif;
    require_once "piePagina.php";
?>