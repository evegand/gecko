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
    <link href="CSS/geckonavbar_style.css" rel="stylesheet">                    <!--Barra de navegación-->
    <link href="CSS/estilos.css" rel="stylesheet">                              <!--Cuerpo index/footer-->
	<!--<link href="CSS/footer.css" rel="stylesheet">-->
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
	<!------------------------------Barra de navegación------------------------------------------------------------------------------------------------------------------------------>
	<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
		<!---Logotipo----------------------------------------------------------------------------->
	    <a href="index.php" class="navbar-brand pr-5"><img id="logo" src="Images/BlackGecko.png" width="55" height="50" alt=""> Ideas Gecko</a>
	    <!---Botón para barra de navegación responsive-------------------------------------------->
	    <button class="navbar-toggler" 
	            id="toggleButton"
	            type="button" 
	            data-toggle="collapse"
	            data-target="#navbarText" 
	            aria-controls="navbarText" 
	            aria-expanded="false" 
	            aria-label="Toggle navigation"
	            onclick="validarmenu(this, this.id, 'toggleMenu')">
	        <span class="navbar-toggler-icon"></span>
	    </button>
	    <!---Barra de navegación (Contenido)------------------------------------------------------>
	    <div class="collapse navbar-collapse" id="toggleMenu">
	    	<!---Opciones------------------------------------------------------>
	        <ul class="navbar-nav mr-auto">
	        	<!---(Opción) Productos----------------------------->
	            <li class="nav-item dropdown">
	                <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
	                    href="#productos" 
	                    id="titleProducts" 
	                    role="button" 
	                    data-toggle="dropdown" 
	                    aria-haspopup="true" 
	                    aria-expanded="false"
	                    onclick="validarmenu(this, this.id, 'dropdownProducts')"> Productos
	                </a>
	                <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownProducts">
	                    <a class="dropdown-item" href="playeras.php">Playeras</a>
	                    <a class="dropdown-item" href="#">Tazas</a>
	                    <a class="dropdown-item" href="#">Sudaderas</a>
	                    <a class="dropdown-item" href="#">Llaveros</a>
	                    <a class="dropdown-item" href="">Más productos...</a>
	                </div>
	            </li>
	            <!---(Opción) Servicios-----------------------------> 	           
	           <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
                      href="#" 
                      id="titleServices" 
                      role="button" 
                      data-toggle="dropdown" 
                      aria-haspopup="true" 
                      aria-expanded="false"
                      onclick="validarmenu(this,this.id, 'dropdownServices')"> Servicios
                  </a>
                  <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownServices">
                      <a class="dropdown-item" href="#">Personalización</a>
                      <a class="dropdown-item" href="#">Paquetes fotográficos</a>
                      <a class="dropdown-item" href="#">Eventos</a>
                      <a class="dropdown-item" href="#servicios">Más...</a>
                  </div>
              </li>
	            <!---(Opción) Contacto------------------------------>
	            <li class="nav-item"><a class="nav-link pl-4 pr-4" href="contacto.php">Contacto</a></li>
	            <!---(Opción) Iniciar sesión------------------------>
	            <li class="nav-item"><a class="nav-link pl-3 pr-3" href="iniciar_sesion.php" id="sesion">Iniciar sesión</a></li> <!--Si hay cuenta iniciada, cambia el enlace por "Mi cuenta"--><?php include('zmenu.php') ?>
	            <!---(Opción) Carrito------------------------------->
	            <li class="nav-item"><a class="nav-link pl-3 pr-3" href="carrito.php">Carrito <img class="pl-1 pt-1" id="cart" src="Images/carrito.png" width="30" height="28" alt=""></a></li>  	
	        </ul>
	        <!---Frase------------------------------------------------>
	        <span class="navbar-text pl-1" style="width: 289px;text-align: right;">
	            ¡Personaliza tu mundo!
	        </span>
	    </div>
	</nav>
	<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

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

				<a href="#" type="button" class="containerbtn">¡Revisa nuestro catálogo!</a>
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
	<!-- -------------------------- Footer -------------------------- -->
	<footer id="footer" class="footer-distributed">
		<!------------- Columna 1 (izquierdo) ------------->
		<div class="footer-left">
			<p class="footer-links">
				<a href="#">Inicio</a>
				<a href="#">Nosotros</a>
				<a href="#">Contáctanos</a>
			</p>

			<p class="footer-company-name">© 2020 Ideas Gecko — Guadalajara, Jalisco.</p>
		</div>
		<!------------- Columna 2 (centro) ------------->
		<div class="footer-center">
			<div>
				  <p>Jardines de las Clavelinas No. 1298<br>
					Colonia Jardines del Vergel.<span>Guadalajara, Jalisco. México.</span></p>
			</div><br>
			<div>
				<p>Escribenos a: <span>(+52) 33 1527 1078</span></p>
			</div>
			<div>
				<p>Personaliza: <a href="mailto:ideasgecko@gmail.com">ideasgecko@gmail.com</a></p><br>
				<p>Servicios Fotográficos: <a href="mailto:vaneandrade@gmail.com">vaneandrade@gmail.com</a></p>
			</div>
		</div>
		<!------------- Columna 3 (derecha) ------------->
		<div class="footer-right">
			<p class="footer-company-about">
				<span><b>Ideas Gecko</b></span>
				Somos una empresa que se dedica a entregar productos personalizados. Desde tazas, termos, playeras, suéteres y mucho más. Nos encargamos de llevar a la vida tu visión.</p>
			<div class="footer-icons">
				<a href="#"><i class="icon-facebook"></i></a>
				<a href="#"><i class="icon-instagram"></i></a>
				<a href="https://api.whatsapp.com/send?phone=523315271078"><i class="icon-whatsapp"></i></a>
				<a href="mailto:ideasgecko@gmail.com"><i class="icon-gmail"></i></a>
			</div>
		</div>
	</footer>
</body>
<!--
	<center><img src="Imagenes/Gecko logo.png" width="200" height="100"></center>

	<hr/>
	<footer class="foot">
		<p>Contacto</p>
		<p>Ideas Gecko - <?php echo date('Y'); ?></p>
	</footer>
-->
</html>

