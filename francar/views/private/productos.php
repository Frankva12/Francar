<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Se importa el css de Materialize-->
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
    <h3 align="center">Productos
      <a class="btn-floating black pulse">
        <i class="material-icons">book</i>
      </a>
    </h3>

    <nav>
      <div class="nav-wrapper cyan lighten-2">
        <div class="col s12">
          <a href="#!" class="breadcrumb"></a>
          <a href="private.php" class="breadcrumb">Estadisticas</a>
          <a href="productos.php" class="breadcrumb">Productos</a>
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
    <!--Tabla donde se muestran los libros que hay en la tienda donde se puede modificar, eliminar y agregar-->
    <div class="container" id="myTable">
      <table class="striped">
        <thead>
          <tr>
            <th>Libro</th>
            <th>Descripcion</th>
            <th>Precio</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <p align="left">Harry Potter y la orden del Fenix</p>
            </td>
            <td>
              <p>Descripción</p>
            </td>
            <td>.jpg</td>
            <td>$25.00</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
          </tr>

          <tr>
            <td>Harry Potter y el misterio de principe</td>
            <td>
              <p>Descripción </p>
            </td>
            <td>.jpg</td>
            <td>$25.00</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
          </tr>
          <tr>
            <td>Harry Potter y las Reliquias de la muerte</td>
            <td>
              <p>Descripción
            </td>
            <td>.jpg</td>
            <td>$25.00</td>
            <td>
              <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                <i class="material-icons left">create</i>Editar</a>
              <a class="waves-effect  red darken-2 btn-small">
                <i class="material-icons left">delete_sweep</i>Eliminar</a>
            </td>
          </tr>
        </tbody>
      </table>
      <h1 align="center">
        <a align="center" class="waves-effect waves-light btn modal-trigger light-green" href="#modal1">Agregar Productos</a>
      </h1>
    </div>
    <!--Se hace el modal de agregar productos-->
    <div id="modal1" class="modal">
      <h3 align="center">AGREGAR PRODUCTOS
        <a class="btn-floating black pulse">
          <i class="material-icons">add_circle</i>
      </h3>
      </a>
      <hr>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s11">
              <i class="material-icons prefix">book</i>
              <input id="text" type="text" class="validate">
              <label for="text">Producto</label>
            </div>
          </div>
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s11">
                  <i class="material-icons prefix">edit</i>
                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1">Descripcion</label>
                </div>
              </div>
            </form>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">book</i>
            <input id="text" type="text" class="validate">
            <label for="text">Editorial</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">attach_money</i>
            <input id="number" type="number" class="validate">
            <label for="number">Precio</label>
          </div>
          <form action="#">
            <div class="file-field input-field col 10">
              <div class="btn">
                <span>Imagen</span>
                <input type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </form>
      </div>
      <br>
      <p class="center-align">
        <a class="waves-effect waves-light btn-large">Agregar Producto</a>
      </p>
      </form>
    </div>


    <!--Se hace el modal de editar prouductos-->
    <div id="modal2" class="modal">
      <h3 align="center">EDITAR PRODUCTOS
        <a class="btn-floating black pulse">
          <i class="material-icons">create</i>
      </h3>
      </a>
      <hr>
      <div class="row">
        <form class="col s12">
          <div class="row">
            <div class="input-field col s11">
              <i class="material-icons prefix">book</i>
              <input id="text" type="text" class="validate">
              <label for="text">Producto</label>
            </div>
          </div>
          <div class="row">
            <form class="col s12">
              <div class="row">
                <div class="input-field col s11">
                  <i class="material-icons prefix">edit</i>
                  <textarea id="textarea1" class="materialize-textarea"></textarea>
                  <label for="textarea1">Descripcion</label>
                </div>
              </div>
            </form>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">book</i>
            <input id="text" type="text" class="validate">
            <label for="text">Editorial</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">attach_money</i>
            <input id="number" type="number" class="validate">
            <label for="number">Precio</label>
          </div>
          <form action="#">
            <div class="file-field input-field col 10">
              <div class="btn">
                <span>Imagen</span>
                <input type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </form>
      </div>
      <br>
      <p class="center-align">
        <a class="waves-effect waves-light btn-large">Agregar Productos</a>
      </p>
      </form>
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