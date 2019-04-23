<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />
  <link rel="icon" type="ico" href="../../resources/img/icono.ico">
  <link href="../../resources/css/material.min.css" rel="stylesheet">
  <link href="../../resources/css/dataTables.material.min.css" rel="stylesheet">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../../resources/js/jquery-3.3.1.min.js"></script>
  <script src="../../resources/js/highcharts.js"></script>
  <script src="../../resources/js/modules.js"></script>

  <title>Libreria Francar</title>


</head>

<body background="../../resources/img/fondo_private.jpg">
  <?php
    require("../../resources/pages/menu.php");
    inicio::navigate();
  ?>

  <div class="container white">
    <h3 align="center">Libreria Francar
      <a class="btn-floating black pulse">
        <i class="material-icons">book</i>
      </a>
    </h3>
    <nav>
      <div class="nav-wrapper blue">
        <div class="col s12">
          <a href="#!" class="breadcrumb"></a>
          <a href="#!" class="breadcrumb">Estadisticas</a>
        </div>
      </div>
    </nav>
    <br>
    <?php
      require("../../resources/pages/grafica.php");
      Graficas::grafica();
    ?>
    <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
    <br>
    <?php
        require("../../resources/pages/footer.php");
        Footer::foot();
        ?>
</body>

</html>