<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos
if (isset($_POST['logout'])) {
	session_start();
	session_destroy();
	$_SESSION = array();
	header("location: index.html");}

if(!isset($_SESSION)) 
    { 
        session_start(); 

    }
?>

<!DOCTYPE html>
<html lang="en">
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
		                <a class="nav-link pl-3 pr-3" href="micuenta.php" id="sesion" style="color:white">Mi cuenta</a>
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
			<h1>Mi cuenta</h1>
			<div style="text-align: center;color: white;width: 45vw;margin:auto;">
				<?php
					$username = $_SESSION['login_user_sys'];
					$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
					$result= mysqli_query($conexion,$consulta); 
					if  (!$result){
					      echo "Error en la consulta : " . mysqli_error($conexion);
					}

					$fila = mysqli_fetch_array($result);
					$nombre = $fila['nombre'];
					$apellido = $fila['apellido'];
					$usuario = $fila['username'];
					mysqli_free_result($result);
				?>
				<br>
				<h2>Nombre de usuario: <?php echo $usuario; ?></h2>
     			 <p>Titular de la cuenta: <?php echo $nombre ." ". $apellido; ?></p>
     			 <button class="btn btn-dark" style="width: 100%">Historial de pedidos</button><br><br>
     			 <button class="btn btn-dark" style="width: 100%">Administrar métodos de pago</button><br><br>
     			 <button class="btn btn-dark" style="width: 100%">Administrar domicilios</button><br><br>
     			 <button class="btn btn-dark" style="width: 100%">Modificar datos de la cuenta</button><br><br>
     			 <button class="btn btn-dark" style="width: 100%">Cambiar contraseña</button><br><br>
     			 <form action="" method="POST">
					<input style="width: 70%" type="submit" value="Cerrar sesión" name="logout" class="btn btn-danger">
				</form>
			</div>
					<!-- -------------------------- Footer -------------------------- -->
		<footer id="footer" class="footer-distributed">
			<!------------- Columna 1 (izquierdo) ------------->
			<div class="footer-left">
				<p class="footer-links">
					<a href="#">Inicio</a>
					<a href="#">Nosotros</a>
					<a href="#">Contáctanos</a>
				</p>

				<p class="footer-company-name">© 2020 Ideas Gecko — Guadalajara, Jalisco.</p>
			</div>
			<!------------- Columna 2 (centro) ------------->
			<div class="footer-center">
				<div>
					  <p>Jardines de las Clavelinas No. 1298<br>
						Colonia Jardines del Vergel.<span>Guadalajara, Jalisco. México.</span></p>
				</div><br>
				<div>
					<p>Escribenos a: <span>(+52) 33 1527 1078</span></p>
				</div>
				<div>
					<p>Personaliza: <a href="mailto:ideasgecko@gmail.com">ideasgecko@gmail.com</a></p><br>
					<p>Servicios Fotográficos: <a href="mailto:vaneandrade@gmail.com">vaneandrade@gmail.com</a></p>
				</div>
			</div>
			<!------------- Columna 3 (derecha) ------------->
			<div class="footer-right">
				<p class="footer-company-about">
					<span><b>Ideas Gecko</b></span>
					Somos una empresa que se dedica a entregar productos personalizados. Desde tazas, termos, playeras, suéteres y mucho más. Nos encargamos de llevar a la vida tu visión.</p>
				<div class="footer-icons">
					<a href="#"><i class="icon-facebook"></i></a>
					<a href="#"><i class="icon-instagram"></i></a>
					<a href="https://api.whatsapp.com/send?phone=523315271078"><i class="icon-whatsapp"></i></a>
					<a href="mailto:ideasgecko@gmail.com"><i class="icon-gmail"></i></a>
				</div>
			</div>
		</footer>
</body>
</html>

