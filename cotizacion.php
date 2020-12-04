<?php
    //Proceso de conexion con la base de datos
    $link = mysqli_connect("localhost", "root", "", "sesiones");

    if (mysqli_connect_errno()){
        echo "No se pudo conectar : " . mysqli_connect_error();
        exit;
    }


    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $producto = $_POST['producto'];
    $color = $_POST['color'];
    $mensaje = $_POST['mensaje'];
    $file = $_POST['archivo'];

    echo "<b>Remitente</b>: ".$remitente;
    echo "<b>Destinatario</b>: ".$destinatario;
    echo "<b>Mensaje</b>: ".$asunto;

    // Please specify your Mail Server - Example: mail.yourdomain.com.
    ini_set("SMTP","gmail.com");

    // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
    ini_set("smtp_port","587");

    // Please specify the return address to use
    ini_set('sendmail_from', 'evegand.97@gmail.com');

    //echo phpinfo();

    $to_email = "evegand.97@gmail.com";
    $subject = "Simple Email Test via PHP";
    $body = "Hi,nn This is test email send by PHP Script";
    $headers = "From: sender\'s email";

    if (mail($to_email, $subject, $body)) {
        echo "Email successfully sent to $to_email...";
    } else {
        echo "Email sending failed...";
    }

    /*
    $to = "destinatario@email.com";
    $subject = "Asunto del email";
    $message = "Este es mi primer envío de email con PHP";
     
    mail($to, $subject, $message);
    */
        echo '<script>
                 alert("¡Su mensaje se ha enviado con éxito!");
                 location.href="contacto.php";
             </script>';
    }
?>
