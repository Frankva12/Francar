$(document).ready(function () {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiUsuarios = '../../core/api/public/usuarios.php?site=public&action=';

//Función para obtener y mostrar los registros disponibles
function showTable() {
    $.ajax({
            url: apiUsuarios + 'read',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (!result.status) {
                    sweetAlert(4, result.exception, null);
                }
                fillTable(result.dataset);
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}

//Función para crear un nuevo registro
$('#form-create').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiUsuarios + 'create',
            type: 'post',
            data: $('#form-create').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#form-create')[0].reset();
                    $('#modal-create').modal('close');
                    sweetAlert(1, 'Usuario creado correctamente', null);

                    destroy('#tablaUsuarios');
                    showTable();
                } else {
                    sweetAlert(2, result.exception, null);
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

//Función para mostrar formulario con registro a modificar
function modalUpdate(id) {
    $.ajax({
            url: apiUsuarios + 'get',
            type: 'post',
            data: {
                id_cliente: id
            },
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
                if (result.status) {
                    $('#id_cliente').val(result.dataset.id_cliente);
                    $('#update_nombre_cliente').val(result.dataset.nombre_cliente);
                    $('#update_apellido_cliente').val(result.dataset.apellido_cliente);
                    $('#update_correo').val(result.dataset.correo);
                    $('#update_alias').val(result.dataset.alias_usuario);
                    $('#update_direccion').val(result.dataset.direccion);
                    $('#update_telefono').val(result.dataset.telefono);
                    (result.dataset.estado == 1) ? $('#update_estado').prop('checked', true): $('#update_estado').prop('checked', false);
                    M.updateTextFields();
                    $('#modal-update').modal('open');
                } else {
                    sweetAlert(2, result.exception, null);
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

//Función para modificar un registro seleccionado previamente
$('#form-update').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiUsuarios + 'update',
            type: 'post',
            data: $('#form-update').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-update').modal('close');
                    sweetAlert(1, 'Usuario modificado correctamente', null);

                    destroy('#tablaUsuarios');
                    showTable();
                } else {
                    sweetAlert(2, result.exception, null);
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