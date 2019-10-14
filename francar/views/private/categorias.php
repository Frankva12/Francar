<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../resources/css/icon.css" rel="stylesheet">
    <link href="../../resources/css/tablas.css" rel="stylesheet">
    <!--Se importa el css de materialize-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
    <link rel="icon" type="ico" href="../../resources/img/icono.ico">
    <link type="text/css" rel="stylesheet" href="../../resources/css/material.min.css" media="screen,projection">
    <link type="text/css" rel="stylesheet" href="../../resources/css/dataTables.material.min.css"
        media="screen,projection">
    <!--Deja que la pagina web sea responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../../resources/js/jquery-3.3.1.min.js"></script>
    <script src="../../resources/js/highcharts.js"></script>
    <script src="../../resources/js/modules.js"></script>
    <title>Librería Francar</title>
</head>

<body background="">
    <?php
  require("../../core/helpers/dashboard/menu.php");
  inicio::navigate();
  ?>


    <h3 align="center" class="lang" key="Categorias_menu">Categorias
        <a class="btn-floating black pulse" href="../../core/report/reporteVentasporcat.php">
            <i class="material-icons">book</i>
        </a>
    </h3>
    <nav>

        <div class="nav-wrapper cyan lighten-2">

            <div class="col s12">
                <a href="#!" class="breadcrumb"></a>
                <a href="private.php" class="breadcrumb lang" key="estadisticas">Estadisticas</a>
                <a href="categorias.php" class="breadcrumb lang" key="Categorias_menu">Categorias</a>
            </div>

        </div>

    </nav>

    <br>

    <!--Se hace una tabla donde iran las categorias de los libros que se poseen-->
    <div class="container">
        <table class="highlight" id="tablaCategorias">
            <thead>
                <tr>
                    <th class="lang" key="Imagen">Imagen</th>
                    <th class="lang" key="Categoria">Categoria</th>
                    <th class="lang" key="Descripcion">Descripción</th>
                    <th class="lang" key="Acciones">Acciones</th>
                </tr>
            </thead>

            <tbody id="tbody-read">

            </tbody>

        </table>


        <!-- Botón para abrir ventana de nuevo registro -->
        <div class="input-field center-align col s12 m4">
            <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green lang" key="Agregar_categorias"
                data-tooltip="Agregar"><i align="center" class="material-icons"></i>Agregar Categorias</a>
        </div>

    </div>


    <!-- Ventana para crear un nuevo registro -->
    <div id="modal-create" class="modal">
        <div class="modal-content">
            <h4 class="center-align lang" key="Agregar_categorias">Crear categoría</h4>
            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="row">

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="create_categoria" type="text" name="create_categoria" class="validate" minlength="5"
                            autocomplete="off" required />
                        <label for="create_categoria" class="lang" key="Categoria">Categoria</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">description</i>
                        <input id="create_descripcion" type="text" name="create_descripcion" class="validate"
                            autocomplete="off" minlength="5" />
                        <label for="create_descripcion" class="lang" key="Descripcion">Descripción</label>
                    </div>

                    <div class="file-field input-field col s12 m6">

                        <div class="btn waves-effect">
                            <span><i class="material-icons">image</i></span>
                            <input id="create_imagen" type="file" name="create_imagen" autocomplete="off" required />
                        </div>

                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Seleccione una imagen"
                                autocomplete="off" />
                        </div>

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
            <h4 class="center-align lang" key="Modificar_categoria">Modificar categoría</h4>
            <form method="post" id="form-update" enctype="multipart/form-data">

                <input type="hidden" id="id_categoria" name="id_categoria" autocomplete="off" />
                <input type="hidden" id="imagen_categoria" name="imagen_categoria" autocomplete="off" />

                <div class="row">
                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">note_add</i>
                        <input id="update_nombre" type="text" name="update_nombre" class="validate" autocomplete="off"
                            required />
                        <label for="update_nombre" class="lang" key="Categoria">Categoria</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">description</i>
                        <input id="update_descripcion" type="text" name="update_descripcion" class="validate"
                            autocomplete="off" />
                        <label for="update_descripcion" class="lang" key="Descripcion">Descripción</label>
                    </div>

                    <div class="file-field input-field col s12 m6">

                        <div class="btn waves-effect">
                            <span><i class="material-icons">image</i></span>
                            <input id="update_archivo" type="file" name="update_archivo" autocomplete="off" />
                        </div>

                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Seleccione una imagen"
                                autocomplete="off" />
                        </div>

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
    <script src="../../resources/js/modal.js"></script>
    <script src="../../resources/js/combo.js"></script>
    <script src="../../resources/js/initialize.js"></script>
    <script src="../../resources/js/datatables.min.js"></script>
    <script src="../../resources/js/dataTables.material.min.js"></script>
    <script src="../../resources/js/tabla.js"></script>
    <script src="../../core/controllers/dashboard/account.js"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../core/helpers/functions.js"></script>
    <script src="../../core/helpers/traductor.js"></script>
    <script src="../../core/controllers/dashboard/categorias.js"></script>

</html>