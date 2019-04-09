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
</head>
<!--Se hcae un contenedor donde se le pone lo que es el login para el administrador-->
<div class="container ">

  <body background="../../resources/img/login_imagen.jpg">
    <div id="login-page" class="row">
      <div class="col s12 z-depth-6 card-panel">
        <form class="login-form">
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
              <i class="material-icons prefix">mail_outline</i>
              <input class="validate" id="email" type="email">
              <label for="email" data-error="wrong" data-success="right">Correo</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">lock_outline</i>
              <input id="password" type="password">
              <label for="password">Contraseña</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <span>Recuerdame</span>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <a href="private.php" class="btn waves-effect grey darken-4 col s12">Iniciar sesion</a>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6 m6 l6">
            </div>

            <div class="input-field col s6 m6 l6">
              <p align='right'>
                <a class="waves-effect waves-light btn modal-trigger grey darken-4" href="#modal1">¿Olvidó su contraseña?
                </a>
              </p>
              <!-- Modal Structure -->
              <div id="modal1" class="modal">
                <div class="modal-content">
                  <h4 align='center'>¿Olvidaste tu contraseña?</h4>
                  <div class="input-field col s12">
                    <i class="material-icons prefix">mail_outline</i>
                    <input class="validate" id="email" type="email">
                    <label for="email" data-error="wrong" data-success="right">Correo</label>
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
  </body>

</html>