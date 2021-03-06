<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../../resources/css/icon.css" rel="stylesheet">
    <link rel="icon" type="ico" href="../../resources/img/icono.ico">
    <link href="../../resources/css/tablas.css" rel="stylesheet">
    <!--Importa el css de materialize-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />

    <link href="../../resources/css/material.min.css" rel="stylesheet">
    <link href="../../resources/css/dataTables.material.min.css" rel="stylesheet">
    <!--Deja que la pagina web sea responsive-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="../../resources/js/jquery-3.3.1.min.js"></script>
    <script src="../../resources/js/highcharts.js"></script>
    <script src="../../resources/js/modules.js"></script>

    <title>Libreria Francar</title>
</head>

<body>
    <?php
    require("../../core/helpers/dashboard/menu.php");
    inicio::navigate();
  ?>

    <!--Se pone lo que es el titulo-->
    <h4 align="center" class="lang" key="Editoriales_menu">Editoriales
        <a class="btn-floating black pulse" href="../../core/report/reporteVentasporedi.php">
            <i class="material-icons">book</i>
        </a>
    </h4>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <div class="col s12">
                <a href="#!" class="breadcrumb"></a>
                <a href="private.php" class="breadcrumb lang" key="estadisticas">Estadisticas</a>
                <a href="editoriales.php" class="breadcrumb lang" key="Editoriales_menu">Editoriales</a>
            </div>
        </div>
    </nav>
    <br>

    <!--Se hace una tabla con el nombre de cada editorial-->
    <div class="container">
        <table class="highlight" id="tablaEditorial">
            <thead>
                <tr>
                    <th class="lang" key="Editoriales_menu">Editoriales</th>
                    <th class="lang" key="Acciones">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-read">
            </tbody>
        </table>


        <!-- Botón para abrir ventana de nuevo registro -->
        <div class="input-field center-align col s12 m4 ">
            <a href="#modal-create" class="btn waves-effect indigo tooltipped modal-trigger green lang"
                key="Agregar_editorial" data-tooltip="Agregar">
                <i class="material-icons"></i>Agregar Editorial</a>
        </div>
    </div>
    </div>

    <!--Ventana para crear un nuevo registro-->
    <div id="modal-create" class="modal">
        <div class="modal-content">
            <h4 class="center-align lang" key="Agregar_editorial">Crear editorial</h4>
            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="row">

                    <div class="input-field col s12 m6">
                        <i class="material-icons prefix">description</i>
                        <input id="create_editorial" type="text" name="create_editorial" class="validate" minlength="3"
                            maxlength="80" autocomplete="off" required />
                        <label for="create_editorial" class="lang" key="Editorial">Editorial</label>
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
            <h4 class="center-align lang" key="Modificar_editorial">Modificar editorial</h4>
            <form method="post" id="form-update" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="id_editorial" type="hidden" name="id_editorial" autocomplete="off" required />
                        <i class="material-icons prefix">description</i>
                        <input id="update_editorial" type="text" name="update_editorial" class="validate"
                            autocomplete="off" minlength="5" maxlength="80" required />
                        <label for="update_editorial" class="lang" key="Nombre">Nombre editorial</label>
                    </div>
                    <div class="row center-align">
                        <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                                class="material-icons">cancel</i></a>
                        <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i
                                class="material-icons">save</i></button>
                    </div>
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
    <script src="../../resources/js/tabla.js"></script>
    <script src="../../resources/js/datatables.min.js"></script>
    <script src="../../resources/js/dataTables.material.min.js"></script>
    <script src="../../core/controllers/dashboard/account.js"></script>
    <script src="../../resources/js/sweetalert.min.js"></script>
    <script src="../../resources/js/materialize.min.js"></script>
    <script src="../../resources/js/initialize.js"></script>
    <script src="../../core/helpers/functions.js"></script>
    <script src="../../core/helpers/traductor.js"></script>
    <script src="../../core/controllers/dashboard/editoriales.js"></script>
</body>

</html>