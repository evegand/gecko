<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

if(!isset($_SESSION)) 
    session_start(); 

//Estos bloques de código definen el header después de ejecutarse, por eso se colocan al principio-----------

//----Si no hay sesión iniciada, redirige a iniciar sesión-------
if(!isset($_SESSION['login_user_sys']))
	header("location: iniciar_sesion.php");

//------Al cerrar sesión redirige a la página principal----------
if (isset($_POST['logout'])) {
	session_start();
	session_destroy();
	$_SESSION = array();
	header("location: index.php");
}

//-----------Modifica usuario y recarga la página----------------
if (isset($_POST['modificado'])){
  $user_modify= $_POST['modificado'];
  $new_nombres = $_POST['new_nombres'];
  $new_apellidos = $_POST['new_apellidos'];
  $new_telefono = $_POST['new_telefono'];

  $consulta_modificar = "UPDATE usuarios SET nombre='" .$new_nombres. "', apellido='" .$new_apellidos. "', telefono='" .$new_telefono. "' WHERE id_usuario='" . $user_modify . "'";
  $result_modificar = mysqli_query($conexion,$consulta_modificar);
  if (!$result_modificar)
    echo 'Error';
  else
  	header("location:micuenta.php");
}
//-------------------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<title>Ideas Gecko</title>
    
    <!-----------------CSS (estilos)----------------------------->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">              <!--Bootstrap------------>
    <link href="CSS/geckonavbar_style.css" rel="stylesheet">                    <!--Barra de navegación-->
    <link href="CSS/estilos.css" rel="stylesheet">                              <!--Estilos del footer--->
    <link href="CSS/productos.css" rel="stylesheet">
    <link href="CSS/dropdowns.css" rel="stylesheet">                            <!--Menús desplegables--->
    <link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
    <!--------------Javascript (scripts)------------------------->
   	<script type="text/javascript" src="JS/nav.js"></script>
   	<script type="text/javascript" src="JS/micuenta.js"></script>
</head>
<body>
	<!------------------------------------- Barra de navegación ----------------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!--------------------------------------------------------------------------------------------------------------------------->


	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div style="height: 64px"></div>
		<h1>Mi cuenta</h1>
		<div style="text-align: center;color: white;width: 80vw;margin:auto;">
			<?php				
				$username = $_SESSION['login_user_sys'];
				$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
				$result= mysqli_query($conexion,$consulta); 
				if  (!$result){
				      echo "Error en la consulta : " . mysqli_error($conexion);
				}

				$fila_user = mysqli_fetch_array($result);
				$nombre = $fila_user['nombre'];
				$apellido = $fila_user['apellido'];
				$usuario = $fila_user['username'];
				$id_usuario = $fila_user['id_usuario'];
				$rol = $fila_user['id_rol'];

				mysqli_free_result($result);
			?>
			<br>
			<h2>Nombre de usuario: <?php echo $usuario; ?></h2>
 			<p>Titular de la cuenta: <?php echo $nombre ." ". $apellido; ?></p>

 			
			<?php
			//--------------------------------------------Datos de la cuenta------------------------------------------------
				echo "<button class='btn btn-dark' onclick='dropMenu(`datosCuenta`)'>Modificar datos de la cuenta</button>
						<div id='datosCuenta' class='dropMenu' style='display:none;'>
						  <table class='tabla_drop'>
						  	<form method='post' action=''>
					          <tr><td>Nombres           </td> <td><input type='text' name='new_nombres'   value='" . $fila_user['nombre']   . "'></td></tr>
					          <tr><td>Apellidos         </td> <td><input type='text' name='new_apellidos' value='" . $fila_user['apellido'] . "'></td></tr>
					          <tr><td>Telefono          </td> <td><input type='text' name='new_telefono'  value='" . $fila_user['telefono'] . "'></td></tr>
					          <tr><td>Correo electrónico</td> <td>" . $fila_user['correo']                                                  . "  </td></tr>
					          <tr><td>Nombre de usuario </td> <td>" . $fila_user['username']                                                . "  </td></tr>
					          <tr><td>                  </td> <td><button class='btn btn-success' type='submit' name='modificado' value='". $id_usuario ."'>Modificar</button></td></tr>
					        </form>
				          </table>
				        </div><br><br>";			 
			//--------------------------------------------Datos métodos de pago------------------------------------------------
				$consulta= "SELECT * FROM metodospago WHERE id_usuario='" . $id_usuario . "'";
				$result= mysqli_query($conexion,$consulta); 
				echo '<button class="btn btn-dark"  onclick="dropMenu(`metodosP`)">Administrar métodos de pago</button><div id="metodosP" class="dropMenu" style="display:none;">
						<table class="tabla_drop"><tr class><th>Titular</th><th>Número de tarjeta</th><th>Expira</th><th></th></tr>';

				while($fila = mysqli_fetch_assoc($result)){
					echo '<tr><td> ' . $fila['titular'] . '</td><td> **** **** **** ' . substr($fila['numero_tarjeta'], -4) . '</td><td>' . $fila['fecha_vencimiento'] . '</td><td style="color:rgb(200,100,100);">Eliminar</td></tr> ';

				}
				echo '</table></div><br><br>';
			//--------------------------------------------Botones sin funcionalidad------------------------------------------------
				echo '<button class="btn btn-dark" style="width: 100%" onclick="dropMenu(``)">Historial de pedidos</button><div id="historial"></div><br>	 
	     			  <button class="btn btn-dark" style="width: 100%" onclick="dropMenu(``)">Administrar domicilios</button><div></div><br>
	     			  <button class="btn btn-dark" style="width: 100%" onclick="dropMenu(``)">Cambiar contraseña</button><div></div><br>';

			//--------------------------------------------Administrar sitio------------------------------------------------	
				if ($rol == 1){
					echo '<a href="admin.php"><button class="btn btn-warning" style="width:70%;">Administrar sitio</button></a><br><br>';
			}	   
			//--------------------------------------------Cerrar sesión------------------------------------------------	
				echo ' <form action="" method="POST">
					<input style="width: 70%" type="submit" value="Cerrar sesión" name="logout" class="btn btn-danger">
				</form>	' ;

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

