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
	<!--Icon-->
	<link rel="icon" href="Images/BlackGecko.png">

</head>
<body>
	<!------------------------------------- Barra de navegación ------------------------------------------------------>
	<?php include 'menu.php'; ?>
	<!---------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div class="text-center " style="padding: 90px 30px 10px 30px;">
			<h1 class="pb-3">Servicios Fotográficos</h1>
			<p>Somos socios con el estudio fotográfico Vane Andrade, visita su sitio web para ponerte en contacto <br>y ver los paquetes que ofrecen. (Da clic en la imagen para ir a su sitio web)</p>
			<a href="https://www.estudiovaneandrade.com"><img src="Images/vaneandrade.jpg" width="50%"></a>
			<!-- -------------------------- Secciones -------------------------- -->

			<!-- ----------------------------------------------------------------- -->

		</div>
	<!-- ------------------------------------ Footer ------------------------------------ -->
	<?php include 'footer.html';?>
	<!-- -------------------------------------------------------------------------------- -->
</body>

</html>

