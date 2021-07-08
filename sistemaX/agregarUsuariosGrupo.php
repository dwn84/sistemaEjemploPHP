<?php

	if(isset($_POST['enviar'])):
		if(!empty($_POST['check_lista'])):
			require_once "conexionBD.php";
			foreach($_POST['check_lista'] as $cedulas):
				$datos = $conexion->prepare("insert into registrogrupo values(?,?);");
				$datos->bind_param('is',
                                    $_POST['txtIdGrupo'],
                                    $cedulas,
                            );
				$datos->execute() or die("<div class='alert alert-danger' role='alert'>
											Error interno del sistema</div>");
			endforeach;				
			header('Location:gestionarGrupo.php?txtGrupo='.$_POST['txtDescripcionGrupo']);
		else:
			echo "<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
			<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
			<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
			
			<div class='container'>
			  
			  <!-- Modal -->
			  <div class='modal show' id='myModal' role='dialog'>
				<div class='modal-dialog'>
				
				  <!-- Modal content-->
				  <div class='modal-content'>
					<div class='modal-header'>
					  <button type='button' class='close' data-dismiss='modal'>&times;</button>
					  <h4 class='modal-title'>Error al seleccionar</h4>
					</div>
					<div class='modal-body'>
					  <p>Debe seleccionar por lo menos un usuario</p>
					</div>
					<div class='modal-footer'>
					<a href='gestionarGrupo.php?txtGrupo=$_POST[txtDescripcionGrupo]'>
					  <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
					</div>
					</a>
				  </div>
				  
				</div>
			  </div>
			  
			</div>";
		endif;
	else:
		header('Location:gestionarGrupo.php');				
	endif;
?>