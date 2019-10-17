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
  <h1 align="center" class="lang" key="Registrarse">Registrarse</h1>
  <hr>
  <form class="col s12" id="form-register">
    <div class="row">
      <div class="input-field col s6">
        <input id="nombres" name="nombres" type="text" class="validate" autocomplete="off">
        <label for="nombres" class="lang" key="Nombre"></label>
      </div>
      <div class="input-field col s6">
        <input id="apellidos" name="apellidos" type="text" class="validate" autocomplete="off">
        <label for="apellidos" class="lang" key="Apellido"></label>
      </div>
    </div>
    <div class="input-field col s6">
      <input  id="alias" name="alias" type="text" class="validate" autocomplete="off">
      <label for="alias">Alias</label>
    </div>
    <div class="input-field col s6">
      <input id="clave1" name="clave1" type="password" class="validate" autocomplete="off">
      <label for="clave1" class="lang" key="Contrasenia"></label>
    </div>
    <div class="input-field col s6">
      <input id="clave2" name="clave2" type="password" class="validate" autocomplete="off">
      <label for="clave2" class="lang" key="Confirmar_contraseña"></label>
    </div>
    <div class="input-field col s6">
      <input id="direccion" name="direccion" type="text" class="validate" autocomplete="off">
      <label for="direccion" class="lang" key="Direccion"></label>
    </div>
    <div class="input-field col s6">
      <input id="telefono" name="telefono" type="tel" class="validate" autocomplete="off">
      <label for="telefono" class="lang" key="Telefono_footer"></label>
    </div>
    <div class="input-field col s6">
      <input id="correo" name="correo" type="email" class="validate" autocomplete="off">
      <label for="correo" class="lang" key="Correo_footer"></label>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <div align="center" class="g-recaptcha" data-sitekey="6LcBzLMUAAAAAPt5z1pZnW6LYFHZ2Qga2DFGsSu0"></div>
      </div>
      <div align="center">
        <button class="btn btn-lg btn-primary lang" key="Registrarse" type="submit" data-tooltip="Registrar">Registrarse</button>
      </div>
  </form>
  <br>
  <br>
  <div align="center">
    <a class="dropdown-trigger" href="#" data-target="traslate"><span class="idioma">Idioma<span></a>
    </li>
    <ul id="traslate" class="dropdown-content">
      <li><a class="españolOnclick" onclick="showEs()">Español</a></li>
      <li><a class="englishOnclick" onclick="showEn()">English</a></li>
    </ul>
    </nav>
  </div>
  <ul id="traslate2" class="dropdown-content">
    <li><a class="españolOnclick" onclick="showEs()">Español</a></li>
    <li><a class="englishOnclick" onclick="showEn()">English</a></li>
  </ul>
</div>
</div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="../../resources/js/jquery-3.3.1.min.js"></script>
<script src="../../resources/js/materialize.min.js"></script>
<script src="../../resources/js/initialize.js"></script>
<script src="../../resources/js/sweetalert.min.js"></script>
<script src="../../resources/js/highcharts.js"></script>
<script src="../../resources/js/modules.js"></script>
<script type="text/javascript" src="../../core/helpers/functions.js"></script>
<script type="text/javascript" src="../../core/controllers/dashboard/account.js"></script>
<script type="text/javascript" src="../../core/controllers/dashboard/register.js"></script>
<script src="../../core/helpers/traductor.js"></script>

</html>