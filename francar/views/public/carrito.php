<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <!--Deja que la pagina web sea responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>

  <title>Libreria Francar</title>
</head>

<body>

  <?php
     require("../../core/helpers/public/menu.php");
     Iniciar::navigate();
  ?>

  <h3 align="center" class="lang" key="Carrito">CARRITO
    <a class="btn-floating black pulse">
      <i class="material-icons">shopping_cart</i>
    </a></h3>


  <!-- Este es otro modal pero ahora en la opcion de contáctanos donde aparecera un formulario que automaticamente una persona deja ir un mensjae, al instante nos cae en nuestro correo electronico-->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <blockquote>
        <h3 class="header lang" key="Contactanos_publica">Contactanos
          <a class="btn-floating black pulse">
            <i class="material-icons">group</i>
          </a>
        </h3>
      </blockquote>
      </blockquote>
      <hr>
      <h5>
        <p align="left" class="lang" key="Nuestros_telefonos">Nuestros telefonos son: 2121-2828 y 2277-7777
        </p>
      </h5>
      <h5>
        <p align="left" class="lang" key="Nuestro_Correo">
          Nuestro correo: libreriafrancar@gmail.com.
        </p>
      </h5>
      <hr>
      <blockquote>
    </div>
  </div>
  </div>

  <!--Con este div se crea lo que es un modal que significa que dentro de la misma pagina web va a salir uun recuadro con todo lo que 
      nosotros le queramos poner para que le de un estilo Ajax a la pagina web en este caso seria en la opcion de ¿Quiénes somos?-->
  <div id="modal2" class="modal">
    <div class="modal-content">
      <div class="row container">
        <h2 align="center" class="lang" key="Quienes_somos">¿Quiénes somos?</h2>
        <hr>
        <blockquote>
          <h3 class="header lang" key="mision">Misión
            <a class="btn-floating black pulse">
              <i class="material-icons">group</i>
            </a>
          </h3>
        </blockquote>
        <p align="left" class="lang" key="Somos_empresa">Somos una empresa que busca fomentar la lectura en los jóvenes,
          apoyados de la
          ayuda de la tecnología,
          para obtenerlos de manera más efectiva virtualmente.</p>

        <blockquote>
          <h3 class="header lang" key="Vision">Visión
            <a class="btn-floating black   pulse">
              <i class="material-icons">lightbulb_outline</i>
            </a>
          </h3>
        </blockquote>
        <p align="left" class="lang" key="lograr_Ser">Lograr ser la mejor librería a nivel nacional con ayuda de la
          tecnología.</p>
      </div>
    </div>
  </div>


  <!--Se hace una tabla donde iran los libross que la persona pide, el costo de cada articulo, la cantidad y el total al pagar cuando llegue su pedido-->
  <!--Se hace una tabla con el nombre de cada editorial-->
  <div class="container">
    <table class="highlight" id="tablaCarrito">
      <thead>
        <tr>
          <th class="lang" key="ID">ID</th>
          <th class="lang" key="titulo_libros">Libro</th>
          <th class="lang" key="Cantidad">Cantidad</th>
          <th class="lang" key="Cliente">Cliente</th>
          <th class="lang" key="Precio">Precio</th>
        </tr>
      </thead>
      <tbody id="tbody-read">
      </tbody>
    </table>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
  require("../../core/helpers/dashboard/footer.php");
  Footer::foot();
  ?>

  <!--Se llaman todos los archivos JavaScript-->
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/initialize.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../core/controllers/public/account.js"></script>
  <script src="../../core/helpers/traductor.js"></script>
</body>

</html>