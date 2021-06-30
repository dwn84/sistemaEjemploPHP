<?php

	include "inicio.php";
	
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
	
	require_once "piePagina.php";

?>