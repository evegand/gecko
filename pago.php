<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

if(!isset($_SESSION))
	session_start(); 

//----Si no hay sesión iniciada, redirige a iniciar sesión-------
if(!isset($_SESSION['login_user_sys']))
	header("location: iniciar_sesion.php");
else{
	$username = $_SESSION['login_user_sys'];
	$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
	$result= mysqli_query($conexion,$consulta); 
	if  (!$result)
	      echo "Error en la consulta : " . mysqli_error($conexion);
	$fila_user = mysqli_fetch_array($result);
	$id_usuario = $fila_user['id_usuario'];
}



//----Crea el pedido------
if (isset($_POST['hacerPedido'])){
	$id_direccion = $_POST['id_domicilio'];
	$id_metodoP = $_POST['id_metodoP'];
	$telefono_destinatario = $_POST['telefono_destinatario'];
	if (isset($_POST['nombre_destinatario']))
	$nombre_destinatario = $_POST['nombre_destinatario'];
	$consulta_pedido = "INSERT INTO pedidos VALUES (null, '$id_usuario', '$id_metodoP','Proceso',CURRENT_TIMESTAMP(), '$id_direccion','$nombre_destinatario','$telefono_destinatario')";
	$resultado_pedido = mysqli_query($conexion,$consulta_pedido);
	if (!$resultado_pedido)
		echo "Error al crear el producto";
	else{
		echo "<script>localStorage.removeItem('productsInCart')</script>";
	}
	$idAgregado = mysqli_insert_id($conexion); //Obtiene el id del pedido recién creado para asignarlo a los registros de detalle
	$JSONpedido = json_decode($_POST['JSONpedido'],true);
	foreach ($JSONpedido as $detalle) {
		//echo implode(",", $detalle);
		$consulta_detalle = "INSERT INTO detalle VALUES(null,'".$detalle['cantidad']."','$idAgregado','". $detalle['id']. "','". $detalle['detalle'] ."',null)";
		$resultado_detalle = mysqli_query($conexion,$consulta_detalle);
		echo mysqli_error($conexion);
	}
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
	<link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
	<link href="CSS/productos.css" rel="stylesheet">                            <!--Estilos productos---->
	<link href="CSS/dropdowns.css" rel="stylesheet">              
	<!--------------Javascript (scripts)------------------------->
	<script type="text/javascript" src="JS/nav.js"></script>
	<script type="text/javascript" src="JS/carrito.js"></script>
	<script type="text/javascript" src="JS/forms.js"></script>
	<!--Icon-->
	<link rel="icon" href="Images/BlackGecko.png">

</head>
<body>
	<script type="text/javascript">
		let productosEnCarrito = localStorage.getItem('productsInCart');
		if (!productosEnCarrito || productosEnCarrito[1] == '}' || productosEnCarrito==null)
			window.location.href='carrito.php';
	</script>
	<!------------------------------------- Barra de navegación --------------------------------------------------------->
	<?php include 'menu.php'; ?>
	<!------------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
	<div style="height: 64px"></div>
	
	<?php 
		$username = $_SESSION['login_user_sys'];
		$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
		$result= mysqli_query($conexion,$consulta); 
		if  (!$result)
		      echo "Error en la consulta : " . mysqli_error($conexion);
		$fila_user = mysqli_fetch_array($result);
		$id_usuario = $fila_user['id_usuario'];

	?>
	<h1>Completar pedido</h1>
	<div class="contenido" style="margin: auto">
		<h2 style="color:white;text-align: center;">Seleccionar dirección de envío</h2>
		<form method='post' id='formPedido' onsubmit='return confirmModify()'>
			<script> 
				document.getElementById('formPedido').innerHTML += `<input type="hidden" name="JSONpedido" value='${localStorage.getItem("productsInCart")}''>`		
			</script>
		<?php
			$result=mysqli_query($conexion,"SELECT * FROM direcciones WHERE id_usuario='$id_usuario'");
			echo "<div id='domicilios' class='dropMenu'><table class='tabla_admin'><tr> <th>ID</th> <th>Ciudad</th> <th>Colonia</th> <th>Calle</th> <th>Número</th> <th>CP</th> <th></th> </tr>";
			if (mysqli_num_rows($result) > 0){	
				while($row = mysqli_fetch_array($result)){
	      			echo "<tr>
		  					<td>".$row['id_direccion']."</td> 
		  					<td>".$row['ciudad'].", ".$row['estado']."</td> 
		  					<td>".$row['colonia']."</td> <td>".$row['calle']."</td> 
		  					<td>".$row['numero']."</td> <td>".$row['cp']."</td> 
		  					<td> <input type='radio' name= 'id_domicilio' value='". $row['id_direccion'] ."' required> Seleccionar</td>
	      				 </tr>";
	      		}
	      	}
				echo   "</table></div><br><br>";
		?>



		<h2 style="color:white;text-align: center;">Seleccionar método de pago</h2>
		<?php
			$result= mysqli_query($conexion,"SELECT * FROM metodospago WHERE id_usuario='$id_usuario'");
			echo '<div id="metodosP" class="dropMenu"><table class="tabla_admin"><tr><th>Titular</th><th>Número de tarjeta</th><th>Expira</th><th></th></tr>';	
			if (mysqli_num_rows($result) > 0){
				while($fila = mysqli_fetch_assoc($result))
					echo "<tr>
							<td>" . $fila['titular'] . "</td>
							<td>**** **** **** " . substr($fila['numero_tarjeta'], -4) . "</td>
							<td>" . $fila['fecha_vencimiento'] . "</td>
							<td><input type='radio' class='btn btn-secondary' type='submit' name= 'id_metodoP' value='". $fila['id_metodoP'] ."' required> Seleccionar</td>
						 </tr> ";}
			else
				echo '<tr><td>Aún no registra ningún método de pago</td><td></td><td></td></tr>';
			echo '</table></div><br><br>'; 
			?>

		<h2 style="color:white;text-align: center;">Destinatario</h2>
		<div id="destinatario" class="dropMenu">
		<table class="tabla_admin">
			<tr>
				<td>Nombre (Opcional)</td>
				<td><input type="text" name="nombre_destinatario" placeholder="Nombres" maxlength="20"></td>
			</tr>
			<tr>
				<td>Teléfono*</td>
				<td><input type="tel" name="telefono_destinatario" placeholder="10 dígitos*" required="" pattern="[0-9]{10}" maxlength="10"></td>
			</tr>
		</table>
		</div>

		<br>
		<div style="text-align:center"><button name='hacerPedido' class="btn btn-primary" type="submit">Continuar</button></div>
	</form>
	</div>
</body>
</html>