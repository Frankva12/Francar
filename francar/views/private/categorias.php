<html lang="es">

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


    <h3 align="center">Categorias
        <a class="btn-floating black pulse">
            <i class="material-icons">book</i>
        </a>
    </h3>
    <nav>
        <div class="nav-wrapper cyan lighten-2">
            <div class="col s12">
                <a href="#!" class="breadcrumb"></a>
                <a href="private.php" class="breadcrumb">Estadisticas</a>
                <a href="categorias.php" class="breadcrumb">Categorias</a>
            </div>
        </div>
    </nav>
    <br>
    <!--Se hace una tabla donde iran las categorias de los libros que se poseen-->
    <div class="container" id="myTable">
        <table class="display example">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>Descripción</th>
                    <th>Acciones</th>

                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Romantico</td>
                    <td> Descripción </td>
                    <td>
                        <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                            <i class="material-icons left">create</i>Editar</a>
                        <a class="waves-effect  red darken-2 btn-small">
                            <i class="material-icons left">delete_sweep</i>Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>Policial</td>
                    <td> Descripción
                    </td>
                    <td>
                        <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                            <i class="material-icons left">create</i>Editar</a>
                        <a class="waves-effect  red darken-2 btn-small">
                            <i class="material-icons left">delete_sweep</i>Eliminar</a>
                    </td>
                </tr>
                <tr>
                    <td>Aventura</td>
                    <td> Descripción </td>
                    <td>
                        <a class="waves-effect waves-light btn modal-trigger cyan darken-4" href="#modal2">
                            <i class="material-icons left">create</i>Editar</a>
                        <a class="waves-effect  red darken-2 btn-small">
                            <i class="material-icons left">delete_sweep</i>Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h1 align="center">
            <a align="center" class="waves-effect waves-light btn modal-trigger light-green" href="#modal1">Agregar
                categorias</a>
        </h1>
    </div>

    <!--Se hace el modal de agregar categorias-->
    <div id="modal1" class="modal">
        <h4 align="center">AGREGAR CATEGORIAS
            <a class="btn-floating black pulse">
                <i class="material-icons">add_circle</i>
            </a>
        </h4>
        <div class="row">
            <form method="post" id="form-create" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s12 m11">
                        <i class="material-icons prefix">book</i>
                        <input id="create_nombre" type="text" name="create_nombre" class="validate" required />
                        <label for="create_nombre">Nombre categoria</label>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12 m11">
                                <i class="material-icons prefix">edit</i>
                                <input id="create_descripcion" type="text" name="create_descripcion" class="validate" />
                                <label for="create_descripcion">Descripción</label>
                            </div>
                        </div>
                    </form>
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

    <!--Se hace el modal de editar categorias-->
    <div id="modal2" class="modal">
        <h3 align="center">EDITAR CATEGORIAS
            <a class="btn-floating black pulse">
                <i class="material-icons">create</i>
            </a>
        </h3>
        <hr>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s11">
                        <i class="material-icons prefix">book</i>
                        <input id="text" type="text" class="validate">
                        <label for="text">Categoria</label>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s11">
                                <i class="material-icons prefix">edit</i>
                                <textarea id="textarea1" class="materialize-textarea"></textarea>
                                <label for="textarea1">Descripcion</label>
                            </div>
                        </div>
                    </form>
                </div>
                <p class="center-align">
                    <a class="waves-effect waves-light btn-large">Agregar categorias</a>
                </p>
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