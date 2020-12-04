<?php
include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
include("config/conexion.php");//Contiene de conexion a la base de datos

if(!isset($_SESSION)) 
    session_start(); 

//Estos bloques de código definen el header después de ejecutarse, por eso se colocan al principio-----------

//-----------Si no es admin redirige a la página principal-------
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1)
	header("location:index.php");

//-----------Modifica usuario y recarga la página----------------
if (isset($_POST['modificado'])){
  $user_modify= $_POST['modificado'];
  $new_nombres = $_POST['new_nombres'];
  $new_apellidos = $_POST['new_apellidos'];
  $new_telefono = $_POST['new_telefono'];
  $new_correo = $_POST['new_correo'];
  $new_rol = $_POST['new_rol'];
  $new_contrasena = $_POST['new_contrasena'];

  $consulta_modificar = "UPDATE usuarios SET nombre='" .$new_nombres. "', apellido='" .$new_apellidos. "', telefono='" .$new_telefono. "', correo='" .$new_correo. "', id_rol='" . $new_rol. "' WHERE username='" . $user_modify . "'";
  $result_modificar = mysqli_query($conexion,$consulta_modificar);
  if (!$result_modificar)
    echo 'Error: no se pudo modificar el usuario';
  else
    header("location:admin.php");  
}
//------------Elimina usuario y recarga la página----------------
if (isset($_POST['id_user_delete'])){
   $id_user_delete = $_POST['id_user_delete'];  
   $consulta_eliminar = "DELETE from usuarios WHERE id_usuario=" .$id_user_delete;
   $result_eliminar = mysqli_query($conexion,$consulta_eliminar);
   if(!$result_eliminar)
      echo 'Error: no se pudo eliminar el usuario' . mysqli_error($conexion);
   else
      header("location:admin.php");}

//-----------Modifica producto y recarga la página---------------
if (isset($_POST['productoModificado'])){
  $prod_modify= $_POST['productoModificado'];
  $new_nombreP = $_POST['new_nombreP'];
  $new_descripcion = $_POST['new_descripcion'];
  $new_precio = $_POST['new_precio'];
  $new_cat = $_POST['new_catP'];
  $imagen = $_FILES['fileToUpload']['tmp_name'];

  //unlink("Images/Productos/" . $prod_modify . ".jpg");
  move_uploaded_file($imagen, "Images/Productos/" . $prod_modify . ".jpg");

  $consulta_modificar = "UPDATE productos SET nombre_producto='" .$new_nombreP. "', descripcion='" .$new_descripcion. "', precio='" .$new_precio. "', id_categoriaf = '$new_cat' WHERE id_producto='" . $prod_modify . "'";
  $result_modificar = mysqli_query($conexion,$consulta_modificar);
  if (!$result_modificar)
    echo 'Error: no se pudo modificar el producto';
  else
    header("location:admin.php");  
}

//------------Elimina producto y recarga la página----------------
if (isset($_POST['id_product_delete'])){
   $id_product_delete = $_POST['id_product_delete'];  
   $consulta_eliminar = "DELETE from productos WHERE id_producto=" .$id_product_delete;
   $result_eliminar = mysqli_query($conexion,$consulta_eliminar);
   if(!$result_eliminar)
      echo 'Error: no se pudo eliminar el producto' . mysqli_error($conexion);
   else
      header("location:admin.php");}

