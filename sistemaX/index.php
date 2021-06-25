<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<img src="img/bannerPrincipal.jpg">
	</div>
	
	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  
<!-- Consulta a base de datos: SELECT * FROM carrusel--> 
	<?php
		include 'conexionBD.php';.
		$datos = $conexion->query("select * from carrusel");
	
	?>
 
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
	
    
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://127.0.0.1/sistemaX/img/carrusel1.jpg" class="d-block w-100" alt="Carrusel 1">
    </div>
	<div class="carousel-item">
      <img src="http://127.0.0.1/sistemaX/img/carrusel2.jpg" class="d-block w-100" alt="Carrusel 2">
    </div>

    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>