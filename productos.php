<?php
if(!isset($_SESSION))
	session_start(); 
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Ideas Gecko</title>
    
    <!-----------------CSS (estilos)----------------------------->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">              <!--Bootstrap------------>
    <link href="CSS/estilos.css" rel="stylesheet">                              <!--Cuerpo index/footer-->
	<link href="CSS/productos.css" rel="stylesheet">                            <!--Estilos productos---->
	<!--<link href="CSS/footer.css" rel="stylesheet">-->
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
	<!------------------------------------- Barra de navegación ------------------------------------------------------>
	<?php include 'menu.php'; ?>
	<!---------------------------------------------------------------------------------------------------------------->

	<!-- ------------------------------------------ Contenido -------------------------------------------------------->
	<content id="categorias">
		<!-- -------------------------- Banner -------------------------- -->
		<section>
		<div style="height: 64px"></div>
		<h1 class="pb-3">Productos</h1>
		

		<center>
				<!-- ------------------ Sección 1 ----------------- -->
				<div class="row" style="width: 70%">
					<div class="col-sm-4 pb-3" style="width: 100%;">
						<div class="card">
							<div class="card-body">
								<img src="Images/Productos/cajaplayeras.jpg" width="100%">
								<h5 class="card-title">Playeras</h5>
								<p class="card-text">Consulta las playeras con los diseños que ya tenemos en inventario, ¡Seguro encuentras algo perfecto para ti!</p>
								<a href="productos-playeras.php" class="btn btn-dark">Revisar catálogo</a>
							</div>
						</div>
					</div>
					<div class="col-sm-4 pb-3">
						<div class="card">
							<div class="card-body">
								<img src="Images/Productos/cajatazas.jpg" width="100%">
								<h5 class="card-title">Tazas</h5>
								<p class="card-text">Consulta las tazas con los diseños que ya tenemos en inventario, ¡Es el regalo perfecto para dar en estas fiestas!.</p>
								<a href="productos-tazas.php" class="btn btn-dark">Revisar catálogo</a>
							</div>
						</div>
					</div><br>
					<div class="col-sm-4 pb-3">
						<div class="card">
							<div class="card-body">
								<img src="Images/Productos/cajasudaderas.jpg" width="100%">
								<h5 class="card-title">Abrigos y sudaderas</h5>
								<p class="card-text">Consulta las sudaderas que tenemos para ti, con los diseños más creativos. ¿A quien no le gusta una sudadera con estilo?</p>
								<a href="productos-sudaderas.php" class="btn btn-dark">Revisar catálogo</a>
							</div>
						</div>
					</div>
				</div>
			
		</center>


		</section>
	</content>
	<!-- ------------------------------------ Footer ------------------------------------ -->
	<?php include 'footer.html';?>
	<!-- -------------------------------------------------------------------------------- -->

</body>
</html>