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

    <body background="../../resources/img/biblioteca.jpg">
        <div id="login-page" class="row center-align">
            <div class="col s12 m12 l12 z-depth-6 card-panel center-align">
                <form method="post" id="form-nueva-contrasena">
                    <div class="row blue lighten-1">
                        <br>
                        <h4 class="lang" key="bienvenidos">Bienvenidos.</h4>
                        <i align="center" class="material-icons medium">account_circle</i>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="contra_nueva1" type="password" name="contra_nueva1" class="validate"
                                minlength="5" maxlength="20" autocomplete="off" required />
                            <label for="contra_nueva1" class="lang" key="Contraseña_nueva">Contraseña nueva</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="contra_nueva2" type="password" name="contra_nueva2" class="validate"
                                minlength="5" maxlength="20" autocomplete="off" required />
                            <label for="contra_nueva2" class="lang" key="Confirmar_contraseña">Confirmar
                                contraseña</label>
                            <input type="hidden" id="token" name="token" value="">
                        </div>
                    </div>
                    <div class="col s12 center-align">
                        <button type="submit" class="btn waves-effect black tooltipped" id="botonContraNueva"
                            data-tooltip="Ingresar"><i class="material-icons">send</i></button>
                        <br>
                        <br>
                    </div>
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
            </form>
        </div>
</div>
</div>
</body>

<!--Se importan los archivos de JavaScript-->
<script src="../../resources/js/jquery-3.3.1.min.js"></script>
<script src="../../resources/js/materialize.min.js"></script>
<script src="../../resources/js/modal.js"></script>
<script src="../../resources/js/initialize.js"></script>
<script src="../../resources/js/sweetalert.min.js"></script>
<script src="../../core/helpers/functions.js"></script>
<script src="../../core/controllers/public/index.js"></script>
<script src="../../core/helpers/traductor.js"></script>

</html>