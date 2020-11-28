<?php
include('login.php'); //Se incluye el script de login


//Creo que no se necesitan v v v v
//include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
//include("config/conexion.php");//Contiene de conexion a la base de datos
 
if(isset($_SESSION['login_user_sys'])){
	header("location: micuenta.php");
}
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
	<link href="CSS/productos.css" rel="stylesheet">
    <link href="CSS/formularios.css" rel="stylesheet">                          <!--Estilos formularios-->  
	<!---------------Javascript (scripts)------------------------>
	<script type="text/javascript" src="JS/nav.js"></script>
</head>
<body>
	<!-------------------------------- Barra de navegación ---------------------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!---------------------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div style="height: 64px"></div>
		<h1>Iniciar Sesión</h1>
		<div class="contenido" style="text-align: center; margin:auto;">
				<form method="POST" action="#">
					<table class="formulario">
					<tr><td>Usuario: </td><td><input type="" name="usuario" class="form-control" placeholder="Usuario" required=""></td></tr>
					<tr><td>Contraseña: &nbsp</td><td><input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required=""></td></tr>				
					<tr><td></td><td><input type="submit" name="submit" value="Iniciar sesión" class="btn btn-dark"></td></tr>
					</table>
					<?php echo "<p style='color:red'>".$error."</p>"; ?>
					<p class="text-white">¿No tienes cuenta? <a style="color: #B1D22B;" href="registrar_usuario.php">¡Regístrate!</a><br><a href="#" style="color: #C7D787;">Olvidé mi contraseña</a><br><br></p>
				</form>
		</div>
</body>
</html>