//-----------Agrega producto y recarga la página---------------
if (isset($_POST['productoAgregado'])){
  $add_prod= $_POST['productoAgregado'];
  $new_nombreP = $_POST['new_nombreP'];
  $new_descripcion = $_POST['new_descripcion'];
  $new_precio = $_POST['new_precio'];
  $new_cat = $_POST['new_catP'];
  $imagen = $_FILES['fileToUpload']['tmp_name'];
  $new_stock = $_POST['new_stock'];

  $consulta_agregar = "INSERT INTO productos (id_producto, nombre_producto, descripcion, precio, imagen, id_dptof, id_categoriaf) VALUES (null,'" .$new_nombreP. "','" .$new_descripcion. "','" .$new_precio. "','" . null . "','1', '$new_cat')";
  $result_agregar = mysqli_query($conexion,$consulta_agregar);
  $idAgregado = mysqli_insert_id($conexion);
  move_uploaded_file($imagen, "Images/Productos/" . $idAgregado . ".jpg");
  $consulta_imagen = "UPDATE productos SET imagen='$idAgregado' WHERE id_producto = '$idAgregado'";
  $result_imagen = mysqli_query($conexion,$consulta_imagen);

  if ($new_cat == 1 || $new_cat == 3){
  	$result_stock1 = mysqli_query($conexion,"INSERT INTO existencias VALUES (null,'$idAgregado','$new_stock','CH')");
  	$new_stock = $_POST['new_stockM'];
  	$result_stock2 = mysqli_query($conexion,"INSERT INTO existencias VALUES (null,'$idAgregado','$new_stock','M')");
  	$new_stock = $_POST['new_stockG'];
  	$result_stock3 = mysqli_query($conexion,"INSERT INTO existencias VALUES (null,'$idAgregado','$new_stock','G')");
  }
  else{
  	$result_stock1 = mysqli_query($conexion,"INSERT INTO existencias VALUES (null,'$idAgregado','$new_stock','')");
  }

  if(!$result_stock1)
  	echo 'Error: no se pudo crear el stock';

  if (!$result_imagen)
    echo 'Error: no se encontró la imagen';

  if (!$result_agregar)
    echo 'Error: no se pudo agregar el producto';
  else
    header("location:admin.php");  
}

