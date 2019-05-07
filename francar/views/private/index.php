<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="text/css" href="../../resources/css/fondo.css">
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
</head>
<!--Se hace un contenedor donde se le pone lo que es el login para el administrador-->
<div class="container1">

  <body background="../../resources/img/login_imagen.jpg">
    <div id="login-page" class="row center-align">
      <div class="col s12 m12 l12 z-depth-6 card-panel center-align">
        <form method="post" id="form-sesion">
          <div class="row teal lime grey lighten-1">
            <br>
            <h4 align="center"> Bienvenidos.
              <br>
              <br>
              <i align="center" class="material-icons medium">account_circle</i>
            </h4>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">assignment_ind</i>
<<<<<<< HEAD
<<<<<<< HEAD
              <input id="alias_usuario" type="text" name="alias_usuario class=" validate" minlength="5" maxlength="40"
                required />
=======
              <input id="alias_usuario" type="text" name="alias_usuario" class="validate" required/>
>>>>>>> parent of 9baa730... validacion por el lado de usuario
=======
              <input id="alias_usuario" type="text" name="alias_usuario" class="validate" required/>
>>>>>>> parent of 9baa730... validacion por el lado de usuario
              <label for="alias_usuario">Alias</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
<<<<<<< HEAD
<<<<<<< HEAD
              <input id="contrasenia" type="password" name="contrasenia" class="validate" minlength="6" maxlength="40"
                required />
              <label for="contrasenia">Contraseña</label>
=======
=======
>>>>>>> parent of 9baa730... validacion por el lado de usuario
              <input id="contrasenia" type="password" name="contrasenia" class=" " required/>
                <label for="contrasenia">Contraseña</label>
>>>>>>> parent of 9baa730... validacion por el lado de usuario
            </div>
          </div>


          <div class="col s12 center-align">
            <button type="submit" class="btn waves-effect black tooltipped" data-tooltip="Ingresar"><i
                class="material-icons">send</i></button>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
            </div>

            <div class="input-field col s6 m6 l6">
              <p align='right'>
                <a class="waves-effect waves-light btn modal-trigger grey darken-4" href="#modal1">¿Olvidó su
                  contraseña?
                </a>
              </p>
              <!-- Modal Structure -->
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4 align='center'>¿Olvidaste tu contraseña?</h4>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mail_outline</i>
                    <input class="validate" type="email">
                    <label for="correo" data-error="wrong" data-success="right">Correo</label>
                  </div>
                  <p class="center-align">
                    <a class="waves-effect waves-light btn-large ">Recuperar</a>
                  </p>
                </div>
                <div class="modal-footer">
                  <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                </div>
              </div>
            </div>
        </form>
      </div>
    </div>
</div>

<!--Se importan los archivos de JavaScript-->
<script src="../../resources/js/jquery-3.3.1.min.js"></script>
<script src="../../resources/js/materialize.min.js"></script>
<script src="../../resources/js/modal.js"></script>
<script src="../../resources/js/sweetalert.min.js"></script>
<script src="../../core/helpers/functions.js"></script>
<script src="../../core/controllers/dashboard/index.js"></script>
</body>

</html>