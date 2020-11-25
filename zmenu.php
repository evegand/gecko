<?php
if(isset($_SESSION['login_user_sys'])){
 	echo "<script>
 			document.getElementById('sesion').innerHTML = 'Mi cuenta';
 			document.getElementById('sesion').href = 'micuenta.php';
 		</script>";
}
?>