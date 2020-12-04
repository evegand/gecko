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
	<!--<link href="CSS/footer.css" rel="stylesheet">-->
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
	<!------------------------------------- Barra de navegación ------------------------------------------------------>
	<?php include 'menu.php'; ?>
	<!---------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div class="text-center " style="padding: 90px 30px 10px 30px;">
		<h1 class="pb-3">Selecciona la mejor opción para ti</h1>

			<!-- -------------------------- Secciones -------------------------- -->
			<div class="card-group">
				<div class="card">
					<img class="card-img-top" src="Images/productos.png" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Compra productos</h5>
						<p class="card-text">Visita nuestra página de categorías y revisa los productos que tenemos para ti.</p>
					</div>
					<a href="productos.php" class="btn btn-dark">Revisar catálogo</a>
				</div>

				<div class="card">
					<img class="card-img-top" src="Images/personaliza.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Personaliza un producto</h5>
						<p class="card-text">¿Quieres algo diferente? Contáctanos con tu diseño para ponernos en contacto.</p>
					</div>
					<a href="servicios-personaliza.php" class="btn btn-dark">Realiza tus pedidos</a>
				</div>

				<div class="card">
					<img class="card-img-top" src="Images/estudio.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Paquetes fotográficos</h5>
						<p class="card-text">Estamos asociados con Estudio Vane Andrade, encuentra toda la información necesaria.</p>
					</div>
					<a href="fotografia.php" class="btn btn-dark">Consulta más información</a>
				</div>
			</div>
			<!-- ----------------------------------------------------------------- -->

		</div>
	<!-- ------------------------------------ Footer ------------------------------------ -->
	<?php include 'footer.html';?>
	<!-- -------------------------------------------------------------------------------- -->
</body>

</html>

