<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
			   if (isset($_POST['id_user_delete'])){
			       $id_user_delete = $_POST['id_user_delete'];  
			       $consulta_eliminar = "DELETE from usuarios WHERE id_usuario=" .$id_user_delete;
			       $result_eliminar = mysqli_query($conexion,$consulta_eliminar);
			       if(!$result_eliminar)
			          echo 'Error';
			       else
			          header("location:admin.php");

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
	    <link href="CSS/dropdowns.css" rel="stylesheet">
	    <link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet">
	   	<script type="text/javascript" src="JS/nav.js"></script>
	   	<script type="text/javascript" src="micuenta.js"></script>
	    
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
			<h1>Administrar sitio</h1>
			<div style="text-align: center;color: white;width: 80vw;margin:auto;">

		<?php
			$username = $_SESSION['login_user_sys'];
			$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
			$result= mysqli_query($conexion,$consulta); 
			$fila_user = mysqli_fetch_array($result);
			$rol = $fila_user['id_rol'];
			if ($rol == 2){
			  echo "<h3 align='center'>Herramientas de administrador</h3>
			        <h4 align='center'>Usuarios Registrados</h4><div id='metodosP' class='dropMenu'>
			        <table class='tabla_drop'><tr>
			            <th>id_usuario</th>
			            <th>Nombres</th>
			            <th>Apellidos</th>
			            <th>Telefono</th>
			            <th>Correo</th>
			            <th>Usuario</th></tr>";
			$consulta= "SELECT * FROM usuarios"; 
			$result= mysqli_query($conexion,$consulta); 
			  while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
			      echo "<tr><td>" . $row['id_usuario'] . "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido'] . "</td><td>" . $row['telefono'] . "</td><td>" . $row['correo'] . "</td><td>" . $row['username'] . "</td><td></td><td>
			      	<form method='post' action=''><button class='btn btn-secondary' type='submit' name= 'id_user_modify' value='". $row['id_usuario'] ."'>Modificar</button><button class='btn btn-danger' type='submit' name= 'id_user_delete' value='". $row['id_usuario'] ."'>Eliminar</button></form></td></tr>";}
			  echo "</table></div>";
}
		?>





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