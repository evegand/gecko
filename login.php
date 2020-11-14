<?php
	session_start(); // Iniciando sesion
	$error=''; // Variable para almacenar el mensaje de error
	if (isset($_POST['submit'])) {
		if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
			$error = "Usuario o contrasena no validos";
			}
		else
			{
			$usuario=$_POST['usuario'];
			$contrasena=$_POST['contrasena'];
			// Estableciendo la conexion a la base de datos
			include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
			include("config/conexion.php");//Contiene de conexion a la base de datos
			 
			// Para proteger de Inyecciones SQL 
			$usuario    = mysqli_real_escape_string($conexion,(strip_tags($usuario,ENT_QUOTES)));
			//$contrasena =  sha1($contrasena);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php
			$consulta = "SELECT username, id_rol FROM usuarios WHERE username = '" . $usuario . "' and password='". $contrasena."';";
			$resultado=mysqli_query($conexion,$consulta);
			$numeroDeFilas=mysqli_num_rows($resultado);
			$fila = mysqli_fetch_array($resultado);
			if ($numeroDeFilas==1){
					$_SESSION['login_user_sys']=$usuario; // Iniciando la sesion
					$_SESSION['id']=$fila['id_rol'];
					header("location: micuenta.php"); // Redireccionando a la pagina profile.php	
			} 
			else {
			$error = "El usuario o la contraseña es inválida.";	
			}
		}
	}
?>