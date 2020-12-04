<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

if(!isset($_SESSION)) 
    session_start(); 

//Estos bloques de código definen el header después de ejecutarse, por eso se colocan al principio-----------

//----Si no hay sesión iniciada, redirige a iniciar sesión-------
if(!isset($_SESSION['login_user_sys']))
	header("location: iniciar_sesion.php");

//------Al cerrar sesión redirige a iniciar sesión---------------
if (isset($_POST['logout'])) {
	//session_start();
	session_destroy();
	$_SESSION = array();
	header("location: iniciar_sesion.php");
}

//-----------Modifica usuario y recarga la página----------------
if (isset($_POST['modificado'])){
  $user_modify= $_POST['modificado'];
  $new_nombres = $_POST['new_nombres'];
  $new_apellidos = $_POST['new_apellidos'];
  $new_telefono = $_POST['new_telefono'];
  $new_RFC = $_POST['new_RFC'];
  $new_contrasena = $_POST['new_contrasena'];

  $consulta_modificar = "UPDATE usuarios SET nombre='$new_nombres', apellido='$new_apellidos', telefono='$new_telefono', RFC='$new_RFC', password='$new_contrasena' WHERE id_usuario='" . $user_modify . "'";
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
   	<script type="text/javascript" src="JS/forms.js"></script>
</head>
<body>
	<!------------------------------------- Barra de navegación ----------------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<link href="CSS/dropdowns.css" rel="stylesheet">
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
						  <table class='tabla_admin'>
						  	<form name='modifyForm' method='post' onsubmit='return confirmModifyUser()'>
					          <tr><td>Nombres           </td> <td><input type='text' name='new_nombres'   value='" . $fila_user['nombre']   . "' required minlength='4'></td></tr>
					          <tr><td>Apellidos         </td> <td><input type='text' name='new_apellidos' value='" . $fila_user['apellido'] . "' ></td></tr>
					          <tr><td>Telefono          </td> <td><input type='text' name='new_telefono'  value='" . $fila_user['telefono'] . "' placeholder='10 dígitos*' required pattern='[0-9]{10}' maxlength='10'></td></tr>
					          <tr><td>Correo electrónico</td> <td>" . $fila_user['correo']                                                  . "  </td></tr>
					          <tr><td>Nombre de usuario </td> <td>" . $fila_user['username']                                                . "  </td></tr>
					          <tr><td>RFC               </td> <td><input type='text' name='new_RFC'  value='" . $fila_user['RFC'] . "'></td></tr>
					          <tr><td>Contraseña</td><td><input id='contrasena' type='password' name='new_contrasena' value='" . $fila_user['password'] . "'></td></tr>
					          <tr><td>Repetir contraseña</td><td><input id='contrasena2' type='password' name='new_contrasena2' onclick='color(this)' value='" . $fila_user['password'] . "'></td></tr>
					          <tr><td><input type='checkbox' onclick='showPass()'>&nbsp Mostrar<br>contraseña</td> 
					          	  <td><button class='btn btn-success' type='submit' name='modificado' value='". $id_usuario ."'>Modificar</button></td>
					          </tr>
					        </form>
				          </table>
				        </div><br><br>";			 
			//--------------------------------------------Datos métodos de pago------------------------------------------------
				$result= mysqli_query($conexion,"SELECT * FROM metodospago WHERE id_usuario='$id_usuario'"); 
				echo '<button class="btn btn-dark"  onclick="dropMenu(`metodosP`)">Administrar métodos de pago</button>
					  <div id="metodosP" class="dropMenu" style="display:none;">
						<table class="tabla_admin"><tr><th>Titular</th><th>Número de tarjeta</th><th>Expira</th><th></th></tr>';

				if (mysqli_num_rows($result) > 0)
					while($fila = mysqli_fetch_assoc($result))
						echo '<tr><td> ' . $fila['titular'] . '</td><td> **** **** **** ' . substr($fila['numero_tarjeta'], -4) . '</td><td>' . $fila['fecha_vencimiento'] . '</td><td> <a href="" style="color:rgb(200,100,100);">Eliminar<a></td></tr> ';
				else{
					echo '<tr><td>Aún no registra ningún método de pago</td><td></td><td></td></tr>';
				}
				echo '</table></div><br><br>';
			//-------------------------------------------Historial de pedidos------------------------------------------------------
				echo "<button class='btn btn-dark' style='width: 100%' onclick='dropMenu(`historial`)'>Historial de pedidos</button>
						<div id='historial' class='dropMenu' style='display:none;'>
							<table class='tabla_admin'>
								<tr><th>ID</th> <th>Método de Pago</th> <th>Dirección</th> <th>Destinatario</th> <th>Teléfono</th> <th>Fecha</th> <th></th></tr>";
					$consulta= "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' ORDER BY id_pedido DESC"; 
					$result= mysqli_query($conexion,$consulta); 
					while($row = mysqli_fetch_array($result)){
						$metodo = mysqli_fetch_array(mysqli_query($conexion,"SELECT numero_tarjeta FROM metodospago WHERE id_metodoP = '" . $row['id_metodoP']. "'"));
						$direccion = mysqli_fetch_array(mysqli_query($conexion,"SELECT * FROM direcciones WHERE id_direccion = '" . $row['id_direccion']. "'"));
						echo "<tr> 
								<td>". $row['id_pedido'] ."</td> 
								<td> Tarjeta con terminación <b> ". substr($metodo[0],-4) ."</b>.</td> 
								<td>".$direccion['calle']." #".$direccion['numero']."<br>".$direccion['colonia']."<br>".$direccion['ciudad'].", ".$direccion['estado']."<br>".$direccion['cp']."</td> 
								<td>". $row['destinatario'] ."</td> 
								<td>". $row['telefono'] ."</td> 
								<td>". $row['fecha'] ."</td> 
								<td> <form method='post' action=''><button class='btn btn-secondary' type='submit' name='IDdetalle' value='". $row['id_pedido'] ."'>Detalles</button></form></td>
							</tr>";
					}
				echo		"</table>
						</div><br><br>";
				//----------Detalle del pedido-------------
					if (isset($_POST['IDdetalle'])){
						$id_pedido = $_POST['IDdetalle'];
						$detalle = mysqli_query($conexion,"SELECT * FROM detalle WHERE id_pedido = '$id_pedido'");
						echo "
							  <div class='dropMenu'>
							  <h4 align='center'>Detalle del pedido ID: $id_pedido</h4>
							  	 <table class='tabla_admin'>
							  	 	<tr> <th>Producto</th> <th>Precio unitario</th> <th>Cantidad</th> <th>Subtotal</th>  </tr>";
							  	 	while($row = mysqli_fetch_array($detalle)){
							  	 		$producto = mysqli_fetch_array(mysqli_query($conexion,"SELECT * from productos WHERE id_producto = '".$row['id_producto']."'"));
							  	 		echo "<tr> <td><img src='Images/Productos/".$producto['imagen']. ".jpg' class='imagenForm' style='width:5vw'>".$producto['nombre_producto']."</td> 
							  	 				   <td>".$producto['precio']."</td> 
							  	 				   <td>".$row['cantidad']."</td> 
							  	 				   <td>".$row['subtotal']."</td> 
							  	 			  </tr>";
							  	 	}
						echo	"</table></div><br>";
					}

			//------------------------------------------Administrar domicilios---------------------------------------------
				$result=mysqli_query($conexion,"SELECT * FROM direcciones WHERE id_usuario='$id_usuario'");
				echo "<button class='btn btn-dark' style='width: 100%' onclick='dropMenu(`domicilios`)'>Administrar domicilios</button>
				      <div id='domicilios' class='dropMenu' style='display:none;'>
				      	<table class='tabla_admin'>
				      		<tr> <th>ID</th> <th>Ciudad</th> <th>Colonia</th> <th>Calle</th> <th>Número</th> <th>CP</th> <th></th> </tr>";
				      		$result = mysqli_query($conexion,"SELECT * FROM direcciones WHERE id_usuario = '$id_usuario'");
				      		while($row = mysqli_fetch_array($result)){
			      			echo "<tr>
		      					<td>".$row['id_direccion']."</td> 
		      					<td>".$row['ciudad'].", ".$row['estado']."</td> 
		      					<td>".$row['colonia']."</td> <td>".$row['calle']."</td> 
		      					<td>".$row['numero']."</td> <td>".$row['cp']."</td> 
		      					<td> <form method='post' style='float:left;'><button onclick='dropMenu(`domicilios`)' class='btn btn-secondary' type='submit' name= 'id_domicilio_mod' value='". $row['id_direccion'] ."'>Editar</button></form>
		      						<form method='post' style='display:flex;' onsubmit='return confirmDelete()'><button class='btn btn-danger' type='submit' name= 'id_domicilio_delete' value='". $row['id_direccion'] . "'>Borrar</button></form></td>
			      				 </tr>";
			      		}

				echo   "</table></div><br><br>";
			//--------------------------------------------Administrar sitio------------------------------------------------	
				if ($rol == 1){
					echo '<a href="admin.php"><button class="btn btn-warning" style="width:70%;">Administrar sitio</button></a><br><br>';
			}	   
			//--------------------------------------------Cerrar sesión------------------------------------------------	
				echo ' <form action="" method="POST">
					<input style="width: 70%;font-size:1rem" type="submit" value="Cerrar sesión" name="logout" class="btn btn-danger">
				</form>	' ;

			?>

		</div>

	<!-- ------------------------------------ Footer ------------------------------------ -->
	<?php include 'footer.html';?>
	<!-- -------------------------------------------------------------------------------- -->
</body>
</html>

