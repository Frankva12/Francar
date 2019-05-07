<?php
  class Graficas{
      public static function grafica(){
            echo("<div id='grafica' class='container'>
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
        </div>");
      }
  }
?>