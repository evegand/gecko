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
	<link href="CSS/servicios.css" rel="stylesheet">                            <!--Estilos servicios---->
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

	<!-- ------------------------------------------ Contenido -------------------------------------------------------->
	<content>
		<div style="height: 64px"></div>
		<h1 class="pb-3">Personaliza tus productos</h1>
		<!-- -------------------------- Personaliza -------------------------- -->
		<section class="categories">
			<center>
			<div class="customize text-center">
				<p style="color: #CBD895;">Selecciona tu pedido, y si tienes un diseño ya realizado, puedes enviarlo por este medio. <br>Nos pondremos en contacto contigo para continuar con el proceso a la brevedad posible.<br>
				<font color="white"> <small><a style="color: red;">*</a> (campos obligatorios)</small></font><br><br>

				<form action="cotizacion.php" method="POST">
					<div class="form-group">
						<label for="nombre">Ingresa tu nombre<a style="color: red;"> *</a></label>
						<input type="text" class="form-control" id="nombre" placeholder="Nombre completo" required>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Ingresa tu correo electrónico<a style="color: red;"> *</a></label>
						<input type="email" class="form-control" id="correo" placeholder="Correo eletrcónico" rquired>
					</div>
					<div class="form-group">
						<label for="producto">Selecciona un producto<a style="color: red;"> *</a></label>
						<select name="producto" id="producto" class="form-control" required>
							<!-- Selecciona el producto-->
							<?php
								include("config/db.php");
								//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
								include("config/conexion.php"); // Contiene de conexion a la base de datos

								$consulta= "SELECT * FROM categorias;";
								$resultado= mysqli_query($conexion, $consulta) ;

								while($fila = mysqli_fetch_assoc($resultado)) {
									echo "<option value='".$fila['nombre_categoria']."'>".$fila['nombre_categoria']."</option>";
									echo "VALUE: ".$fila['nombre_categoria'];
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="color">Selecciona un color<a style="color: red;"> *</a></label>
						<select name="color" id="color" class="form-control" required>
							<option value="blanco">Blanco</option>
							<option value="rojo">Rojo</option>
							<option value="azul">Azul</option>
							<option value="negro">Negro</option>
						</select>
					</div>
					<div class="form-group">
						<label class="textarea text-white" for="mensaje">Mensaje<a style="color: red;"> *</a></label>
						<textarea type="textarea" rows="3" class="form-control" name="consulta" placeholder="Especifica como quieres tu diseño, o si hay detalles importantes que quieres mencionar." required></textarea>					</div>
					<div class="form-group">
						<label for="archivo">Selecciona tu diseño</label>
							<input type="file" class="form-control-file" id="archivo">
					</div>
					<input type="submit" value="Realizar cotización" class="btn-form btn mb-5" style="background-color: #C4FF33">
				</form>

			</div>
			</center>
		</section>
	</content>

<!-- ------------------------------------ Footer ------------------------------------ -->
<?php include 'footer.html';?>
<!-- -------------------------------------------------------------------------------- -->
</body>
</html>