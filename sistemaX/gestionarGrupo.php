<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='administrador'):
        header('Location: inicio.php');
    else:
		if(isset($_GET['txtGrupo'])):
			$grupo=$_GET['txtGrupo'];
		else:
			$grupo="";
		endif;
	
?>	
	<form action="gestionarGrupo.php" method="get">
			<div class="row">
				<div class="col-1">
					<label for="txtGrupo" class="form-label">Grupo</label>
				</div>
				<div class="col-7">
					<input value = "<?=$grupo;?>" type="text" name="txtGrupo" class="form-control" id="txtGrupo" aria-describedby="emailHelp" placeholder="Ingrese el número del grupo...">
				</div>
				<div class="col-4">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</div>
			</div>	
	</form>


<?php 
		
		if($grupo!=""):
			require_once "conexionBD.php";
			$sql="SELECT * FROM grupos where descripcion=?";
			$datos = $conexion ->prepare($sql);
			$datos->bind_param('s',$grupo);			
			$datos->execute() or die("<div class='alert alert-danger' role='alert'>
			Error interno del sistema</div>");
			$datos = $datos->get_result();
			if($fila = $datos->fetch_assoc()):
				$txtDescripcionGrupo= $fila['descripcion'];
				echo "<div class='alert alert-success' role='alert'>
						Grupo encontrado</div>
					";
				//buscar todos los usuarios del grupo
				$sql = "SELECT u.cedula as ced, u.nombre as nom, tu.descripcion as rol 
							FROM registrogrupo as rg 
						join usuarios as u on rg.cedula = u.cedula
						join tipousuario as tu on u.tipoUsuario = tu.idTipoUsuario
						where idGrupo=?";
				$datos = $conexion ->prepare($sql);
				$idGrupo = $fila['idGrupo'];
				$datos->bind_param('s',$fila['idGrupo']);
				$datos->execute() or die("<div class='alert alert-danger' role='alert'>
				Error interno del sistema</div>");
				$datos = $datos->get_result();
				echo "<div class='row'>
						<div class='col-6'>
						<h3>Lista registrados</h3>
						<form action='retirarUsuariosGrupo.php' method='post'>							
							<input type='hidden' value=$txtDescripcionGrupo name='txtDescripcionGrupo'>";				
				while($fila = $datos->fetch_assoc()):						
					echo "<div class='checkbox'>
							<label><input type='checkbox' name='check_cedulas[]' value='$fila[ced]'>$fila[ced] $fila[nom] $fila[rol]<br></label>
						</div>";					
				endwhile;
				echo "
							<button type='submit' class='btn btn-danger' name='enviar'>Retirar estudiantes seleccionados</button>
						</form>
					
					</div>
						<div class='col-6'>
						<h3>Lista usuarios sin grupo</h3>
					";
					//buscar todos los usuarios que NO tienen grupo
					$sql = "SELECT u.cedula as ced, u.nombre as nom, rg.idGrupo,tu.descripcion as rol  
								FROM registrogrupo as rg 
							right join usuarios as u on rg.cedula = u.cedula
							join tipousuario as tu on u.tipoUsuario = tu.idTipoUsuario							
								where idGrupo is Null";
					$datos = $conexion ->prepare($sql);
					$datos->execute() or die("<div class='alert alert-danger' role='alert'>
					Error interno del sistema</div>");
					echo "<form action='agregarUsuariosGrupo.php' method='post'>
							<input type='hidden' value=$idGrupo name='txtIdGrupo'>
							<input type='hidden' value=$txtDescripcionGrupo name='txtDescripcionGrupo'>
							<label class='heading'>Seleccione usuarios para agregar al grupo $grupo:</label>					
										";
					$datos = $datos->get_result();
					while($fila = $datos->fetch_assoc()):				
						echo "<div class='checkbox'>
								<label><input type='checkbox' name='check_lista[]' value='$fila[ced]'>$fila[ced] $fila[nom] $fila[rol]<br></label>
							</div>";
					endwhile;
					echo "
						<button type='submit' class='btn btn-primary' name='enviar'>Agregar</button>
					</form>";
					
			
			
			else:
				echo "<div class='alert alert-warning' role='alert'>
			Grupo no encontrado</div>";
			endif;			
		endif;
	endif;
?>