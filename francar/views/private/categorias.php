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


  <h3 align="center">Categorias
    <a class="btn-floating black pulse">
      <i class="material-icons">book</i>
    </a>
  </h3>
  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="private.php" class="breadcrumb">Estadisticas</a>
        <a href="categorias.php" class="breadcrumb">Categorias</a>
      </div>
    </div>
  </nav>
  <br>

  <div class="container white">
    <nav class=" brown lighten-5">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" required>
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
  <!--Se hace una tabla donde iran las categorias de los libros que se poseen-->
  <div class="container">
    <table class="striped">
      <thead>
        <tr>
          <th>Categoria</th>
          <th>Descripción</th>
          <th>Acciones</th>

        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Romantico</td>
          <td> Descripción </td>
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
        <tr>
          <td>Policial</td>
          <td> Descripción
          </td>
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
        <tr>
          <td>Aventura</td>
          <td> Descripción </td>
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
      </tbody>
      </table>
      <h1 align="center">
      <a align="center" class="waves-effect waves-light btn modal-trigger light-green" href="#modal1">Agregar Productos</a> 
      </h1>
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
</body>

</html>