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


  <h4 align="center">Usuarios
    <a class="btn-floating black pulse">
      <i class="material-icons">account_circle</i>
    </a>
  </h4>
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

  <!--Se hace tabla donde muestran los diferentes usuarios que hay-->
  <div class="container">
    <table class="highlight" id="tablaUsuarios">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Alias</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody id="tbody-read">
      </tbody>
    </table>
    <!-- Botón para abrir ventana de nuevo registro -->
    <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green" data-tooltip="Agregar"><i
          align="center" class="material-icons"></i>Agregar Usuarios</a>
    </div>
  </div>
  </div>


  <!-- Ventana para crear un nuevo registro -->
  <div id="modal-create" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Crear usuario</h4>
      <form method="post" id="form-create" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_nombres" type="text" name="create_nombres" minlength="5" maxlength="80" />
            <label for="create_apellidos">Nombre</label>
          </div>
          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_apellidos" type="text" name="create_apellidos" minlength="5" maxlength="80"
              class="validate" />
            <label for="create_apellidos">Apellido</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_alias" type="text" name="create_alias" class="validate" />
            <label for="create_alias">Alias</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">place</i>
            <input id="create_direccion" type="text" name="create_direccion" minlength="5" maxlength="80"
              class="validate" />
            <label for="create_apellidos">Direccion</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">lock</i>
            <input id="create_clave1" type="password" name="create_clave1" minlength="6" maxlength="30"
              class="validate" />
            <label for="create_clave1">Contraseña</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">lock</i>
            <input id="create_clave2" type="password" name="create_clave2" minlength="6" maxlength="30"
              class="validate" />
            <label for="create_clave1">Confirmar contraseña</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input id="create_telefono" type="text" name="create_telefono" minlength="8" maxlength="10"
              class="validate" />
            <label for="create_telefono">Telefono</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">mail</i>
            <input id="create_correo" type="email" name="create_correo" minlength="15" maxlength="80"
              class="validate" />
            <label for="create_correo">Correo</label>
          </div>
        </div>
        <div class="row center-align">
          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
              class="material-icons">cancel</i></a>
          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i
              class="material-icons">save</i></button>
        </div>
      </form>
    </div>
  </div>


  <!-- Ventana para modificar un registro existente -->
  <div id="modal-update" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Modificar usuario</h4>
      <form method="post" id="form-update">
        <input type="hidden" id="id_administrador" name="id_administrador" />
        <div class="row">
          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="update_nombre_administrador" type="text" name="update_nombre_administrador" class="validate"
              minlength="5" maxlength="80" required />
            <label for="update_nombre_administrador">Nombre</label>
          </div>
          <div class="input-field col s12 m6">
            <i class="material-icons prefix">assignment_ind</i>
            <input id="update_apellido_administrador" type="text" name="update_apellido_administrador" class="validate"
              minlength="5" maxlength="80" required />
            <label for="update_apellido_administrador">Apellido</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">fingerprint</i>
            <input id="update_alias" type="text" name="update_alias" class="validate" minlength="4" maxlength="40"
              required />
            <label for="update_alias">Alias</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">place</i>
            <input id="update_direccion" type="text" name="update_direccion" class="validate" minlength="5"
              maxlength="80" required />
            <label for="update_direccion">direccion</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input id="update_telefono" type="text" name="update_telefono" class="validate" minlength="8" maxlength="10"
              required />
            <label for="update_telefono">telefono</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">mail</i>
            <input id="update_correo" type="email" name="update_correo" class="validate" minlength="15" maxlength="80"
              required />
            <label for="update_correo">Correo</label>
          </div>



        </div>
        <div class="row center-align">
          <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
              class="material-icons">cancel</i></a>
          <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i
              class="material-icons">save</i></button>
        </div>
      </form>
    </div>
  </div>

  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
require("../../core/helpers/dashboard/footer.php");
Footer::foot();
?>
  <!--Se importan lo que son los archivos de JavaScript-->
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/carousel.js"></script>
  <script src="../../resources/js/parallax.js"></script>
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/combo.js"></script>
  <script src="../../resources/js/datatables.min.js"></script>
  <script src="../../resources/js/dataTables.material.min.js"></script>
  <script src="../../resources/js/tabla.js"></script>


  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../core/controllers/dashboard/account.js"></script>
  <script src="../../core/helpers/functions.js"></script>
  <script src="../../core/controllers/dashboard/usuarios.js"></script>
</body>

</html>