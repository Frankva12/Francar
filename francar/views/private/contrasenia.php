<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <link href="../../resources/css/tablas.css" rel="stylesheet">
  <link href="../../resources/css/material.min.css" rel="stylesheet">
  <link href="../../resources/css/dataTables.material.min.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <link href="../../resources/css/tablas.css" rel="stylesheet">
  <!--Deja que la pagina web sea responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>

  <title>Libreria Francar</title>
</head>

<body background="">
  <?php
      require("../../core/helpers/dashboard/menu.php");
    inicio::navigate();
  ?>


  <h4 align="center">Cambio de contraseña
    <a class="btn-floating black pulse">
      <i class="material-icons">account_circle</i>
    </a>
  </h4>
  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="usuarios.php" class="breadcrumb">Usuarios</a>
      </div>
    </div>
  </nav>
  <br>

  <br>
  <br>
  <br>
  <!--Se hace tabla donde muestran los diferentes usuarios que hay-->
  <div class="container">
    <form method="post" id="form-contrasenia">
      <input type="hidden" id="id_administrador" name="id_administrador">
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">lock</i>
        <input type="password" class="form-control" id="actual1" name="actual1">
        <label>Contraseña actual</label>
      </div>

      <div class="input-field col s12 m6">
        <i class="material-icons prefix">lock</i>
        <input type="password" class="form-control" id="actual2" name="actual2">
        <label>Repita contraseña actual</label>
      </div>

      <div class="input-field col s12 m6">
        <i class="material-icons prefix">lock</i>
        <input type="password" class="form-control" id="nueva1" name="nueva1">
        <label>Contraseña nueva</label>
      </div>

      <div class="input-field col s12 m6">
        <i class="material-icons prefix">lock</i>
        <input type="password" class="form-control" id="nueva2" name="nueva2">
        <label>Repita nueva contraseña</label>
      </div>

      <div class="row center-align">
        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar cambios"><i
            class="material-icons"></i>Guardar Cambios</button>
    </form>
  </div>
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

  <!--Se importan lo que son los archivos de JavaScript-->

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/combo.js"></script>
  <script src="../../resources/js/datatables.min.js"></script>
  <script src="../../resources/js/dataTables.material.min.js"></script>
  <script src="../../resources/js/tabla.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../core/helpers/functions.js"></script>
  <script src="../../core/controllers/dashboard/usuarios.js"></script>
  <script src="../../core/controllers/dashboard/account.js"></script>
</body>

</html>