//Función para comprobar si una cadena tiene formato JSON
function isJSONString(string) {
    try {
        if (string != "[]") {
            JSON.parse(string);
            return true;
        } else {
            return false;
        }
    } catch (error) {
        return false;
    }
}

//Función para manejar los mensajes de notificación al usuario
function sweetAlert(type, text, url) {
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Aviso";
            icon = "info";
    }
    if (url) {
        swal({
                title: title,
                text: text,
                icon: icon,
                button: 'Aceptar',
                closeOnClickOutside: false,
                closeOnEsc: false
            })
            .then(function (value) {
                console.log(value);
                location.href = url
            });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }

}

//funcion para graficar existencia de libros por editorial
function grafica_editorial(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            //titulo de la grafica
            text: 'Existencia de libros por editorial'
        },
        subtitle: {
            //subtitulo de la grafica
            text: 'La existencia de los libros dependiendo de la editorial a la que pertenece cada uno.'
        },
        xAxis: {
            //categorias de la grafica es decir los nombres a los que referencian los datos
            categories: xAxis
        },
        yAxis: {
            //las propiedades que presentaran los datos
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            //en que se representan los datos
            valueSuffix: ' unidades'
        },
        legend: {
            //la propiedad que tendra el legend de la grafica
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0,
            reversed: true
        },
        series: [{
            //se especifica el tipo de grafica, su nombre, y los datos que esta presenta
            type: 'column',
            name: legend,
            data: yAxis
        }],
        //color de la grafica
        colors: ['silver'],
        plotOptions: {
            series: {
                //propiedades adicionales de la grafica
                stacking: 'normal'
            }
        },
    });
}

//funcion para mostrar la existencia de libros por categoria
function grafica_categoria(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            text: 'Existencia de libros por categoria'
        },
        subtitle: {
            text: 'La existencia de los libros dependiendo de la categoria a la que pertenece cada uno.'
        },
        xAxis: {
            categories: xAxis
        },
        yAxis: {
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#003399'
            }]
        },

        tooltip: {
            valueSuffix: ' libros'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            type: 'area',
            name: legend,
            data: yAxis,
        }],
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                }
            }
        },

        colors: ['teal'],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
            },
            stops: [
                [0, '#003399'],
                [1, '#3366AA']
            ]
        }
    });
}


function grafica_ventas(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            text: legend,
        },
        subtitle: {
            text: 'La venta de libros en sus unidades fisicas.'
        },
        xAxis: {
            categories: xAxis
        },
        yAxis: {
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#003399'
            }]
        },

        tooltip: {
            valueSuffix: ' libros'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            type: 'spline',
            name: legend,
            data: yAxis,
        }],
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                }
            }
        },

        colors: ['skyblue'],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
            },
            stops: [
                [0, '#003399'],
                [1, '#3366AA']
            ]
        }
    });
}


function grafica_cantidad_libros_vendidos(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            //titulo de la grafica 
            text: legend,
        },
        subtitle: {
            //subtitulo de la grafica
            text: 'Cuantos dinero se ha adquirido con la venta de los libros.'
        },
        xAxis: {
            //las categorias es decir los nombres a los que se refiere los datos
            categories: xAxis
        },
        yAxis: {
            //propiedades de los datos, es decir como ellos se comportan en la grafica
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#003399'
            }]
        },

        tooltip: {
            //como se representan los datos
            valueSuffix: '$'
        },
        legend: {
            //propiedades del legend en la grafica
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            //se especifica el tipo, los datos y los nombres
            type: 'line',
            name: legend,
            data: yAxis,
        }],
        plotOptions: {
            line: {
                dataLabels: {
                    //propiedades adicionales de la grafica
                    enabled: true
                }
            }
        },

        //color de la grafica
        colors: ['navy'],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
            },
            stops: [
                [0, '#003399'],
                [1, '#3366AA']
            ]
        }
    });
}

//funcion para graficar las ventas por categoria
function grafica_ventas_categorias(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            //titulo de la grafica
            text: legend,
        },
        subtitle: {
            //subtitulo de la grafica
            text: 'Cuanto dinero se ha obtenido filtrado en categorias de los libros.'
        },
        xAxis: {
            //categorias de la grafica es decir los nombres que poseeran los datos
            categories: xAxis
        },
        yAxis: {
            //propiedades de los datos
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#003399'
            }]
        },

        tooltip: {
            //como se representan los datos
            valueSuffix: '$'
        },
        legend: {
            //propiedades del legend en la grafica
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            //se especifica el tipo, los datos y los nombres
            type: 'spline',
            name: legend,
            data: yAxis,
        }],
        //propiedades adicionales de la grafica
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                }
            }
        },

        //color de la grafica
        colors: ['cornflowerblue'],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
            },
            stops: [
                [0, '#003399'],
                [1, '#3366AA']
            ]
        }
    });
}


function grafica_ventas_editoriales(id, xAxis, yAxis, legend) {
    //se ocupan los parametros que se mandaron posteriormente del controlador
    $('#' + id).highcharts({
        title: {
            //titulo de la grafica
            text: legend,
        },
        subtitle: {
            //subtitulo de la grafica
            text: 'Cuanto dinero se ha obtenido filtrado en edioriales de los libros.'
        },
        xAxis: {
            //categorias de la grafica es decir los nombres a los que se refieren los datos
            categories: xAxis
        },
        yAxis: {
            //propiedades de los datos
            title: 'Porcentaje %',
            plotLines: [{
                value: 0,
                width: 1,
                color: '#003399'
            }]
        },

        tooltip: {
            //como se representan los datos
            valueSuffix: '$'
        },
        legend: {
            //propiedades del legend en la grafica
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            //se especifica el tipo, los datos y los nombres
            type: 'bar',
            name: legend,
            data: yAxis,
        }],
        //propiedades adicionales de la grafica
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                }
            }
        },

        //color de la grafica
        colors: ['midnightblue'],
        color: {
            linearGradient: {
                x1: 0,
                x2: 0,
                y1: 0,
                y2: 1
            },
            stops: [
                [0, '#003399'],
                [1, '#3366AA']
            ]
        }
    });
}