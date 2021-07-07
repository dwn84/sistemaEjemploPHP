<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador'):
        header('Location: inicio.php');
    else:	

?>

        <h1 style="margin-top: 20px;">Formulario de nuevo grupo</h1>

        <form action="nuevoGrupo.php" method="POST">

            <div class="mb-3">
                <label for="txtnombre" class="form-label">Nombre</label>
                <input type="text" name="txtnombre" class="form-control" id="txtnombre" required>
            </div>            
              

            <button type="submit" class="btn btn-primary">Enviar datos</button>
          </form>
	
<?php	
    endif;
	require_once "piePagina.php";
?>