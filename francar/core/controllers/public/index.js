$(document).ready(function () {
    checkUsuarios();
    let params = new URLSearchParams(location.search);
    var token = params.get('token');
    $("#token").val(token);
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/public/usuarios.php?site=public&action=';

//Función para verificar si existen usuarios en el sitio privado
function checkUsuarios() {
    $.ajax({
            url: apiSesion + 'read',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                //Se comprueba que no hay usuarios registrados para redireccionar al registro del primer usuario
                if (dataset.status == 2) {
                    sweetAlert(3, dataset.exception, 'resgistrar.php');
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}


function sumarIntentos (alias_cliente)
{
    $.ajax({
        url: apiSesion + 'intentos',
        type: 'post',
        data: {
            alias_cliente: alias_cliente
        },
        datatype: 'json',
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            sweetAlert(2, 'Tiene 3 intentos disponibles para equivocarse/You have 3 attempts to be wrong ', null);
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

function bloquearIntentos (alias_cliente)
{
    $.ajax({
        url: apiSesion + 'BloquearIntentos',
        type: 'post',
        data: {
            alias_cliente: alias_cliente
        },
        datatype: 'json',
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            sweetAlert(2, 'Usted tiene 3 intentos, si no su usuario se bloqueara/You have 3 attempts, otherwise your user will be blocked', null);
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}



$('#form-sesion').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiSesion + 'login',
            type: 'post',
            data: $('#form-sesion').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
                if (dataset.status == 1) {
                    sweetAlert(1, 'Autenticación correcta/ Log in correctly', 'index.php');
                }else{
                    sweetAlert(2, dataset.exception, null);
                    let alias_cliente = $('#alias_cliente').val();
                    sumarIntentos(alias_cliente);
                    bloquearIntentos(alias_cliente);
                } 
            }
            else{
                console.log(response);
            }
        })
        .fail(function(jqXHR){
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
    }) 


/* 
var i = 0;
//Función para validar el usuario al momento de iniciar sesión
$('#form-sesion').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiSesion + 'login',
            type: 'post',
            data: $('#form-sesion').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
                if (dataset.status) {
                    sweetAlert(1, 'Autenticación correcta', 'index.php');
                } else {
                    if (i >= 3) {
                        $.ajax({
                                url: apiSesion + 'bloquear',
                                type: 'post',
                                data: {
                                    alias: $('#alias_cliente').val()
                                },
                                datatype: 'json'
                            })
                            .done(function (response) {
                                if (isJSONString(response)) {
                                    const result = JSON.parse(response);
                                    if (result.status) {
                                        sweetAlert(4, 'Su usuario ha sido bloqueado', 'index.php');
                                        console.log(response);
                                    }
                                }
                            })
                    } else {
                        i++
                        sweetAlert(2, dataset.exception + ' intento numero ' + i, null);
                        console.log(i);
                        console.log(response);
                    }
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}) */


function recuperacionContra() {
    event.preventDefault();
    //console.log("holaaaaaaa");
    $.ajax({
            url: apiSesion + 'Recuperacion',
            type: 'post',
            data: $('#form-recuperar').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                if (dataset.status == 1) {
                    sweetAlert(1, 'Su correo ha sido enviado correctamente/Your email has sent correctly', 'login.php');
                } else {
                    sweetAlert(3, dataset.exception, null);
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

$('#form-nueva-contrasena').submit(function () {
    event.preventDefault();
    console.log(token);
    $.ajax({
            url: apiSesion + 'RecuCambioContra',
            type: 'post',
            data: $("#form-nueva-contrasena").serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const dataset = JSON.parse(response);
                //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
                if (dataset.status == 1) {
                    sweetAlert(1, 'Se ha restaurado la contraseña exitosamente/Password has been successfully restored', 'index.php');
                } else {
                    sweetAlert(2, dataset.exception, null);
                }
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})