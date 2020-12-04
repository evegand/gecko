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
				<p>Selecciona tu pedido, y si tienes un diseño ya realizado, puedes enviarlo por este medio.</p>

				<form>
					<div class="form-group">
						<label for="nombre">Ingresa tu nombre</label>
						<input type="text" class="form-control" id="nombre" placeholder="Nombre completo" required>
					</div>
					<div class="form-group">
						<label for="formGroupExampleInput2">Ingresa tu correo electrónico</label>
						<input type="email" class="form-control" id="correo" placeholder="Correo eletrcónico" rquired>
					</div>
					<div class="form-group">
						<label for="producto-seleccionado">Selecciona un producto</label>
						<select name="productos" id="producto-seleccionado" class="form-control" required>
							<!-- Selecciona el producto-->
							<?php
								include("config/db.php");
								//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
								include("config/conexion.php");//Contiene de conexion a la base de datos

								$consulta= "SELECT * FROM categorias"; 
								$resultado= mysqli_query($link, $consulta) ;

								while($fila = mysqli_fetch_assoc($resultado)) {
									echo "<option value='".$fila['nombre_categoria']."'>".$fila['nombre_categoria']."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="color-seleccionado">Selecciona un color</label>
						<select name="colores" id="color-seleccionado" class="form-control" required>
							<option value="blanco">Blanco</option>
							<option value="rojo">Rojo</option>
							<option value="azul">Azul</option>
							<option value="negro">Negro</option>
						</select>
					</div>
					<div class="form-group">
						<label class="textarea text-white" for="mensaje">Mensaje</label>
						<textarea type="textarea" rows="3" class="form-control" name="consulta" placeholder="Mensaje" required></textarea>
					</div>
					<div class="form-group">
						<label for="exampleFormControlFile1">Selecciona tu diseño</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1">
					</div>
					<input type="submit" value="Enviar" class="btn-form btn btn-success mb-5">
				</form>

			</div>
			</center>
		</section>
	</content>

</body>
</html>