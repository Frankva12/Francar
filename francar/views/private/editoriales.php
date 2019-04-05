<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />

  <!--Deja que la pagina web sea responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>

  <title>Libreria Francar</title>
</head>

<body>
  <?php
    require("../../resources/pages/menu.php");
    inicio::navigate();
  ?>

  <!--Se pone lo que es el titulo-->
  <h3 align="center">Editoriales <a class="btn-floating black pulse"><i class="material-icons">book</i></h3></a>
  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="private.php" class="breadcrumb">Estadisticas</a>
        <a href="editoriales.php" class="breadcrumb">Editoriales</a>
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
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>
  <br>
  <!--Se hace una tabla con el nombre de cada editorial-->
  <div class="container">
  <table class="striped">
    <thead>
      <tr>
        <th>Editoriales</th>
        <th>Descripción</th>
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

    <a class="waves-effect grey btn-small"><i class="material-icons left">remove_red_eye</i>Habilitar</a>
    <a class="waves-effect green btn-small" href="agregar_Editorial.php"><i
        class="material-icons left">add_circle</i>Agregar</a></h1>
        </div>
</body>

</html>

<!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
<?php
require("../../resources/pages/footer.php");
Footer::foot();
?>