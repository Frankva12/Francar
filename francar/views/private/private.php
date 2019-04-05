<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../../resources/css/icon.css" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" media="screen,projection" />

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
    <div id="grafica">
      <!--Grafica global de la compañia mediante hightcharts donde hay 5 tipos de graficas manejadas en una sola-->
      <script>
        $(function ($) {
          $('#grafica').highcharts({
            title: {
              text: 'Grafica global'
            },
            xAxis: {
              categories: ['Santillana', 'Educame', 'Accion y aventura']
            },
            yAxis: {
              title: 'Porcentaje %',
              plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
              }]
            },
            tooltip: {
              valueSuffix: ' unidades'
            },
            legend: {
              layout: 'vertical',
              align: 'right',
              verticalAlign: 'middle',
              borderWidth: 0
            },
            series: [{
                type: 'column',
                name: 'Libros más vendidos por categoria',
                data: [60, 20, 20]
              },
              {
                name: 'Editorial favorita',
                data: [300, 230, 180]
              },
              {
                type: 'column',
                name: 'Finanzas semanales',
                data: [190, 170, 110]
              },
              {
                type: 'spline',
                name: 'Productos existentes',
                data: [50, 40, 80]
              },
              {
                name: 'Ventas',
                data: [30, 10, 50]
              }
            ],
            plotOptions: {
              line: {
                dataLabels: {
                  enabled: true
                }
              }
            }
          });
        });
      </script>
    </div>
  </div>
  </div>
  <!--Es el footer de nuestra pagina donde lleva la informacion de la tienda en linea-->
  <br>
  <?php
require("../../resources/pages/footer.php");
Footer::foot();
?>
</body>

</html>