//---------------------Actualiza stock------------------------
if (isset($_POST['stockModificado0']) || isset($_POST['stockModificado1']) || isset($_POST['stockModificado2'])){
	for ($i = 0; $i < 3; $i++) {
		if (isset($_POST['stockModificado'.$i])){
			$id_stock_mod=$_POST['stockModificado'.$i];
			break;
		}
	}
	$consulta_act_stock = "UPDATE existencias set existencia='".$_POST['new_stock'.$i]."' WHERE id_existencia = '$id_stock_mod'";
	$result_mod_stock = mysqli_query($conexion,$consulta_act_stock);
	if (!$result_mod_stock)
		echo 'Error: no se pudo actualizar el stock';

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
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/geckonavbar_style.css" rel="stylesheet">
    <!--<link href="CSS/estilos.css" rel="stylesheet">-->    <!--Estilos footer-->
    <link href="CSS/productos.css" rel="stylesheet">
    <link href="CSS/dropdowns.css" rel="stylesheet">
    <link href="CSS/admin.css" rel="stylesheet">
    <link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet">
    <!----------------Javascript (scripts)----------------------->
   	<script type="text/javascript" src="JS/nav.js"></script>
   	<script type="text/javascript" src="JS/micuenta.js"></script>
   	<script type="text/javascript" src="JS/forms.js"></script>
</head>
<body>
	<!------------------------------------- Barra de navegación ------------------------------------------------------>
	<?php include 'menu.php'; ?>
	<link href="CSS/dropdowns.css" rel="stylesheet">

	<!------------------------------------------Contenido------------------------------------------------------------->
	<div style="height: 64px"></div>
	<h1>Administrar sitio</h1>
	<div style="text-align: center;color: white;width: 80vw;margin:auto;"><br><br><br><br>

		<?php
			$username = $_SESSION['login_user_sys'];
			$consulta= "SELECT * FROM usuarios WHERE username='" . $username . "'";
			$result= mysqli_query($conexion,$consulta); 
			$fila_user = mysqli_fetch_array($result);
			$rol = $fila_user['id_rol'];
			//-------------Administrar usuarios-------------------------
			if ($rol == 1){
			  	echo "<button class='btn btn-dark' onclick='dropMenu(`adminUsuarios`)'>Administrar usuarios</button><br>
			  	<div id='adminUsuarios' class='dropMenu' style='display:none;'>
			       	 <table class='tabla_admin' width='80vw'><tr>
			            <th>ID</th>
			            <th>Nombres</th>
			            <th>Apellidos</th>
			            <th>Telefono</th>
			            <th>Correo</th>
			            <th>Usuario</th>
			            <th>Rol</th>
			            <th></th>
			            </tr>";

				$consulta= "SELECT * FROM usuarios LIMIT 20 OFFSET 1"; 
				$result= mysqli_query($conexion,$consulta); 
			  	while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
			      	echo "<tr><td>" . $row['id_usuario'] . "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido'] . "</td><td>" . $row['telefono'] . "</td><td>" . $row['correo'] . "</td><td>" . $row['username'] . "</td><td>" . $row['id_rol'] . "</td><td><form method='post' class='modBtn'><button onclick='dropMenu(`adminUsuarios`)' class='btn btn-secondary' type='submit' name= 'id_user_modify' value='". $row['id_usuario'] ."'>Modificar</button></form>";
			      	if($row['id_rol'] != 1)
			      		echo " <form method='post' style='display:flex;' onsubmit='return confirmDelete()'><button class='btn btn-danger' type='submit' name= 'id_user_delete' value='". $row['id_usuario'] . "'>Eliminar</button>";
			      	echo '</form></td></tr>';
			      }
			  	echo "</table></div><br>";
			}

			//-------------Modificar usuario----------------------------
		  	if (isset($_POST['id_user_modify'])){
			    $id_user_modify = $_POST['id_user_modify'];
			    $consulta= "SELECT * FROM usuarios WHERE id_usuario=" . $id_user_modify . ""; 
			    $result= mysqli_query($conexion,$consulta); 
			    if ($result){
				    $fila = mysqli_fetch_array($result);
				    echo "<div id='metodosP' class='dropMenu'>
				    	  <h4 align='center'>Modificar datos de usuario " . $fila['username'] . "</h4>
				          <table class='tabla_admin'><form method='post' action=''>
					          <tr><td>ID de usuario</td><td>" . $fila['id_usuario'] . "</td></tr>
					          <tr><td>Nombres</td><td><input type='text' name='new_nombres' value='" . $fila['nombre'] . "'></td></tr>
					          <tr><td>Apellidos</td><td><input type='text' name='new_apellidos' value='" . $fila['apellido'] . "'></td></tr>
					          <tr><td>Teléfono</td><td><input type='text' name='new_telefono' value='" . $fila['telefono'] . "'></td></tr>
					          <tr><td>Correo electrónico</td><td><input type='text' name='new_correo' value='" . $fila['correo'] . "'></td></tr>
					          <tr><td>Rol</td><td><input type='number' min='0' max='2' step='1' name='new_rol' value='" . $fila['id_rol'] . "'></td></tr>
					          <tr><td>Contraseña</td><td><input type='password' name='new_contrasena' value='" . $fila['password'] . "'></td></tr>
					          <tr><td>    </td><td><button class='btn btn-success' type='submit' name= 'modificado' value='". $fila['username'] ."'>Enviar</button></form></td></tr>
				          </table></div><br>"  ;
				}
			}

			//-------------Administrar productos-------------------------
			if ($rol == 1){
				echo "<button class='btn btn-dark' onclick='dropMenu(`adminProd`)'>Administrar productos</button><br>
				<div id='adminProd' class='dropMenu' style='display:none;'>
					<table class='tabla_admin' width='80vw'>
						<tr>
							<td>Agregar Productos</td>
							<td><form method='post' action=''><button onclick='dropMenu(`adminProd`)' class='btn btn-primary' type='submit' name= 'id_new_prod' value='1'	>+ Agregar Nuevo Producto</button></form></td>							
						</tr>
						<tr>
							<td>Buscar producto</td>
							<td>
								Id del producto: &nbsp 
								<form method='post' action=''>
									<input type='number' value='' placeholder='id' min='1' name='searchProduct'>
									<button class='btn btn-success' type='submit' >Buscar</button>
								</form>
							</td>
							<td></td>
						</tr>	
					</table>";
				//-----Se muestra el resultado de la búsqueda-----------------
				if (isset($_POST['searchProduct'])){
					echo "<script>dropMenu(`adminProd`)</script>";
					$id_prod_modify = $_POST['searchProduct'];
					$consultaProd= "SELECT * FROM productos WHERE id_producto='" . $id_prod_modify . "'"; 
					$resultProd= mysqli_query($conexion,$consultaProd); 
					if (mysqli_num_rows($resultProd)!=0){
			    		$fila = mysqli_fetch_array($resultProd);
			    		//-------Se obtiene la categoría a la que pertenece el producto---------
			    		$consultaCat= "SELECT * FROM categorias WHERE id_categoria='" . $fila['id_categoriaf'] . "'"; 
						$resultCat= mysqli_query($conexion,$consultaCat); 
						if ($resultCat){
							$filaCategoria = mysqli_fetch_array($resultCat);
							$categoria = $filaCategoria['nombre_categoria'];
						}
						echo "<table class='tabla_admin' width='80vw'><tr style='color:lightseagreen'><td>Resultado de la búsqueda: </td></tr></table>
							<table class='tabla_admin' width='80vw'>
								<tr><th>ID</th><th>Categoría</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th></th></tr>
								<tr>
									<td style='width:2vw'>" . $fila['id_producto'] . "</td>
									<td>" . $fila['id_categoriaf'] . ": " . $categoria . "</td>
									<td>" . $fila['nombre_producto'] . "</td>
									<td>" . $fila['descripcion'] . "</td>
									<td>$" . $fila['precio'] . "</td>
									<td>
										<form method='post' class='modBtn'>
											<button onclick='dropMenu(`adminProd`)' class='btn btn-secondary' type='submit' name= 'id_prod_modify' value='". $fila['id_producto'] ."'>Modificar</button>
											<button onclick='dropMenu(`adminProd`)' class='btn btn-info'      type='submit' name='id_prod_stock'   value='". $fila['id_producto'] ."'>Stock</button>
										</form> 
										<form method='post' style='display:flex;' onsubmit='return confirmDelete()'>
											<button class='btn btn-danger' type='submit' name= 'id_product_delete' value='". $fila['id_producto'] . "'>Eliminar</button>
										</form>
									</td>
								</tr>
							</table>";
					}
					else
						echo "<table class='tabla_admin' width='80vw'><tr style='color:lightcoral'><td>No se encontró el producto.</td></tr></table>";
				}
				echo '</div><br>';
			}

			//-----------Agregar producto---------------------------------
			if (isset($_POST['id_new_prod'])){
				$resultCats= mysqli_query($conexion,"SELECT * FROM categorias");
				$id_new_prod = $_POST['id_new_prod'];
				echo "<div id='AddProd' class='dropMenu'>
				    	  <h4 align='center'>Agregar nuevo producto</h4>
				    	  <form method='post' enctype='multipart/form-data'>	
				          <table class='tabla_admin'>			          	 
					          <tr><td>Nombre     </td> <td><input type='text' name='new_nombreP'     value='' placeholder='Nombre del producto' required></td></tr>
					          <tr><td>Descripción</td> <td><textarea style='resize: none;' rows='3' maxlength='200' name='new_descripcion' placeholder='Max. 200 caracteres' required></textarea>    </td></tr>
					          <tr><td>Precio     </td> <td><input type='number' min='0' step='1' name='new_precio'      value='' placeholder='Pesos $' required>         </td></tr>
					          <tr><td>Categoría  </td> <td><select name='new_catP' placeholder='Seleccionar' onchange='dynamicStockForm(this)' required>
					          									<option value='' selected disabled hidden>Seleccionar</option>";
													            while($fila_cats = mysqli_fetch_array($resultCats))
													            	echo "<option value='". $fila_cats['id_categoria'] ."'>" . $fila_cats['nombre_categoria'] ."</option>";	
				echo	     "							   </select></td></tr>
							  <tr><td>Stock      </td><td id='selectStock'><input type='number' min='0' step='1' name='new_stock' style='width:8.6rem;text-align:center;'> Unidades</td></tr>
							  <tr><td>Imagen     </td><td><input type='file' name='fileToUpload' id='fileToUpload' accept='image/x-png,image/gif,image/jpeg'> </td></tr>
					          <tr><td>           </td> <td><button class='btn btn-success' type='submit' name='productoAgregado'>Enviar</button></td></tr>
				          </table></form></div><br>";
			}

			//-------------Modificar producto----------------------------
			if (isset($_POST['id_prod_modify'])){
				$id_prod_modify = $_POST['id_prod_modify'];
				$resultCats= mysqli_query($conexion,"SELECT * FROM categorias");				
			    $consulta= "SELECT * FROM productos WHERE id_producto='$id_prod_modify'"; 
			    $result= mysqli_query($conexion,$consulta); 
			    $fila = mysqli_fetch_array($result);
			    if ($fila){
			    	echo "<div id='modProd' class='dropMenu'>
				    	  <h4 align='center'>Modificar producto: " . $fila['nombre_producto'] . "</h4>
				          <table class='tabla_admin'><form method='post'  enctype='multipart/form-data'>
				          	  <tr><td>ID Producto</td> <td>" . $fila['id_producto'] . "</td></tr>
					          <tr><td>Nombre     </td> <td><input type='text' name='new_nombreP'     value='" . $fila['nombre_producto'] . "'></td></tr>
					          <tr><td>Descripción</td> <td><textarea style='resize: none;' rows='3' maxlength='200' name='new_descripcion'>" . $fila['descripcion'] ."</textarea>    </td></tr>
					          <tr><td>Precio     </td> <td><input type='number' min='0' name='new_precio'      value='" . $fila['precio'] . "'>         </td></tr>
					          <tr><td>Categoría  </td> <td><select name='new_catP' placeholder='Seleccionar'>";
													            while($fila_cats = mysqli_fetch_array($resultCats))
													            	echo "<option value='". $fila_cats['id_categoria'] ."'>" . $fila_cats['nombre_categoria'] ."</option>";	
				echo	     "							   </select></td></tr>
					          <tr><td>Imagen     </td><td><input name='fileToUpload' type=file accept='image/x-png,image/gif,image/jpeg'> &nbsp <img src='Images/Productos/". $fila['imagen'].".jpg' class='imagenForm' style='width:6vw'; ></td></tr>
					          <tr><td>           </td> <td><button class='btn btn-success' type='submit' name= 'productoModificado' value='". $fila['id_producto'] ."'>Enviar</button></form></td></tr>
				          </table></div><br>";
			    }
			    else
			    	echo '<script>dropMenu(`adminProd`)</script>';
			}

			//-------------Modificar stock----------------------------
			if(isset($_POST['id_prod_stock'])){
				$id_prod_stock = $_POST['id_prod_stock'];
				$resultStock = mysqli_query($conexion,"SELECT * FROM existencias WHERE id_producto='$id_prod_stock'");
				if (mysqli_num_rows($resultStock) != 0){
					echo "<div id='modStock' class='dropMenu'>
						  <h4 align='center'>Stock producto ID: " . $id_prod_stock . "</h4>
						  <table class='tabla_admin'>
						  	<tr> <td>ID stock</td> <td>Detalle</td> <td>Unidades</td> <td></td></tr>";
						  	$aux = 0;
						  	while ($fila = mysqli_fetch_array($resultStock)){
						  		echo "<tr>
						  				<td>".$fila['id_existencia']."</td> 
						  				<td>".$fila['detalle']."</td> 
						  				<td>
						  					<form method='post' onsubmit='return confirmModify()'>
						  						<input type='number' min='0' step='1' name='new_stock".$aux."' style='width:7rem;text-align:center;' value='".$fila['existencia']."'>
						  						<button class='btn btn-secondary' type='submit' name='stockModificado".$aux."' value='". $fila['id_existencia'] ."'>Actualizar</button>
						  					</form>
						  				</td>
						  			</tr>";
						  			$aux++;
						  	}
					echo "</table></div>";
				}
			}
		?>


	</div>
	<!-- -------------------------- Footer -------------------------- -->
	<?php include('footer.html')?>
</body>
</html>



<!---<tr><td>Buscar producto</td><td><input class='form-control' type='search' placeholder='Buscar'><button class='btn btn-success' type='submit'>Buscar</button></td><td> </td></tr>-->