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
	<content>
		<!-- -------------------------- Banner -------------------------- -->
		<section id="banner">
			<div class="bannercontainer">
				<div>
					<h1>Personaliza tu mundo</h1>
					<p>Personaliza tazas, playeras, y mucho más. ¿Tienes tu propio diseño, o necesitas uno?<br>¡Nosotros te ayudamos!<br>
					</p><br>
					<a href="#" class="banner_btn">¡Empieza a comprar!</a>
				</div>
			</div>
		</section>
		<!-- -------------------------- TBA -------------------------- -->
		<section id="nosotros">
			<div class="productscontainer">
				
				<div class="row featurette">
					<div class="col-md-6 ">
						<img id="aboutus" src="Images/Gecko_logo.png" alt="">
					</div>
					<div class="col-md-6 pl-5 conttext pl-5">
					<h1 class="featurette-heading text-bold">
						<span class="text-muted">Acerca de</span> Nosotros<span class="text-muted">.</span>
					</h1>
						<p class="">Somos una empresa dedicada a traer tu diseño a la vida, en productos tales como tazas, playeras, sudaderas, llaveros, rompecabezas, entre muchos otros productos. Si tienes un diseño en mente, o quieras uno completamente original... ¡Nosotros te ayudamos!</p>
					</div>
				</div>


				<div class="conttext">
					<p>
					</p>
				</div>
			</div>
		</section>
		<section id="productos">
			<div class="aboutuscontainer">
				<h1>Productos</h1>
				<div class="conttext">
					<p class="text-center">Desde tazas y playeras, hasta rompecabezas y llaveros.<br>¡Tenemos de todo! ¡Revisa nuestro catalogo de productos!
					</p>
					<div class="row text-center pb-5">
						<div class="col-lg-3">
							<img src="Images/Productos/playeras.png" class="bd-placeholder-img" width="140" height="140"focusable="false">
							<h5 class="pt-3">Playeras</h5>
						</div>
						<div class="col-lg-3">
							<img src="Images/Productos/tazas.png" class="bd-placeholder-img" width="140" height="140" focusable="false">
							<h5 class="pt-3">Tazas</h5>
						</div><!-- /.col-lg-4 -->
						<div class="col-lg-3">
							<img src="Images/Productos/llaveros.png" class="bd-placeholder-img" width="200" height="140" focusable="false">
							<h5 class="pt-3">Llaveros</h5>
						</div><!-- /.col-lg-4 -->
						<div class="col-lg-3">
							<img src="Images/Productos/rompecabezas.png" class="bd-placeholder-img" width="200" height="140" focusable="false">
							<h5 class="pt-3">Rompecabezas</h5>
						</div><!-- /.col-lg-4 -->
					</div><!-- /.row -->

				</div>

				<a href="productos.php" type="button" class="containerbtn">¡Revisa nuestro catálogo!</a>
			</div>
		</section>
		<section id="servicios">
			<div class="productscontainer">
				<h1 class="text-bold">Servicios</h1>
				<div class="conttext">
					<p class="text-center">¡Revisa las opciones que tenemos para ti! Podemos personalizar tus productos.
					</p><br>

					<div class="row text-center">
						<div class="col-lg-4">
							<img src="Images/personalizar.png" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false">
							<h5 class="pt-3">Personaliza</h5>
							<p>¿Ya tienes tu diseño? Envíanos las características y tu propio diseño personalizado.</p>
							</div><!-- /.col-lg-4 -->
						<div class="col-lg-4">
							<img src="Images/crear.png" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false">
							<h5 class="pt-3">Creamos tu diseño</h5>
							<p>¿Aún no tienes diseño? Explícanos como quieres que sea tu diseño, y nosotros te ayudamos a darle la vida.</p>
						</div><!-- /.col-lg-4 -->
						<div class="col-lg-4">
							<img src="Images/foto.png" class="bd-placeholder-img rounded-circle" width="140" height="140" preserveAspectRatio="xMidYMid slice" focusable="false">
							<h5 class="pt-3">Sesiones fotográficas</h5>
							<p class="pb-5">Te ayudamos a capturar los momentos más importantes para ti, ¡Incluso con productos para ti!</p>
						</div><!-- /.col-lg-4 -->
					</div><!-- /.row -->

				</div>
				<a href="#" type="button" class="containerbtn">¡Realiza tu pedido!</a>
			</div>
		</section>
	</content>
	<!-- ------------------------------------ Footer ------------------------------------ -->
	<?php include 'footer.html';?>
	<!-- -------------------------------------------------------------------------------- -->
</body>

</html>

