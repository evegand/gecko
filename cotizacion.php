<?php
    //Proceso de conexion con la base de datos
    include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
    include("config/conexion.php");//Contiene de conexion a la base de datos

    $remitente = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $producto = $_POST['producto'];
    $color = $_POST['color'];
    $mensaje = $_POST['mensaje'];
    //$file = $_POST['archivo'];

    $destinatario = 'jair.marquez.rubio@gmail.com'; // en esta línea va el mail del destinatario.

    if (!$_POST){
        echo '<script>
                 alert("¡Su mensaje no ha sido enviado!");
             </script>';
    } else {
        $cuerpo = "Nombre y apellido: " . $_POST["nombre"] . "\r\n"; 
        $cuerpo .= "Email: " . $_POST["correo"] . "\r\n";
        $cuerpo .= "Producto: " . $_POST["producto"] . "\r\n";
        $cuerpo .= "Color: " . $_POST["color"] . "\r\n";
        $cuerpo .= "Mensaje: " . $_POST["mensaje"] . "\r\n";
        //las líneas de arriba definen el contenido del mail. Las palabras que están dentro de $_POST[""] deben coincidir con el "name" de cada campo. 
        // Si se agrega un campo al formulario, hay que agregarlo acá.

        $headers  = "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/plain; charset=utf-8\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "X-MSMail-Priority: Normal\n";
        $headers .= "X-Mailer: php\n";
        $headers .= "From: \"" .$_POST['nombre']. "\"" .$remitente. "\n";

        mail($destinatario, "Personalizacion", $cuerpo, $headers);

    echo '<script>
             alert("¡Su mensaje se ha enviado con éxito!");
             location.href="servicios-personaliza.php";
         </script>';
     }
?>