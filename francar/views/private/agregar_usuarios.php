<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />

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
          <ul class="right hide-on-med-and-down">
            <li>
              <a class="waves-effect waves-light btn modal-trigger black" href="usuarios.php">REGRESAR</a>
            </li>
        </div>
      </div>
    </nav>
  </div>

  <h3 align="center">AGREGAR USUARIOS
    <a class="btn-floating black pulse">
      <i class="material-icons">add_circle</i>
    </a>
  </h3>
  <br>
  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="usuarios.php" class="breadcrumb">Usuarios</a>
        <a href="agregar_usuarios.php" class="breadcrumb">Agregar Usuarios</a>
      </div>
    </div>
  </nav>
  <br>
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="text" type="text" class="validate">
          <label for="text">Nombre</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="text" type="text" class="validate">
          <label for="text">Apellido</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="text" type="text" class="validate">
          <label for="text">Cargo</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">call</i>
          <input id="icon_telephone" type="tel" class="validate">
          <label for="icon_telephone">Telefono</label>
        </div>
      </div>
      <br>
      <p class="center-align">
        <a class="waves-effect waves-light btn-large">Agregar Usuario</a>
      </p>
    </form>
  </div>
  <br>
  <br>
  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
require("../resources/pages/footer.php");
Footer::foot();
?>

  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/carousel.js"></script>
  <script src="../../resources/js/modal.js"></script>
</body>

</html>