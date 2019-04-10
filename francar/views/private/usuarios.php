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

<body background="">
  <?php
    require("../../resources/pages/menu.php");
    inicio::navigate();
  ?>


    <h3 align="center">Usuarios
      <a class="btn-floating black pulse">
        <i class="material-icons">account_circle</i>
      </a>
    </h3>
    <nav>
      <div class="nav-wrapper cyan lighten-2">
        <div class="col s12">
          <a href="#!" class="breadcrumb"></a>
          <a href="private.php" class="breadcrumb">Estadisticas</a>
          <a href="usuarios.php" class="breadcrumb">Usuarios</a>
        </div>
      </div>
    </nav>
    <br>
    <div class="container white">
      <nav class=" brown lighten-5">
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
                            <input type="search" id="myInput"  required>
              <label class="label-icon" for="search">
                <i class="material-icons">search</i>
              </label>
              <i class="material-icons">close</i>
            </div>
          </form>
        </div>
      </nav>
    </div>
    <br>
    <!--Se hace tabla donde muestran los diferentes usuarios que hay-->
    <div class="container" id="myTable">
      <table class="striped">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td>7727-3278</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
            </td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td>7198-5659</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td>7965-5959</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
            </td>
          </tr>
        </tbody>
      </table>
      <h1 align="center">
        <a align="center" class="waves-effect waves-light btn modal-trigger light-green" href="#modal1">Agregar usuarios</a>
      </h1>
    </div>

    <!--Se hace el modal de agregar usuarios-->
    <div id="modal1" class="modal">

      <h3 align="center">AGREGAR USUARIOS
        <a class="btn-floating black pulse">
          <i class="material-icons">add_circle</i>
        </a>
      </h3>
      <hr>
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
    </div>


    <!--Se hace el modal de editar usuarios-->
    <div id="modal2" class="modal">
      <h3 align="center">EDITAR USUARIOS
        <a class="btn-floating black pulse">
          <i class="material-icons">create</i>
        </a>
      </h3>
      <hr>
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
    </div>

    <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
    <?php
require("../../resources/pages/footer.php");
Footer::foot();
?>
    <!--Se importan lo que son los archivos de JavaScript-->
    <script src="../../resources/js/jquery-3.3.1.min.js"></script>
            <script src="../../resources/js/materialize.min.js"></script>
            <script src="../../resources/js/carousel.js"></script>
            <script src="../../resources/js/parallax.js"></script>
            <script src="../../resources/js/images.js"></script>
            <script src="../../resources/js/modal.js"></script>
            <script src="../../resources/js/search.js"></script>
</body>

</html>