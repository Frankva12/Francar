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
<form method="post" id="form-register">
<div class="modal-content">
      <h4 class="center-align">Registrarse</h4>
      <form method="post" id="form-create" enctype="multipart/form-data">
        <div class="row">

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_nombre" type="text" name="create_nombre" class="validate" required />
            <label for="create_nombre">Nombre</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_apellido" type="text" name="create_apellido" class="validate" />
            <label for="create_apellido">Apellido</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_alias" type="text" name="create_alias" class="validate" />
            <label for="create_alias">Alias</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">lock</i>
            <input id="create_contrasenia" type="text" name="create_contrasenia" class="validate" />
            <label for="create_contrasenia">Contraseña</label>
          </div>

          
          <div class="input-field col s12 m6">
            <i class="material-icons prefix">lock</i>
            <input id="create_contrasenia" type="text" name="create_contrasenia" class="validate" />
            <label for="create_contrasenia">Confirmar contraseña</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">place</i>
            <input id="create_direccion" type="text" name="create_direccion" class="validate" />
            <label for="create_direccion">Direccion</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input id="create_telefono" type="text" name="create_telefono" class="validate" />
            <label for="create_telefono">Telefono</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">mail</i>
            <input id="create_correo" type="text" name="create_correo" class="validate" />
            <label for="create_correo">Correo</label>
          </div>

        </div>
        <div class="row center-align">
 	    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar"><i class="material-icons">send</i></button>
    </div>
</form>
<?php
require("../../resources/pages/footer.php");
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
<script src="../../core/helpers/functions.js"></script>
<script src="../../core/controllers/dashboard/usuarios.js"></script>
</body>

</html>
