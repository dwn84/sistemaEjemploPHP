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
		endif;
	else:
		echo "<p><b>Por favor seleccione al menos un usuario.</b></p>";
	endif;

?>