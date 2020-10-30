<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
		<title>Ideas Gecko</title>
	    
	    <!-- CSS (estilos) -->
	    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="CSS/geckonavbar_style.css" rel="stylesheet">
	    <link href="CSS/estilos.css" rel="stylesheet">
	    <link href="CSS/productos.css" rel="stylesheet">
	    <link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet">
	   	<script type="text/javascript" src="JS/nav.js"></script>
	    
	    <!-- Javascript (funciones) -->
	    <link href="">
	</head>
	<body>
		<!-- -------------------------- Menu -------------------------- -->
		<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
		    <a class="navbar-brand pl-2 pr-2" href="index.html">
		        <img id="logo" src="Images/BlackGecko.png" width="55" height="50" alt="">
		    </a>
		    <a href="index.html" class="navbar-brand pr-5">Ideas Gecko</a>
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

		    <!-- Dropdown menu -->
		    <div class="collapse navbar-collapse" id="toggleMenu">
		        <ul class="navbar-nav mr-auto">
		            <li class="nav-item active">
		                <a class="nav-link pl-4 pr-4" href="#nosotros">Nosotros</a>
		            </li>
		            <li class="nav-item dropdown">
		                <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
		                    href="#" 
		                    id="titleProducts" 
		                    role="button" 
		                    data-toggle="dropdown" 
		                    aria-haspopup="true" 
		                    aria-expanded="false"
		                    onclick="validarmenu(this, this.id, 'dropdownProducts')"
		                    style="color: white"> Productos
		                </a>
		                <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownProducts">
		                    <a class="dropdown-item" href="#">Tazas</a>
		                    <a class="dropdown-item" href="#">Playeras</a>
		                    <a class="dropdown-item" href="#">Sudaderas</a>
		                    <a class="dropdown-item" href="#">Llaveros</a>
		                    <a class="dropdown-item" href="#productos">Más productos...</a>
		                </div>
		            </li>
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
		            <li class="nav-item">
		                <a class="nav-link pl-3 pr-3" href="iniciar_sesion.php">Inicia sesión</a>
		            </li>
		            <li class="nav-item active">
		                <a class="nav-link pl-3 pr-3" href="carrito.html">Carrito <img class="pl-1 pt-1" id="cart" src="Images/carrito.png" width="30" height="28" alt=""></a>
		            </li>
                	
		        </ul>
		        <span class="navbar-text pl-1" style="margin-left:12em">
		            ¡Personaliza tu mundo!
		        </span>
		    </div>
		</nav>
		<!-- -------------------------- Contenido -------------------------- -->
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