<?php

	include "inicio.php";
	if($_SESSION['rolUsuario']!='administrador'):
		header('Location: inicio.php');
	else:	
		echo "
		<form action='guardarImg.php' method='post' enctype='multipart/form-data'>
			<div>
				<label for='formFileLg' class='form-label'>Seleccione una imagen de su equipo</label>
					<input type='file' accept='.jpg,.jpeg,.png,.bpm' class='form-control form-control-lg' id='formFileLg' required name='img'>
					<input type='submit' class='btn btn-primary' value='Enviar'>
			</div>
		</form>
		";
	endif;
?>
		
