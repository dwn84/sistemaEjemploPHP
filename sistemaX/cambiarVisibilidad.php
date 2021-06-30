<?php

	//validar si he recibido datos por método get, 
	//que son exactamente 2 y corresponden a idCarrusel y visibilidad
	if(count($_GET)==2 && isset($_GET['idCarrusel']) && isset($_GET['visibilidad'])):
		include 'conexionBD.php';				
		if($_GET['visibilidad']==0):
			$newVisibilidad = 1;
		else:
			$newVisibilidad = 0;
		endif;
		$sql="update carrusel set visible=? where idCarrusel=?";
		$datos = $conexion->prepare($sql);
		$datos->bind_param('ii',$newVisibilidad,$_GET['idCarrusel']);
		$datos->execute() or die('Error interno');		
		header('location:administrarIndex.php');
	else:
		header('location:inicio.php');
	endif;

?>