<?php     //Inicio de variables de sesión
  if (!isset($_SESSION))
    session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
  <title>Ideas Gecko</title>
    
    <!-----------------CSS (estilos)----------------------------->
    <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">              <!--Bootstrap------------>
    <link href="CSS/geckonavbar_style.css" rel="stylesheet">                    <!--Barra de navegación-->
    <link href="CSS/estilos.css" rel="stylesheet">                              <!--Estilos del footer--->
    <link href="CSS/productos.css" rel="stylesheet">
    <!--<link href="CSS/footer.css" rel="stylesheet">-->
    <link href="CSS/Icons/fontello-e1be2622/css/fontello.css" rel="stylesheet"> <!--Íconos del footer---->
    <link href="CSS/formularios.css" rel="stylesheet">                          <!--Estilos formularios-->               
  <!----------------Javascript (scripts)----------------------->
  <script type="text/javascript" src="JS/nav.js"></script>

</head>
<body>
  <!------------------------------Barra de navegación------------------------------------------------------------------------------------------------------------------------------>
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <!---Logotipo----------------------------------------------------------------------------->
      <a href="index.php" class="navbar-brand pr-5"><img id="logo" src="Images/BlackGecko.png" width="55" height="50" alt=""> Ideas Gecko</a>
      <!---Botón para barra de navegación responsive-------------------------------------------->
      <button class="navbar-toggler" 
              id="toggleButton"
              type="button" 
              data-toggle="collapse"
              data-target="#navbarText" 
              aria-controls="navbarText" 
              aria-expanded="false" 
              aria-label="Toggle navigation"
              onclick="validarmenu(this, this.id, 'toggleMenu')">
          <span class="navbar-toggler-icon"></span>
      </button>
      <!---Barra de navegación (Contenido)------------------------------------------------------>
      <div class="collapse navbar-collapse" id="toggleMenu">
        <!---Opciones------------------------------------------------------>
          <ul class="navbar-nav mr-auto">
            <!---(Opción) Productos----------------------------->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
                      href="#productos" 
                      id="titleProducts" 
                      role="button" 
                      data-toggle="dropdown" 
                      aria-haspopup="true" 
                      aria-expanded="false"
                      onclick="validarmenu(this, this.id, 'dropdownProducts')"> Productos
                  </a>
                  <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownProducts">
                      <a class="dropdown-item" href="playeras.php">Playeras</a>
                      <a class="dropdown-item" href="#">Tazas</a>
                      <a class="dropdown-item" href="#">Sudaderas</a>
                      <a class="dropdown-item" href="#">Llaveros</a>
                      <a class="dropdown-item" href="">Más productos...</a>
                  </div>
              </li>
              <!---(Opción) Servicios----------------------------->              
             <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle collapsed pl-3 pr-3" 
                      href="#" 
                      id="titleServices" 
                      role="button" 
                      data-toggle="dropdown" 
                      aria-haspopup="true" 
                      aria-expanded="false"
                      onclick="validarmenu(this,this.id, 'dropdownServices')"> Servicios
                  </a>
                  <div class="dropdown-menu border-0" aria-labelledby="dropdownMenu" id="dropdownServices">
                      <a class="dropdown-item" href="#">Personalización</a>
                      <a class="dropdown-item" href="#">Paquetes fotográficos</a>
                      <a class="dropdown-item" href="#">Eventos</a>
                      <a class="dropdown-item" href="#servicios">Más...</a>
                  </div>
              </li>
              <!---(Opción) Contacto------------------------------>
              <li class="nav-item"><a class="nav-link pl-4 pr-4" href="contacto.php" style="color: green">Contacto</a></li>  <!--Página actual-->
              <!---(Opción) Iniciar sesión------------------------>
              <li class="nav-item"><a class="nav-link pl-3 pr-3" href="iniciar_sesion.php" id="sesion">Iniciar sesión</a></li>  <!--Si hay cuenta iniciada, cambia el enlace por "Mi cuenta"--><?php include('zmenu.php') ?>
              <!---(Opción) Carrito------------------------------->
              <li class="nav-item"><a class="nav-link pl-3 pr-3" href="carrito.php">Carrito <img class="pl-1 pt-1" id="cart" src="Images/carrito.png" width="30" height="28" alt=""></a></li>    
          </ul>
          <!---Frase------------------------------------------------>
          <span class="navbar-text pl-1" style="width: 289px;text-align: right;">
              ¡Personaliza tu mundo!
          </span>
      </div>
  </nav>
  <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

  <!-- --------------------------Contenido----------------------------------------------------------------------------------------------------------------------------------------->
    <div style="height: 64px"></div>
    <h1>Contacto</h1>
    <div class="contenido" id="contenido" style="text-align: center; margin:auto;">

    <h2 class="text-white mb-3">¿Dónde estamos?</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3731.0193156271225!2d-103.37405938596045!3d20.750011186150093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428aff0c2d5f743%3A0x257055224aaa76a!2sCalle%20Jardines%20de%20las%20Clavelinas%20Nte.%2C%20Jardines%20del%20Vergel%2C%2045130%20Zapopan%2C%20Jal.!5e0!3m2!1ses!2smx!4v1604111689877!5m2!1ses!2smx" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    <h2 class="text-white mb-3 mt-5">Envíanos un correo</h2>
      <form action="envia.php" method="post"> 
        <div class="form-group">
          <label class="text-white" for="correo">Correo electrónico</label>
          <input type="email" class="form-control" name="email" placeholder="correo@ejemplo.com" required>
        </div>
        <div class="form-group">
          <label class="text-white" for="nombre">Nombre Completo</label>
          <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
        </div>
        <div class="form-group">
          <label class="textarea text-white" for="mensaje">Mensaje</label>
          <textarea type="textarea" rows="3" class="form-control" name="consulta" placeholder="Mensaje" required></textarea>
        </div>
        <input type="submit" value="Enviar" class="btn-form btn btn-success mb-5">
      </form>
    </div>

</body>

</html>