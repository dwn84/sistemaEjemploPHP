<?php    
	
    $tipoImagen = $_FILES['txtArchivo']['type'];
	$rutaImagen = "actividades/";
	$imagenTemporal = $_FILES['txtArchivo']['tmp_name'];
    $extension  = array_search($tipoImagen,
								array(
										'pdf' => 'application/pdf',
										'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',										
										'doc' => 'application/msword'
									));	
	include 'conexionBD.php';
    //Adaptar a la tabla de evaluaciones
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