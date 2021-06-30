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
		include 'conexionBD.php';
		$datos = $conexion->query("select * from carrusel where visible = 1");
	
	?>
 
  <div class="carousel-indicators">

    <?php    
    $i = 0;
      while($i<$datos->num_rows):
        if($i==0):
          echo "
          <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' class='active' aria-current='true' aria-label='Slide $i'></button>
          ";
        else:
          echo "
            <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='$i' aria-label='Slide $i'></button>      
          ";
        endif;
        $i++;
      endwhile;
      ?>         
  </div>
  <div class="carousel-inner">
<?php
      $i = 0;
			while($fila = $datos->fetch_array()):
        if($i==0):
          echo"
          <div class='carousel-item active'>
            <img src='$fila[imagen]' class='d-block w-100' alt='Carrusel $i'>
          </div>
          ";
        else:
          echo"
          <div class='carousel-item'>
            <img src='$fila[imagen]' class='d-block w-100' alt='Carrusel $i'>
          </div>
          ";
        endif;
        $i++;
      endwhile;
?>   
	  
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

<a href="login.php"><button type="button" class="btn btn-info fixed-top">Iniciar sesión</button></a>

	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>