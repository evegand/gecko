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
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<link href="CSS/productos.css" rel="stylesheet">                            <!--Estilos productos---->
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
	<!------------------------------------- Barra de navegación --------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!------------------------------------------------------------------------------------------------------------------->

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
				$prodJSON = json_encode(array('id' => $fila['id_producto'],'nombre' => $fila['nombre_producto'],'precio' => $fila['precio'],'imagen' => $fila['imagen'] . ".jpg", 'cantidad' => 1));
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