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
  <h3 align="center" class="lang" key="titulo_libros">libros
    <a class="btn-floating black pulse" href="../../core/report/reporteLibrosVendidos.php">
      <i class="material-icons">book</i>
    </a>
  </h3>

  <nav>
    <div class="nav-wrapper cyan lighten-2">
      <div class="col s12">
        <a href="#!" class="breadcrumb"></a>
        <a href="private.php" class="breadcrumb lang" key="estadisticas">Estadisticas</a>
        <a href="libros.php" class="breadcrumb lang" key="titulo_libros">libros</a>
      </div>
    </div>
  </nav>
  <br>

  <!--Tabla donde se muestran los libros que hay en la tienda donde se puede modificar, eliminar y agregar-->
  <div class="container">
    <table class="highlight" id="tabla_libros">
      <thead>
        <tr>
          <th class="lang" key="Imagen">Imagen</th>
          <th class="lang" key="Nombre">Nombre</th>
          <th class="lang" key="Precio">Precio</th>
          <th class="lang" key="Cantidad">Cantidad</th>
          <th class="lang" key="Categoria">Categoría</th>
          <th class="lang" key="Editorial">Editorial</th>
          <th class="lang" key="Estado">Estado</th>
          <th class="lang" key="Acciones">Acciones</th>
        </tr>
      </thead>
      <tbody id="tbody-read">
      </tbody>
    </table>
    <!-- Botón para abrir ventana de nuevo registro -->
    <div class="input-field center-align col s12 m4">
      <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green lang" key="Agregar_libros"
        data-tooltip="Agregar"><i class="material-icons "></i>Agregar Libros</a>



      <a class="btn waves-effect indigo tooltipped modal-trigger green lang" key="Reporte_ventas"
        href="../../core/report/reporteLibrosVendidos.php"><i class="material-icons "></i>Reporte de ventas</a>


      <a class="btn waves-effect indigo tooltipped modal-trigger green lang" key="Reporte_ventas_categoria"
        href="../../core/report/reporteVentasporcat.php"><i class="material-icons"></i>Reporte de ventas por
        categoria</a>

      <a class="btn waves-effect indigo tooltipped modal-trigger green lang" key="Reporte_ventas_editorial"
        href="../../core/report/reporteVentasporedi.php"><i class="material-icons"></i>Reporte de ventas por
        editorial</a>
    </div>
  </div>

  </div>
  </div>

  <!-- Ventana para crear un nuevo registro -->
  <div id="modal-create" class="modal">
    <div class="modal-content">
      <h4 class="center-align lang" key="Agregar_libros">Crear libros</h4>
      <form method="post" id="form-create" enctype="multipart/form-data">
        <div class="row">

          <div class="input-field col s12 m6 ">
            <i class="material-icons prefix">note_add</i>
            <input id="create_nombre" type="text" name="create_nombre" class="validate" autocomplete="off" required />
            <label for="create_nombre" class="lang" key="Nombre_libro">Nombre del libro</label>
          </div>

          <div class="input-field col s12 m6 ">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="create_cantidad" type="number" name="create_cantidad" class="validate" max="999.99" min="0.00"
              step="any" autocomplete="off" required />
            <label for="create_cantidad" class="lang" key="Cantidad">Cantidad</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="create_precio" type="number" name="create_precio" class="validate" max="999.99" min="0.00"
              step="any" autocomplete="off" required />
            <label for="create_precio" class="lang" key="Precio">Precio</label>
          </div>

          <div class="input-field col s12 m6 ">
            <i class="material-icons prefix">description</i>
            <input id="create_descripcion" type="text" name="create_descripcion" class="validate" autocomplete="off"
              required />
            <label for="create_descripcion" class="lang" key="Descripcion">Descripción</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="create_autor" type="text" name="create_autor" class="validate" autocomplete="off" required />
            <label for="create_autor" class="lang" key="Autor">Autor</label>
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
              <input id="create_archivo" type="file" name="create_archivo" autocomplete="off" required />
            </div>

            <div class="file-path-wrapper">
              <input type="text" class="file-path validate" autocomplete="off" placeholder="Seleccione una imagen" />
            </div>

          </div>
        </div>
        <div class="col s12 m6">
          <p>
            <div class="switch">
              <span class="lang" key="Estado">Estado:</span>
              <label>
                <i class="material-icons">visibility_off</i>
                <input id="create_estado" type="checkbox" name="create_estado" autocomplete="off" checked />
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
      <h4 class="center-align lang" key="Modificar_libros">Modificar libros</h4>
      <form method="post" id="form-update" enctype="multipart/form-data">
        <input type="hidden" id="id_libro" name="id_libro" autocomplete="off" />
        <input type="hidden" id="imagen_libro" name="imagen_libro" autocomplete="off" />
        <div class="row">

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">note_add</i>
            <input id="update_nombre" type="text" name="update_nombre" class="validate" autocomplete="off" required />
            <label for="update_nombre" class="lang" key="Nombre">Nombre del libro</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="update_cantidad" type="number" name="update_cantidad" class="validate" max="999" min="0"
              step="any" autocomplete="off" required />
            <label for="update_cantidad" class="lang" key="Cantidad">Cantidad</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">add_circle_outline</i>
            <input id="update_precio" type="number" name="update_precio" class="validate" max="999.99" min="0.01"
              step="any" autocomplete="off" required />
            <label for="update_precio" class="lang" key="Precio">Precio</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">description</i>
            <input id="update_descripcion" type="text" name="update_descripcion" class="validate" autocomplete="off"
              required />
            <label for="update_descripcion" class="lang" key="Descripcion">Descripción</label>
          </div>

          <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input id="update_autor" type="text" name="update_autor" class="validate" autocomplete="off" required />
            <label for="update_autor" class="lang" key="Autor">Autor</label>
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
              <input id="update_archivo" type="file" name="update_archivo" autocomplete="off" required />
            </div>
            <div class="file-path-wrapper">
              <input type="text" class="file-path validate" placeholder="Seleccione una imagen" autocomplete="off" />
            </div>
          </div>
          <div class="col s12 m6">
            <p>
              <div class="switch">
                <span class="lang" key="Estado">Estado:</span>
                <label>
                  <i class="material-icons">visibility_off</i>
                  <input id="update_estado" type="checkbox" name="update_estado" autocomplete="off" checked />
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
  <script src="../../resources/js/modal.js"></script>
  <script src="../../resources/js/combo.js"></script>
  <script src="../../resources/js/datatables.min.js"></script>
  <script src="../../resources/js/dataTables.material.min.js"></script>
  <script src="../../resources/js/tabla.js"></script>
  <script src="../../core/controllers/dashboard/account.js"></script>
  <script src="../../resources/js/sweetalert.min.js"></script>
  <script src="../../resources/js/materialize.min.js"></script>
  <script src="../../resources/js/initialize.js"></script>
  <script src="../../core/helpers/functions.js"></script>
  <script src="../../core/helpers/traductor.js"></script>
  <script src="../../core/controllers/dashboard/libros.js"></script>

</html>