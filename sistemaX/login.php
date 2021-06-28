<?php
$mensaje = null;
//Validar si se han enviado datos del inicio de sesion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
require_once "conexionBD.php";	    
$contraEncriptada = md5($_REQUEST['txtPassword']);
$sql = "select u.cedula,u.nombre, u.password, tp.descripcion 
            from usuarios as u        
        join tipousuario as tp 
            on u.tipoUsuario=tp.idTipoUsuario
        where u.cedula = ? 
        and u.password = ?
        ";		
//evitar inyección SQL
//echo $sql;
$datos = $conexion->prepare($sql);
//var_dump($datos);
//https://www.php.net/manual/es/mysqli-stmt.bind-param.php
$datos->bind_param('ss',$_REQUEST['txtCedula'],$contraEncriptada);
//Ya no se ejecuta directamente la consulta
//$datos = $myDB->query($sql) or die("Error en el sistema...");
$datos->execute();
$datos = $datos->get_result();
if($fila =$datos->fetch_assoc()){
    //acceder al archivo de sesion del servidor
    session_start();
    $_SESSION['usuario'] = $fila['nombre'];
    $_SESSION['rolUsuario'] = $fila['descripcion'];
    //redirreción - cargar otra página
    header('Location: inicio.php');
}else{
    $mensaje = "
    <div class='alert alert-danger' role='alert'>
        Datos incorrectos
    </div>
    ";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Inicio de sesión</title>
</head>
<body>
<div class="container">
<h1 class="text-center" style = "margin-top:50px;">Sistema de información Institución Educativa X</h1>
<h2 class="text-center">Inicio de sesión</h1>
<form method="post" action="login.php">
<div class="mb-3">
    <label for="InputCed1" class="form-label">Cédula</label>
    <input type="text" class="form-control" name = "txtCedula" id="InputCed1" required>
</div>
<div class="mb-3">
    <label for="InputPassword1" class="form-label">Password</label>
    <input type="password" name = "txtPassword" class="form-control" id="InputPassword1" required>
</div>

<button type="submit" class="btn btn-primary">Ingresar</button>
</form> 

</div>
<?=$mensaje;?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>