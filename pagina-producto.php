<?php
	if(!isset($_SESSION))
	    session_start();

	$product_id = $_GET['prod_id'];
	if (isset($_POST['origen'])) $origen = $_POST['origen'];

	// echo $product_id;
	// echo $origen;

	include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
	include("config/conexion.php");//Contiene de conexion a la base de datos

	$consulta= "SELECT * FROM productos WHERE id_producto = ".$product_id.";"; 
	$resultado= mysqli_query($conexion,$consulta);

	while($fila = mysqli_fetch_assoc($resultado)){   //Creates a loop to loop through results
		$id = $fila['id_producto'];
		$nombre_producto =  $fila['nombre_producto'];
		$descripcion = $fila['descripcion'];
		$precio = $fila['precio'];
		$imagen = $fila['imagen'];
		$categoria = $fila['id_categoriaf'];
	}

	$consulta = "SELECT p.id_producto, p.nombre_producto, p.id_categoriaf , e.existencia
				FROM productos AS p INNER JOIN existencias AS e ON p.id_producto = e.id_producto
				WHERE p.id_producto = ".$id.";";
	$resultado= mysqli_query($conexion, $consulta);

	while($fila = mysqli_fetch_assoc($resultado)){   //Creates a loop to loop through results
		$existencias = $fila['existencia'];
		//echo $fila['id_producto'];
		//echo $fila['nombre_producto'];
		//echo $fila['existencia'];
	}
	//echo $existencias;


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
	<script type="text/javascript" src="JS/carrito.js"></script>

</head>
<body>
	<!------------------------------------- Barra de navegación --------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!------------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div style="height: 64px"></div>
		<center><h1 style="font-size: 25px;"><?php echo $nombre_producto; ?></h1></center>
		<div class="contenido">
			<center>
				<?php 
				/*
					echo "<div style='color: white;'>";
					echo $id."<br>";
					echo $nombre_producto."<br>";
					echo $descripcion."<br>";
					echo $precio;
					echo "</div>";
				*/
				?>
			
			<?php				
				$prodJSON = json_encode(array('id' => $product_id,'nombre' => $nombre_producto,'precio' => $precio,'imagen' => $imagen . ".jpg", 'cantidad' => 1));
		   		echo "<div class='producto pb-3'>
						<p class='add-cart cart' onclick='agregarProducto(" . $prodJSON . ")'>
							<a href='#'>Añadir al Carrito</a><br>
							<button class='btn btn-secondary btn-sm'>CH</button>
							<button class='btn btn-secondary btn-sm'>M</button>
							<button class='btn btn-secondary btn-sm'>G</button></p>
							<img class='imgPr' alt='Imagen del producto' src='Images/Productos/" . $imagen . ".jpg'>
						</p>
					  </div>";
				echo "<p style='color: white;'><b style='color: #C4FF33;'>Descripción:</b><br>".$descripcion."<br><br>";
				echo "<b style='color: #C4FF33;'>Precio:</b> $".$precio.".00<br>";
				echo "<b style='color: #C4FF33;'>Inventario:</b> Tenemos ".$existencias." en existencia.</p>";
				if($categoria != 2){
					echo "<b style='color: #C4FF33;'>Talla</b></label>
							<select name='' id=''>
								<option value='Chico'>Chico</option>
								<option value='Mediano'>Mediano</option>
								<option value='Grande'>Grande</option>
							</select><br><br>";
				}

			?>
			<button class="btn btn-sm" onclick="agregarProducto(<?php $prodJSON; ?>);" style="background-color: #C4FF33;">Agregar al carrito</button>
			
			<a href="<?php echo $origen; ?>" class="btn btn-dark" style=" width: 92%;">Regresar</a>
			</center>
		</div>

</body>
</html>