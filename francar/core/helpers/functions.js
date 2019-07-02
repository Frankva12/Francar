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

function grafiquita(id, xAxis, yAxis, legend) {


    $('#'+id).highcharts({
        title: {
            text: 'Grafica global'
        },
        xAxis: {
            categories: [xAxis]
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
                name: [legend],
                data: [yAxis]
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
                name: 'libross existentes',
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
}