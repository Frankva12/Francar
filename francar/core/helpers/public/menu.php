<?php
  class Iniciar{
      public static function navigate(){
           session_start();
            if (isset($_SESSION['id_cliente'])) {
               if (isset($_SESSION['tiempo'])) {
                   //Tiempo en segundos para dar vida a la sesión.
				$inactivo = 300;//20min en este caso.
			
				//Calculamos tiempo de vida inactivo.
				$vida_session = time() - $_SESSION['tiempo'];
			
					//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
					if($vida_session > $inactivo)
					{
                        
						//Removemos sesión.
						session_unset();
						//Destruimos sesión.
						session_destroy();              
						//Redirigimos pagina.
						header("location: ../../views/public/index.php");
			
						/*exit();*/
					} else {  // si no ha caducado la sesion, actualizamos
						$_SESSION['tiempo'] = time();
					}
                } else {
                    $_SESSION['tiempo'] = time();
                }$filename = basename($_SERVER['PHP_SELF']);
                if ($filename != 'login.php') {
                    print('
                    <body>

                    <div class="navbar-fixed">
                        <nav>
                        <div class="nav-wrapper black">
                            <!--Con este container se pone lo que es el nombre de nuestra tienda en linea-->

                            <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                            </a>
                            <div class="container">
                            <a href="index.php" class="brand-logo">Libreria Francar</a>
                            <ul class="right hide-on-med-and-down">
                                <!--Se colocan las opciones que va a llevar el menu-->
                                <li>
                                <a class="waves-effect waves-light btn modal-trigger black" href="#modal1">CONTÁCTANOS</a>
                                </li>
                                <li>
                                <a class="waves-effect waves-light btn modal-trigger black" href="#modal2">¿Quiénes somos?</a>
                                <li>
                                <a class="waves-effect waves-light btn modal-trigger black" href="libros.php">Libros disponibles</a>
                                <li>
                                <li>
                                <a class="waves-effect waves-light btn modal-trigger black" href="#" onclick="signOff()">Cerrar Sesion</a>
                                <li>
                                <a class="waves-effect waves-light btn modal-trigger black" href="carrito.php">
                                    <i class="material-icons prefix">shopping_cart</i>
                                </a>

                            </div>
                        </div>
                        </nav>
                    </div>
                    ');
                } else {
                    header('location: ../../views/public/index.php');
                }
           }
           else {
            print ('
            <div class="navbar-fixed">

            <nav>
            <div class="nav-wrapper black">
                <!--Con este container se pone lo que es el nombre de nuestra tienda en linea-->

                <a href="#" data-target="mobile-demo" class="sidenav-trigger">
                <i class="material-icons">menu</i>
                </a>
                <div class="container">
                <a href="index.php" class="brand-logo">Libreria Francar</a>
                <ul class="right hide-on-med-and-down">
                    <!--Se colocan las opciones que va a llevar el menu-->
                    <li>
                    <a class="waves-effect waves-light btn modal-trigger black" href="#modal1">CONTÁCTANOS</a>
                    </li>
                    <li>
                    <a class="waves-effect waves-light btn modal-trigger black" href="#modal2">¿Quiénes somos?</a>
                    <li>
                    <a class="waves-effect waves-light btn modal-trigger black" href="libros.php">Libros disponibles</a>
                    <li>
                    <li>
                    <a class="waves-effect waves-light btn modal-trigger black" href="login.php">Iniciar sesion</a>
                    <li>
                    <a class="waves-effect waves-light btn modal-trigger black" href="carrito.php">
                        <i class="material-icons prefix">shopping_cart</i>
                    </a>

                </div>
            </div>
            </nav>
        </div>
            ');
        }
      }
  }
?>