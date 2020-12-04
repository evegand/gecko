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
    <link href="CSS/estilos.css" rel="stylesheet">                              <!--Estilos del footer--->
	<!--<link href="CSS/footer.css" rel="stylesheet">-->
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<link href="CSS/carrito.css" rel="stylesheet">                              <!--Carrito de compras--->
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
	<!------------------------------------- Barra de navegación ----------------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!--------------------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div style="height: 64px"></div>
		<h1>Carrito</h1>
		<div class="contenido">
			<div class="carrito">
		        <div class="carrito-cabecera">
		            <h5 class="product-title">Producto</h5>
		            <h5 class="precio titulo">Precio</h5>
		            <h5 class="cantidad titulo">Cantidad</h5>
		            <h5 class="total">Subtotal</h5>
		        </div>
		        <div class="carrito-cuerpo"> 
		        	<p>Aún no has agregado ningún producto.</p>
                <!--------------------------------Aqui empiezan los productos-------------->

		        </div>
			</div>
			<div style="text-align: right;"><br><button class="btn btn-primary">Proceder al Pago</button></div>
		</div>
		<script src="JS/carrito.js"></script>
		<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
</body>
</html>