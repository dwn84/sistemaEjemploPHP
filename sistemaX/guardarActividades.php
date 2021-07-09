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
	//consultar último ID de la tabla evaluaciones y sumarle 1
	$datos = $conexion->query("SELECT max(idEvaluacion) as id FROM evaluaciones;");
	$fila = $datos->fetch_array();
	$i=$fila['id'];	
	//recuperar el código del grupo
	session_start();    
    $grupo = $_SESSION['idGrupo'];
	$archivo = $rutaImagen . "actividad".$grupo.++$i.".".$extension;	
	if(is_uploaded_file($imagenTemporal)) {
        if(move_uploaded_file($imagenTemporal, $archivo)) {
            //guardar en base de datos
			$datos = $conexion->prepare("insert into evaluaciones values(?,?,?,?,?,?);");
			$datos->bind_param('iissss',
								$i,
								$grupo,
								$_POST['txtTitular'],
								$_POST['txtDescripcion'],
								$archivo,
								$_POST['txtFecha']
								);
			$datos->execute() or die("Error interno");
			header('location: crearActividades.php');
        }
        else {
            echo "Error interno del sistema, contacte al administrador";
        }
    }
    else {
        echo "Error interno del sistema, contacte al administrador";
    }
	
	
?>