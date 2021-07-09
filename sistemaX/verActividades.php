<?php 

    include "inicio.php";
    if($_SESSION['rolUsuario']!='estudiante'):
        header('Location: inicio.php');
    else:
		echo "
		
			<table class='table table-dark table-striped'>
				<thead>
					<tr>
						<th scope='col'>Actividad</th>
						<th scope='col'>Descripción</th>
						<th scope='col'>Fecha límite</th>
						<th scope='col'>Entregar</th>
						<th scope='col'>Calificación</th>
					</tr>			
		";	
		$idGrupo = $_SESSION['idGrupo'];
		$sql = "SELECT *  from evaluaciones as e				
				WHERE e.idGrupo = ?;";
		require_once "conexionBD.php";	    
		$datos = $conexion->prepare($sql);
		$datos->bind_param('i',$idGrupo);
		$datos->execute();
		$datos = $datos->get_result();
		while($fila =$datos->fetch_assoc()):
			echo "<tr>
					<td>
						$fila[titular]
					</td>			
					<td>
						<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modal$fila[idEvaluacion]'>
							Ver
						</button>
					</td>							   
					<td>
						$fila[fechaLimite]
					</td>";			
					//consultar si la actividad ha sido calificado y enviada	
					
							$sql = "SELECT * FROM evaluaciones as e
										join notas as n on e.idEvaluacion = n.idNota
										join usuarios as u on n.cedula = u.cedula
										where e.idEvaluacion = ? and u.cedula = ?;";
							$notas = $conexion->prepare($sql);
							$notas->bind_param('is',
												$fila[idEvaluacion],
												$_SESSION['cedula']
											   );
							$notas->execute();
							$notas = $notas->get_result();
							//verificar el conteo de resultados
			echo "
					</tr>
				   
				   <!-- Modal -->
					<div class='modal fade' id='modal$fila[idEvaluacion]' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h5 class='modal-title' id='exampleModalLabel'>Detalle de la evaluación</h5>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
						  </div>
						  <div class='modal-body'>
							$fila[descripción]
						  </div>
						  <div class='modal-footer'>
							<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>							
						  </div>
						</div>
					  </div>
					</div>
			";			
		endwhile;
		
		
		endif;
    require_once "piePagina.php";
?>