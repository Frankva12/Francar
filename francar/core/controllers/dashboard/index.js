$(document).ready(function () {
    checkUsuarios();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/dashboard/usuarios.php?site=private&action=';

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
                    sweetAlert(3, dataset.exception, 'registrar.php');
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
                if (dataset.status == 1) {
                    sweetAlert(1, 'Autenticación correcta', 'private.php');
                    
                } else{
                    if (i >= 3) {
                        $.ajax({
                            url: apiSesion + 'bloquear',
                            type: 'post',
                            data: {alias: $('#alias_usuario').val()},
                            datatype: 'json'
                        })
                        .done(function (response){
                            if (isJSONString(response)) {
                                const result = JSON.parse(response);
                                if (result.status) {
                                    sweetAlert(4, 'Su usuario ha sido bloqueado', 'index.php');
                                    console.log(response);
                                }                            
                            }
                        })
                    }
                    else {
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
})