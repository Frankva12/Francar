$(document).ready(function () {
    showTable();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiEditoriales = '../../core/api/dashboard/editoriales.php?site=private&action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        content += `
            <tr>
                <td>${row.nombre_editorial}</td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_editorial})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_editorial})" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#tbody-read').html(content);
    initTable('tablaEditorial');
    $('select').formSelect();
    $('.tooltipped').tooltip();
}

//Función para obtener y mostrar los registros disponibles
function showTable() {
    $.ajax({
            url: apiEditoriales + 'read',
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
            url: apiEditoriales + 'create',
            type: 'post',
            data: new FormData($('#form-create')[0]),
            datatype: 'json',
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#form-create')[0].reset();
                    $('#modal-create').modal('close');
                    if (result.status == 1) {
                        sweetAlert(1, 'Editorial creada correctamente/Publisher created correctly', null);
                    } else if (result.status == 2) {
                        sweetAlert(3, 'Editorial creada/Publisher created ' + result.exception, null);
                    }

                    destroy('#tablaEditorial');
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
            url: apiEditoriales + 'get',
            type: 'post',
            data: {
                id_editorial: id
            },
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
                if (result.status) {
                    $('#form-update')[0].reset();
                    $('#id_editorial').val(result.dataset.id_editorial);
                    $('#update_editorial').val(result.dataset.nombre_editorial);
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
            url: apiEditoriales + 'update',
            type: 'post',
            data: new FormData($('#form-update')[0]),
            datatype: 'json',
            cache: false,
            contentType: false,
            processData: false
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-update').modal('close');
                    if (result.status == 1) {
                        sweetAlert(1, 'Editorial modificada correctamente/Publisher modify correctly', null);
                    } else if (result.status == 2) {
                        sweetAlert(3, 'Editorial modificada/Publisher modify ' + result.exception, null);
                    } else if (result.status == 3) {
                        sweetAlert(1, 'Editorial modificada/Publisher modiify ' + result.exception, null);
                    }

                    destroy('#tablaEditorial');
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

//Función para eliminar un registro seleccionado
function confirmDelete(id, file) {
    swal({
            title: 'Advertencia',
            text: '¿Quiere eliminar la editorial?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function (value) {
            if (value) {
                $.ajax({
                        url: apiEditoriales + 'delete',
                        type: 'post',
                        data: {
                            id_editorial: id,
                        },
                        datatype: 'json'
                    })
                    .done(function (response) {
                        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                        if (isJSONString(response)) {
                            const result = JSON.parse(response);
                            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                            if (result.status) {
                                if (result.status == 1) {
                                    sweetAlert(1, 'Editorial eliminada correctamente/Publisher removed correctly', null);
                                } else if (result.status == 2) {
                                    sweetAlert(2, 'Editorial eliminada/Publisher removed ' + result.exception, null);
                                }
                                showTable();
                            } else {
                                sweetAlert(1, 'Editorial eliminada correctamente/Publisher removed correctly', result.exception, null);
                                showTable();
                            }
                        } else {
                            swal({
                                title: 'Advertencia',
                                text: 'Registro ocupado, no se puede borrar editorial/Register taken, publisher cannot remove',
                                icon: 'error',
                                buttons: ['Aceptar'],
                                closeOnClickOutside: true,
                                closeOnEsc: true
                            })
                        }
                    })
                    .fail(function (jqXHR) {
                        //Se muestran en consola los posibles errores de la solicitud AJAX
                        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
                    });
            }
        });
}