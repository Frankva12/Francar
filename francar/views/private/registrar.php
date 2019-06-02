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
  <!--Deja que la pagina web sea responsive-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />


  <title>Libreria Francar</title>
</head>
</body>

<div class="row">
    <h1 align="center">Registrarse</h1>
    <hr>
    <form class="col s12" id="form-register">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nombres" id="nombres" name="nombres" type="text" class="validate">
          <label for="nombres"></label>
        </div>
        <div class="input-field col s6">
          <input placeholder="Apellidos" id="apellidos" name="apellidos" type="text" class="validate">
          <label for="apellidos"></label>
        </div>
      </div>
        <div class="input-field col s6">
          <input placeholder="Alias" id="alias" name="alias" type="text" class="validate">
          <label for="alias"></label>
      </div>
        <div class="input-field col s6">
          <input placeholder="Contraseña" id="clave1" name="clave1" type="password" class="validate">
          <label for="clave1"></label>
      </div>
        <div class="input-field col s6">
          <input placeholder="Confirme su contraseña" id="clave2" name="clave2" type="password" class="validate">
          <label for="clave2"></label>
      </div>
        <div class="input-field col s6">
          <input placeholder="Direccion" id="direccion" name="direccion" type="text" class="validate">
          <label for="direccion"></label>
      </div>
        <div class="input-field col s6">
          <input id="telefono" name="telefono" type="tel" class="validate">
          <label for="telefono">Telefono</label>
        </div>
        <div class="input-field col s6">
          <input id="correo" name="correo" type="email" class="validate">
          <label for="correo">Correo</label>
      </div>                     
      <button class="btn btn-lg btn-primary" type="submit" data-tooltip="Registrar">Registrarse</button></button>
    </form>
  </div>  
  
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>
  <script type="text/javascript" src="../../core/helpers/functions.js"></script>
  <script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
  <script type="text/javascript" src="../../core/controllers/dashboard/register.js"></script>

</html>