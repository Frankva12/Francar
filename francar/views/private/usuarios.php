<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <link href="../../resources/css/tablas.css" rel="stylesheet">
  <!--Se importa el css de materialize-->
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
  <div class="container" id="myTable">
    <table class="highlight">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Alias</th>
          <th>Contraseña</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Correo</th>
          <th>Acciones</th>
        </tr>
      </thead>

      <tbody>
      </tbody>
    </table>
        <!-- Botón para abrir ventana de nuevo registro -->
        <div class="input-field center-align col s12 m4">
            <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green" data-tooltip="Agregar"><i align="center" class="material-icons"></i>Agregar Productos</a>
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
                  	<i class="material-icons prefix">note_add</i>
                  	<input id="create_nombre" type="text" name="create_nombres" class="validate" required/>
                  	<label for="create_nombre">Nombre</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_apellidos" class="validate"/>
                    <label for="create_descripcion">Apellido</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_alias" class="validate"/>
                    <label for="create_descripcion">Alias</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_contrasenia1" class="validate"/>
                    <label for="create_descripcion">contraseña</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_direccion" class="validate"/>
                    <label for="create_descripcion">direccion</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_telefono" class="validate"/>
                    <label for="create_descripcion">telefono</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">note_add</i>
                    <input id="create_descripcion" type="text" name="create_correo" class="validate"/>
                    <label for="create_descripcion">correo</label>
                </div>

            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>


<!-- Ventana para modificar un registro existente -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar usuario</h4>
        <form method="post" id="form-update">
            <input type="hidden" id="id_usuario" name="id_usuario"/>
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_nombres" type="text" name="update_nombres" class="validate" required/>
                    <label for="update_nombres">Nombres</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="update_apellidos" type="text" name="update_apellidos" class="validate" required/>
                    <label for="update_apellidos">Apellidos</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">correo</i>
                    <input id="update_correo" type="email" name="update_correo" class="validate" required/>
                    <label for="update_correo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="update_alias" type="text" name="update_alias" class="validate" required/>
                    <label for="update_alias">Alias</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="update_alias" type="text" name="update_telefono" class="validate" required/>
                    <label for="update_alias">telefono</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="update_alias" type="text" name="update_direccion" class="validate" required/>
                    <label for="update_alias">direccion</label>
                </div>

            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
require("../../resources/pages/footer.php");
Footer::foot();
?>
  <!--Se importan lo que son los archivos de JavaScript-->
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/carousel.js"></script>
  <script src="../../resources/js/parallax.js"></script>
  <script src="../../resources/js/images.js"></script>
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/search.js"></script>
  <script src="../../resources/js/combo.js"></script>
  <script src="../../resources/js/datatables.min.js"></script>
  <script src="../../resources/js/tabla.js"></script>
</body>

</html>