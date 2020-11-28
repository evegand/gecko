<?php 		//Inicio de variables de sesión
	if (!isset($_SESSION)) {
	  session_start();
	}

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
	<!--Script de validación de formulario-->
	<script type="text/javascript">
		function validateForm() {
		  var x = document.forms["registerForm"];
		  if (x['contrasena_registro'].value != x['contrasena_conf'].value) {
		    alert("Las constraseñas no coinciden");
		    document.getElementById("contrasena2").style.backgroundColor = 'rgb(255,180,180)';
		    //document.getElementById("contenido").innerHTML += "<label style='color:red'>Las contraseñas no coindicen</label>";
		    return false;
		  }
		  else if (x['nombres_registro'].value.trim() == "" || x['nombres_registro'].value == null ||  x['nombres_registro'].value.length < 3){
		  	alert("El nombre es demasiado corto (mínimo 3 caractéres)");
		    document.getElementById("nombre").style.backgroundColor = 'rgb(255,180,180)';
		    return false;
		  }
		  else if (x['usuario_registro'].value.trim() == "" || x['usuario_registro'].value == null ||  x['usuario_registro'].value.length < 4){
		  	alert("El usuario es demasiado corto (mínimo 4 caractéres)");
		    document.getElementById("username").style.backgroundColor = 'rgb(255,180,180)';
		    return false;
		  }
		  else if (x['contrasena_registro'].value.trim() == "" || x['contrasena_registro'].value == null ||  x['contrasena_registro'].value.length < 4){
		  	alert("La contraseña es demasiado corta (mínimo 4 caractéres)");
		    document.getElementById("contrasena").style.backgroundColor = 'rgb(255,180,180)';
		    return false;
		  }
		  else{
		  	return true;
		  }
		}
	  	function color(element){
	  		element.style.backgroundColor = "";
	  	}
	  	function setValues(nombre,apellido,correo,telefono,usuario,contrasena,contrasena2){
	  		document.getElementsByName("nombres_registro")[0].value = nombre;
	  		document.getElementsByName("apellidos_registro")[0].value = apellido;
	  		document.getElementsByName("correo_registro")[0].value = correo;
	  		document.getElementsByName("telefono_registro")[0].value = telefono;
	  		document.getElementsByName("usuario_registro")[0].value = usuario;
	  		document.getElementsByName("contrasena_registro")[0].value = contrasena;
	  		document.getElementsByName("contrasena_conf")[0].value = contrasena2;
	  	}
	  	function showPass() {
		  var x = document.getElementById("contrasena");
		  var y = document.getElementById("contrasena2");
		  if (x.type === "password") {
		    x.type = "text";
		  } else {
		    x.type = "password";
		  }
		  if (y.type === "password") {
		    y.type = "text";
		  } else {
		    y.type = "password";
		  }
		}
	</script>

	<!------------------------------------- Barra de navegación ------------------------------------------------------>
	<?php include 'menu.php'; ?>
	<!---------------------------------------------------------------------------------------------------------------->

	<!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
		<div style="height: 64px"></div>
		<h1>Registro</h1>
		<div class="contenido" id="contenido" style="text-align: center; margin:auto;">
				<form name="registerForm" method="post" onsubmit="return validateForm()">
					<table class="formulario">
					<tr><td>Nombres: </td><td><input type="text" name="nombres_registro" class="form-control" placeholder="Nombres*" required maxlength="20" id="nombre" onclick="color(this)"></td><td></td></tr>
					<tr><td>Apellidos: </td><td><input type="text" name="apellidos_registro" class="form-control" placeholder="Apellidos" maxlength="45"></td></tr>
					<tr><td>Correo: </td><td><input type="email" name="correo_registro" class="form-control" placeholder="Correo electrónico*" required="" maxlength="50"></td></tr>
					<tr><td>Teléfono: </td><td><input type="tel" name="telefono_registro" class="form-control" placeholder="10 dígitos*" required="" pattern="[0-9]{10}" maxlength="10"></td></tr>
					<tr><td>Usuario: </td><td><input type="text" name="usuario_registro" class="form-control" placeholder="Usuario*" required="" id="username" onclick="color(this)" maxlength="20"></td></tr>
					<tr><td>Contraseña: </td><td><input type="password" name="contrasena_registro" class="form-control" placeholder="Contraseña*" required="" maxlength="45" id="contrasena"></td></tr>
					<tr><td>Repetir<br> constraseña: &nbsp</td><td><input type="password" name="contrasena_conf" class="form-control" placeholder="Repetir Contraseña*" required=""  onclick="color(this)" id="contrasena2" maxlength="45"></td></tr>
					<tr><td><h6><input type="checkbox" onclick="showPass()">&nbsp Mostrar<br>contraseña</h6></td><td><button type="submit" class="btn btn-dark" name="submit">Crear cuenta</button></td></tr>
					</table>
				</form>
				<p style='color:rgb(177,210,43)'>¿Ya estás registrado?<br> <a href="iniciar_sesion.php">Iniciar Sesión</a></p><br>


<?php
	//Proceso de conexion con la base de datos----------------------------------------
	$conexion = mysqli_connect("localhost", "root", "", "geckodatabase");

	if (mysqli_connect_errno()){
	    echo "No se pudo conectar : " . mysqli_connect_error();
	    exit;
	}
	//--------------------------------------------------------------------------------


	//Registro------------------------------------------------------------------------
	if (isset($_POST['nombres_registro']) && isset($_POST['submit'])){
		$nombre = $_POST['nombres_registro'];
		$apellidos = $_POST['apellidos_registro'];
		$usuario = $_POST['usuario_registro'];
		$contrasena = $_POST['contrasena_registro'];
		$contrasena2 = $_POST['contrasena_conf'];
		$telefono = $_POST['telefono_registro'];
		$correo = $_POST['correo_registro'];

		$consulta= "SELECT * FROM usuarios WHERE username='$usuario'"; 
		$resultado= mysqli_query($conexion,$consulta) ;
		$fila=mysqli_fetch_array($resultado);

		if (is_numeric($telefono)){
			if (!$fila){
				$insertar = "INSERT INTO usuarios VALUES (NULL,'$usuario','$contrasena', '2' ,'$telefono','$correo', '$apellidos', '$nombre')";
				$resultado= mysqli_query($conexion,$insertar) ;
				if (!$resultado)
					echo '<label styl>Error al registrar usuario</label>';
				else{
				echo "<script>document.getElementsByName('registerForm')[0].innerHTML+= `<p style='color:rgb(20,255,20)'>Usuario '" . $usuario  . "' registrado exitosamente.</p>`" . ';setValues("' . $nombre . '","' . $apellidos . '","' . $correo . '","' . $telefono . '","' . $usuario .'","' . $contrasena . '","' . $contrasena2 .'")</script>"';
			}}
			else{
				//echo "<label style='color:red'>El nombre de usuario no está disponible</label>";
				echo "<script>document.getElementsByName('registerForm')[0].innerHTML+= `<p style='color:red'>El nombre de usuario no está disponible</p>`</script>";
				echo '<script>document.getElementById("username").style.backgroundColor ="rgb(255,180,180)"; setValues("' . $nombre . '","' . $apellidos . '","' . $correo . '","' . $telefono . '","' . $usuario .'","' . $contrasena . '","' . $contrasena2 .'")</script>';}

		}
	}
?>

		</div>

</body>

</html>