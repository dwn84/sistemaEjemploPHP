<?php

	include "inicio.php";
	if($_SESSION['rolUsuario']!='administrador'):
		header('Location: inicio.php');
	else:	
		//traer la información del archivo de configuración de BD
		require_once "conexionBD.php";
		//crear el objeto de conexión
		try{
			if($conexion->connect_errno){
				die('Error de conexión');
			}else{
				//echo "Conexión satisfactoria";
				$datos = $conexion ->query("Select * from carrusel");
							
				echo "
				
				<a href='crearNuevaImagen.php'>
					<button type='button' class='btn btn-primary'>
						Agregar imagen
					</button>
				</a>
				
				<table class='table table-dark table-hover' style='margin-top:35px'>
					<tr>
						<th>Id</th>
						<th>Imagen</th>					
						<th>Visibilidad</th>					
						<th>Eliminar</th>					
					</tr>
				";
				
				while($fila = $datos->fetch_array()){
					echo "
						<tr> 
							<td>$fila[idCarrusel]</td>
							<td><img src='$fila[imagen]' width='50%'></td>
							<td>";
								if($fila['visible']==1):
									$miClase= array(
										'icono'=>'eye-slash',
										'clase'=>'warning',
									);
								else:
									$miClase= array(
										'icono'=>'eye',
										'clase'=>'success'								
									);								
								endif;
								
								echo "
								<a href='cambiarVisibilidad.php?idCarrusel=$fila[idCarrusel]&visibilidad=$fila[visible]'>
									<button type='button' class='btn btn-$miClase[clase]'>
										<i class='bi bi-$miClase[icono]'></i>
									</button>
								</a>";
					echo"
							</td>
							<td>
							<!-- Mostrar una advertencia: Esta seguro que va a borrar la imagen: Si/No-->
							<!-- Si dice que Si, entonces, direccionar a un archivo eliminarImagen.php-->
							<!-- Realizar consulta Delete...-->
							<!-- Borrar el archivo de la carpeta IMG -->
							<!-- Redireccionar a esta misma página -->
							
							<button type='button' class='btn btn-danger'>
									<i class='bi bi-trash'></i>
								</button>
							</td>
						</tr>	
							";				
				}
				
				echo "</table>";
				
			}
		}catch(Exception $e){
			echo $e->getMessage();
		}
		
	endif;
	
	require_once "piePagina.php";

?>