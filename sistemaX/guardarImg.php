<?php    
	
    $tipoImagen = $_FILES['img']['type'];
	$rutaImagen = "img/";
	$imagenTemporal = $_FILES['img']['tmp_name'];

	$extension  = array_search($tipoImagen,
								array(
										'jpg' => 'image/jpeg',
										'png' => 'image/png',										
										'bmp' => 'image/bmp'
									));	
	include 'conexionBD.php';
	//consultar último ID de la tabla carrusel y sumarle 1
	$datos = $conexion->query("SELECT max(idCarrusel) as id FROM carrusel;");
	$fila = $datos->fetch_array();
	$i=$fila['id'];
	$archivo = $rutaImagen . "carrusel".++$i.".".$extension;	
	if(is_uploaded_file($imagenTemporal)) {
        if(move_uploaded_file($imagenTemporal, $archivo)) {
            //guardar en base de datos
			$datos = $conexion->prepare("insert into carrusel values(?,?,?);");
			$visibilidad = 1;
			$datos->bind_param('isi',$i,$archivo,$visibilidad);
			$datos->execute() or die("Error interno");
			header('location: administrarIndex.php');
        }
        else {
            echo "Error interno del sistema, contacte al administrador";
        }
    }
    else {
        echo "Error interno del sistema, contacte al administrador";
    }
	
	
?>