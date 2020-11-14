<?php
include('login.php'); // Includes Login Script
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos
 
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
	    
	    <!-- CSS (estilos) -->
	    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <link href="CSS/geckonavbar_style.css" rel="stylesheet">
	    <link href="CSS/estilos.css" rel="stylesheet">
	    <link href="CSS/productos.css" rel="stylesheet">
	    <link href="CSS/formularios.css" rel="stylesheet">
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
		                    onclick="validarmenu(this, this.id, 'dropdownProducts')"> Productos
		                </a>
		                <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownProducts">
		                    <a class="dropdown-item" href="#">Tazas</a>
		                    <a class="dropdown-item" href="playeras.php">Playeras</a>
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
		                <a class="nav-link pl-3 pr-3" href="iniciar_sesion.php" style="color: white" id="sesion">Inicia sesión</a>
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
			<h1>Iniciar Sesión</h1>
			<div class="contenido" style="text-align: center; margin:auto;">
					<form method="POST" action="#">
						<table class="formulario">
						<tr><td>Usuario: </td><td><input type="" name="usuario" class="form-control" placeholder="Usuario" required=""></td></tr>
						<tr><td>Contraseña: &nbsp</td><td><input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required=""></td></tr>				
						<tr><td></td><td><input type="submit" name="submit" value="Iniciar sesión" class="btn btn-dark"></td></tr>
						</table>
						<?php echo "<p style='color:red'>".$error."</p>"; ?>
						<a href="registrar_usuario.php">Registrar nuevo usuario</a><br><br>
						<a href="#">Olvidé mi contraseña</a>
					</form>
			</div>
	</body>
</html>