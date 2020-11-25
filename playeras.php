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
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<link href="CSS/productos.css" rel="stylesheet">                            <!--Estilos productos---->
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
	            <li class="nav-item dropdown" > 
	                <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
	                    href="#productos" 
	                    id="titleProducts" 
	                    role="button" 
	                    data-toggle="dropdown" 
	                    aria-haspopup="true" 
	                    aria-expanded="false"
	                    onclick="validarmenu(this, this.id, 'dropdownProducts')"
	                    style="color:green;"> Productos  <!--Página actual--> 
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
		<div style="height: 64px"></div>
		<h1>Playeras</h1>
		<div class="contenido">

			<?php
			$link = mysqli_connect("localhost", "root", "", "geckodatabase");

			if (mysqli_connect_errno()){
			    echo "No se pudo conectar : " . mysqli_connect_error();
			    exit;
			}
			$consulta= "SELECT * FROM productos WHERE id_categoriaf = 1"; 
			$resultado= mysqli_query($link,$consulta) ;

			while($fila = mysqli_fetch_assoc($resultado)){   //Creates a loop to loop through results
				$prodJSON = json_encode(array('id' => $fila['id_producto'],'nombre' => $fila['nombre_producto'],'precio' => $fila['precio'],'imagen' => $fila['id_producto'] . ".jpg", 'cantidad' => 1));
		   		echo "<div class='producto'>
						<p class='add-cart cart' onclick='agregarProducto(" . $prodJSON . ")'><a href='#'>Añadir al Carrito</a><br><button class='btn btn-secondary btn-sm'>CH</button> <button class='btn btn-secondary btn-sm'>M</button> <button class='btn btn-secondary btn-sm'>G</button></p>
						<img class='imgPr' alt='Imagen del producto' src='Images/Productos/" . $fila['id_producto'] . ".jpg'>
						<div class='pie-producto'><h2 class='productName'>" . $fila['nombre_producto'] . "</h2>
						<label class='productPrice'>$" . $fila['precio'] . ".00</label></div>
					  </div>";
					  
					  //echo json_encode(array('id' => $fila['id_producto'],'nombre' => $fila['nombre_producto'],'precio' => $fila['precio'],'imagen' => $fila['id_producto'] . "jpg"));
					}
				?>



<!--
			<div class="producto">
				<p class="add-cart cart1" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<div class='pie-producto'><h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label></div>
			</div>
			<div class="producto">
				<p class="add-cart cart2" ><a href="#">Añadir al Carrito</a><br><button class='btn btn-secondary btn-sm'>CH</button> <button class='btn btn-secondary btn-sm'>M</button> <button class='btn btn-secondary btn-sm'>G</button></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<h2 class="productName"><a href="#">ProductName</a></h2>
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart3" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/2.jpg">
				<h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart4" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart5" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/3.jpg">
				<h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart6" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<h2 class="productName">ProductName</h2>	
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart7" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label>
			</div>
			<div class="producto">
				<p class="add-cart cart8" ><a href="#">Añadir al Carrito</a></p>
				<img class="imgPr" src="Images/Productos/1.jpg">
				<h2 class="productName">ProductName</h2>
				<label class="productPrice">$300.00</label>
			</div>
-->						
		</div>
<script type="text/javascript" src="JS/carrito.js"></script>
</body>
</html>