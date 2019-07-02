<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="../../resources/css/icon.css" rel="stylesheet">
  <link href="../../resources/css/tablas.css" rel="stylesheet">
  <!--Se importa el css de Materialize-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <link href="../../resources/css/tablas.css" rel="stylesheet">

  <link href="../../resources/css/material.min.css" rel="stylesheet">
  <link href="../../resources/css/dataTables.material.min.css" rel="stylesheet">
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
  <h3 align="center">libros
    <a class="btn-floating black pulse">
      <i class="material-icons">book</i>
    </a>
  </h3>

  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="private.php" class="breadcrumb">Estadisticas</a>
        <a href="libros.php" class="breadcrumb">libros</a>
      </div>
    </div>
  </nav>
  <br>

  <!--Tabla donde se muestran los libros que hay en la tienda donde se puede modificar, eliminar y agregar-->
  <div class="container">
    <table class="highlight" id="tabla_libros">
      <thead>
        <tr>
          <th>Imagen</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Categoría</th>
          <th>Editorial</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tbody-read">
      </tbody>
    </table>
    <!-- Botón para abrir ventana de nuevo registro -->
    <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green" data-tooltip="Agregar"><i
          class="material-icons"></i>Agregar Libros</a>
    </div>
  </div>
  </div>

  <!-- Ventana para crear un nuevo registro -->
  <div id="modal-create" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Crear libros</h4>
      <form method="post" id="form-create" enctype="multipart/form-data">
        <div class="row">

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">note_add</i>
            <input id="create_nombre" type="text" name="create_nombre" class="validate" required />
            <label for="create_nombre">Nombre del libro</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="create_cantidad" type="number" name="create_cantidad" class="validate" max="999.99" min="0.00"
              step="any" required />
            <label for="create_cantidad">Cantidad</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="create_precio" type="number" name="create_precio" class="validate" max="999.99" min="0.00"
              step="any" required />
            <label for="create_precio">Precio</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">description</i>
            <input id="create_descripcion" type="text" name="create_descripcion" class="validate" required />
            <label for="create_descripcion">Descripción</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_autor" type="text" name="create_autor" class="validate" required />
            <label for="create_autor">Autor</label>
          </div>

          <div class="input-field col s12 m6">
            <select id="create_categoria" name="create_categoria" class="form-control">
            </select>
          </div>

          <div class="input-field col s12 m6">
            <select id="create_editorial" name="create_editorial" class="form-control">
            </select>
          </div>

          <div class="file-field input-field col s12 m6">
            <div class="btn waves-effect">
              <span><i class="material-icons">image</i></span>
              <input id="create_archivo" type="file" name="create_archivo" required />
            </div>

            <div class="file-path-wrapper">
              <input type="text" class="file-path validate" placeholder="Seleccione una imagen" />
            </div>

          </div>
        </div>
        <div class="col s12 m6">
          <p>
            <div class="switch">
              <span>Estado:</span>
              <label>
                <i class="material-icons">visibility_off</i>
                <input id="create_estado" type="checkbox" name="create_estado" checked />
                <span class="lever"></span>
                <i class="material-icons">visibility</i>
              </label>
            </div>
          </p>
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
      <h4 class="center-align">Modificar libros</h4>
      <form method="post" id="form-update" enctype="multipart/form-data">
        <input type="hidden" id="id_libro" name="id_libro" />
        <input type="hidden" id="imagen_libro" name="imagen_libro" />
        <div class="row">

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">note_add</i>
            <input id="update_nombre" type="text" name="update_nombre" class="validate" required />
            <label for="update_nombre">Nombre del libro</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="update_cantidad" type="number" name="update_cantidad" class="validate" max="999" min="0"
              step="any" required />
            <label for="update_cantidad">Cantidad</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="update_precio" type="number" name="update_precio" class="validate" max="999.99" min="0.01"
              step="any" required />
            <label for="update_precio">Precio</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">description</i>
            <input id="update_descripcion" type="text" name="update_descripcion" class="validate" required />
            <label for="update_descripcion">Descripción</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="update_autor" type="text" name="update_autor" class="validate" required />
            <label for="update_autor">Autor</label>
          </div>

          <div class="input-field col s12 m6">
            <select id="update_categoria" name="update_categoria">
            </select>
          </div>

          <div class="input-field col s12 m6">
            <select id="update_editorial" name="update_editorial">
            </select>
          </div>

          <div class="file-field input-field col s12 m6">
            <div class="btn waves-effect">
              <span><i class="material-icons">image</i></span>
              <input id="update_archivo" type="file" name="update_archivo" required />
            </div>
            <div class="file-path-wrapper">
              <input type="text" class="file-path validate" placeholder="Seleccione una imagen" />
            </div>
          </div>
          <div class="col s12 m6">
            <p>
              <div class="switch">
                <span>Estado:</span>
                <label>
                  <i class="material-icons">visibility_off</i>
                  <input id="update_estado" type="checkbox" name="update_estado" checked />
                  <span class="lever"></span>
                  <i class="material-icons">visibility</i>
                </label>
              </div>
            </p>
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
  <script src="../../resources/js/images.js"></script>
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/combo.js"></script>
  <script src="../../resources/js/datatables.min.js"></script>
  <script src="../../resources/js/dataTables.material.min.js"></script>
  <script src="../../resources/js/tabla.js"></script>

  <script src="../../core/controllers/dashboard/account.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../core/helpers/functions.js"></script>
  <script src="../../core/controllers/dashboard/libros.js"></script>

</html>