<?php
    //Proceso de conexion con la base de datos
    $link = mysqli_connect("localhost", "root", "", "sesiones");

    if (mysqli_connect_errno()){
        echo "No se pudo conectar : " . mysqli_connect_error();
        exit;
    }

    $remitente = $_POST['email'];
    $destinatario = 'mail@dominio.com'; // en esta línea va el mail del destinatario.
    $asunto = 'Consulta'; // acá se puede modificar el asunto del mail
    if (!$_POST){
        echo '<script>
                 alert("¡Su mensaje no ha sido enviado!");
             </script>';
?>
<?php
    } else {
        $cuerpo = "Nombre y apellido: " . $_POST["nombre"] . "\r\n"; 
        $cuerpo .= "Email: " . $_POST["email"] . "\r\n";
    	$cuerpo .= "Consulta: " . $_POST["consulta"] . "\r\n";
    	//las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_POST[""] deben coincidir con el "name" de cada campo. 
    	// Si se agrega un campo al formulario, hay que agregarlo acá.

        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/plain; charset=utf-8\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From: \"".$_POST['nombre']." ".$_POST['apellido']."\" <".$remitente.">\n";

        mail($destinatario, $asunto, $cuerpo, $headers);

        echo '<script>
                 alert("¡Su mensaje se ha enviado con éxito!");
             </script>';
    }
?>
