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

  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper black">
        <div class="container">
          <a href="index.php" class="brand-logo">Libreria Francar</a>
          <ul class="right hide-on-med-and-down">
            <li>
              <a class="waves-effect waves-light btn modal-trigger black" href="index.php">REGRESAR A PAGINA
                PRINCIPAL</a>
            </li>
        </div>
      </div>
    </nav>
  </div>

  <h3 align="center">CARRITO
    <a class="btn-floating black pulse">
      <i class="material-icons">shopping_cart</i>
    </a>
  </h3>

  <!--Se hace una tabla donde iran los libross que la persona pide, el costo de cada articulo, la cantidad y el total al pagar cuando llegue su pedido-->
  <!--Se hace una tabla con el nombre de cada editorial-->
  <div class="container">
    <table class="highlight" id="tablaCarrito">
      <thead>
        <tr>
          <th>ID</th>
          <th>Libro</th>
          <th>Cantidad</th>
          <th>Cliente</th>
          <th>Precio</th>
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
</body>

</html>