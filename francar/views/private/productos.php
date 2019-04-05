<html>

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
    <!--Tabla donde se muestran los libros que hay en la tienda donde se puede modificar, eliminar y agregar-->
    <table class="striped">
      <thead>
        <tr>
          <th>Libro</th>
          <th>Descripcion</th>
          <th>Imagen</th>
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
        </tr>
        <tr>
          <td>Harry Potter y el misterio de principe</td>
          <td>
            <p>Descripción </p>
          </td>
          <td>.jpg</td>
          <td>$25.00</td>
        </tr>
        <tr>
          <td>Harry Potter y las Reliquias de la muerte</td>
          <td>
            <p>Descripción</td>
          <td>.jpg</td>
          <td>$25.00</td>
        </tr>
      </tbody>
    </table>
    <h1 align="center">
      <a class="waves-effect green btn-small" href="agregar_productos.php">
        <i class="material-icons left">add_circle</i>Agregar</a>
    </h1>
</body>

<!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
<?php
require("../../resources/pages/footer.php");
Footer::foot();
?>

</html>