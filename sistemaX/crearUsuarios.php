<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador'):
        header('Location: inicio.php');
    else:	

?>

        <h1 style="margin-top: 20px;">Formulario de registro de usuarios</h1>

        <form action="nuevoUsuario.php" method="POST">

            <div class="mb-3">
              <label for="txtcedula" class="form-label">Cedula</label>
              <input type="text" name="txtcedula" class="form-control" id="txtcedula" required>
            </div>
            <div class="mb-3">
                <label for="txtnombre" class="form-label">Nombre</label>
                <input type="text" name="txtnombre" class="form-control" id="txtnombre" required>
              </div>
              <div class="mb-3">
                <label for="txtapellido" class="form-label">Apellido</label>
                <input type="text" name="txtapellido" class="form-control" id="txtapellido" required>
              </div>
              <div class="mb-3">
                <label for="txtfecha" class="form-label">Contraseña</label>
                <input type="password" name="txtpassword" class="form-control" id="txtpassword" required>
              </div>
              <div class="mb-3">
                <label for="txttelefono" class="form-label">Tipo de Usuario</label>
                <select name="txtRol" required>
                    <!-- Traer todos los roles-->
                    <?php
		            require_once "conexionBD.php";
                    $sql="SELECT * FROM tipousuario";
                    $datos = $conexion ->query($sql);
                    while($fila = $datos->fetch_array()):
                        echo "
                            <option value='$fila[idTipoUsuario]'>$fila[descripcion]</option>
                        ";
                    endwhile;
                    ?>                   
                    
                </select>
              </div>

            <button type="submit" class="btn btn-primary">Enviar datos</button>
          </form>
	
<?php	
    endif;
	require_once "piePagina.php";
?>