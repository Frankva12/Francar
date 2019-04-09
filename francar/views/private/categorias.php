<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
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

  <div class="container white">
    <nav class=" brown lighten-5">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search">
              <i class="material-icons">search</i>
            </label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>
  <br>
  <!--Se hace una tabla donde iran las categorias de los libros que se poseen-->
  <div class="container">
    <table class="striped">
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
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
        <tr>
          <td>Policial</td>
          <td> Descripción
          </td>
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
        <tr>
          <td>Aventura</td>
          <td> Descripción </td>
          <td><a class="waves-effect cyan darken-4 btn-small"><i class="material-icons left">create</i>Editar</a>
            <a class="waves-effect  red darken-2 btn-small"><i class="material-icons left">delete_sweep</i>Eliminar</a>
          </td>
        </tr>
      </tbody>
    </table>
    <h1 align="center">
        <a class="waves-effect green btn-small" href="#modal-create">
          <i class="material-icons left">add_circle</i>Agregar</a>
    </h1>
  </div>
  </div>

  <div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Crear producto</h4>
        <form method="post" id="form-create" enctype="multipart/form-data">
            <div class="row">
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">note_add</i>
                  	<input id="create_nombre" type="text" name="create_nombre" class="validate" required/>
                  	<label for="create_nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">shopping_cart</i>
                  	<input id="create_precio" type="number" name="create_precio" class="validate" max="999.99" min="0.01" step="any" required/>
                  	<label for="create_precio">Precio ($)</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">description</i>
                  	<input id="create_descripcion" type="text" name="create_descripcion" class="validate" required/>
                  	<label for="create_descripcion">Descripción</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="create_categoria" name="create_categoria">
                    </select>
                </div>
              	<div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect">
                        <span><i class="material-icons">image</i></span>
                        <input id="create_archivo" type="file" name="create_archivo" required/>
                    </div>
                    <div class="file-path-wrapper">
                        <input type="text" class="file-path validate" placeholder="Seleccione una imagen de 500x500"/>
                    </div>
                </div>
                <div class="col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="create_estado" type="checkbox" name="create_estado" checked/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Crear"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <?php
require("../../resources/pages/footer.php");
Footer::foot();
?>
</body>

</html>