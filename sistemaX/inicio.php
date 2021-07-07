<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institución X</title>
	<link rel="icon" type="image/png" href="img/miFavicon.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
	<div class="container">
	
	<?php 
		session_start();
		if(isset($_SESSION['usuario']))://¿Entro un usuario?
            //Si, entro algún usuario
            echo "
            <nav class='navbar navbar-expand-lg navbar-light bg-light'>
                <div class='container-fluid'>
                    <a class='navbar-brand' href='#'><i class='bi bi-sunglasses'></i>
$_SESSION[usuario]</a>
                    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                        <span class='navbar-toggler-icon'></span>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            
            ";            
            if($_SESSION['rolUsuario']=='administrador'):
                $datosMenu = array(
					'Crear' => 'seleccionarCrearUsuarios',
					'Gestionar grupo' => 'gestionarGrupo',
					'Administrar index' => 'administrarIndex'
				);
            elseif($_SESSION['rolUsuario']=='estudiante'):
                $datosMenu = array(
					'Ver actividades' => 'verActividades',
					'Ver noticias' => 'verNoticias',					
					'Ver diplomados' => 'diplomados',					
				);				
            elseif($_SESSION['rolUsuario']=='profesor'):
			  $datosMenu = array(
					'Crear actividades' => 'crearActividades',
					'Calificar Actividades' => 'calificarActividades',
					'Ver Notas' => 'verNotas'
				);                
            endif; 			
			foreach ($datosMenu as $menu => $pagina):
				echo"            
                    <li class='nav-item'>
                        <a class='nav-link active' aria-current='page' href='$pagina.php'>$menu</a>
                    </li>";
			endforeach;			
            
	?>
			</ul>
			<ul class='navbar-nav me-auto mb-2 mb-lg-0 text-end'>
				<li class="nav-item">
				  <a class="nav-link" href="cerrarSesion.php"><i class='bi bi-power'></i>Cerrar sesión</a>
				</li>				
			  </ul>			  
			</div>
		  </div>
		</nav>
		
<?php 
	else:
		echo "
		<div class='alert alert-danger' role='alert' style='margin-top:55px;'>
            Acceso denegado. 
			Debe <a href='index.php'>iniciar sesión</a>
        </div>";        
		exit;//evitar que se muestre el resto de página
    endif;
	include 'piePagina.php';
?>	