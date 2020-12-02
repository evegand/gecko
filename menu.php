
<link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">              <!--Bootstrap------------>
<link href="CSS/geckonavbar_style.css" rel="stylesheet">                    <!--Barra de navegación-->
<script type="text/javascript" src="JS/nav.js"></script>
<!--
<link href="CSS/productos.css" rel="stylesheet">
-->
<!--<link href="CSS/footer.css" rel="stylesheet">-->

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
                    <a class="dropdown-item" href="tazas.php">Tazas</a>
                    <a class="dropdown-item" href="sudaderas.php">Sudaderas</a>
                    <a class="dropdown-item" href="productos.php">Más productos...</a>
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
            <li class="nav-item"><a class="nav-link pl-4 pr-4" href="contacto.php">Contacto</a></li>

            <!---(Opción) Iniciar sesión------------------------>
            <li class="nav-item"><a class="nav-link pl-3 pr-3" href="micuenta.php" id="sesion">Iniciar sesión</a></li>
            <?php include 'zmenu.php';?>
            
            <!---(Opción) Carrito------------------------------->
            <li class="nav-item"><a class="nav-link pl-3 pr-3" href="carrito.php">Carrito <img class="pl-1 pt-1" id="cart" src="Images/carrito.png" width="30" height="28" alt=""></a></li>    	
        </ul>
        <!---Frase------------------------------------------------>
        <span class="navbar-text pl-1" style="width: 289px;text-align: right;">
            ¡Personaliza tu mundo!
        </span>
    </div>
</nav>