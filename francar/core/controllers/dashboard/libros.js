$(document).ready(function () {
    showTable();
    showSelectCategorias('create_categoria', null);
    ShowSelectEditorial('create_editorial', null);
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiLibros = '../../core/api/dashboard/libros.php?site=private&action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows) {
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function (row) {
        (row.estado == 1) ? icon = 'visibility': icon = 'visibility_off';
        content += `
            <tr>
                <td><img src="../../resources/img/libros/${row.imagen_libro}" class="materialboxed" height="100"></td>
                <td>${row.nombre_libro}</td>
                <td>${row.precio}</td>
                <td>${row.cantidad}</td>
                <td>${row.nombre_categoria}</td>
                <td>${row.nombre_editorial}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="modalUpdate(${row.id_libro})" class="blue-text tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="confirmDelete(${row.id_libro}, '${row.imagen_libro}')" class="red-text tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    $('#tbody-read').html(content);
    initTable('tabla_libros');
    $('select').formSelect();
    $('.materialboxed').materialbox();
    $('.tooltipped').tooltip();
}

//Función para obtener y mostrar los registros disponibles
function showTable() {
    $.ajax({
            url: apiLibros + 'read',
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

//Función para cargar las categorías en el select del formulario
function showSelectCategorias(idSelect, value) {
    $.ajax({
            url: apiLibros + 'readCategoria',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    if (!value) {
                        content += '<option value="" disabled selected>Seleccione una opción</option>';
                    }
                    result.dataset.forEach(function (row) {
                        if (row.id_categoria != value) {
                            content += `<option value="${row.id_categoria}">${row.nombre_categoria}</option>`;
                        } else {
                            content += `<option value="${row.id_categoria}" selected>${row.nombre_categoria}</option>`;
                        }
                    });
                    $('#' + idSelect).html(content);
                } else {
                    $('#' + idSelect).html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
            } else {
                console.log(response);
            }
        })
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
}


//Función para cargar las categorías en el select del formulario
function ShowSelectEditorial(idSelect, value) {
    $.ajax({
            url: apiLibros + 'readEditorial',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    let content = '';
                    if (!value) {
                        content += '<option value="" disabled selected>Seleccione una opción</option>';
                    }
                    result.dataset.forEach(function (row) {
                        if (row.id_editorial != value) {
                            content += `<option value="${row.id_editorial}">${row.nombre_editorial}</option>`;
                        } else {
                            content += `<option value="${row.id_editorial}" selected>${row.nombre_editorial}</option>`;
                        }
                    });
                    $('#' + idSelect).html(content);
                } else {
                    $('#' + idSelect).html('<option value="">No hay opciones</option>');
                }
                $('select').formSelect();
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
            url: apiLibros + 'create',
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
                        sweetAlert(1, 'libro creado correctamente/book created correctly', null);
                        destroy('#tabla_libros');
                    } else if (result.status == 2) {
                        sweetAlert(3, 'libro creado/book created ' + result.exception, null);
                    }
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
            url: apiLibros + 'get',
            type: 'post',
            data: {
                id_libro: id
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
                    $('#id_libro').val(result.dataset.id_libro);
                    $('#imagen_libro').val(result.dataset.imagen_libro);
                    $('#update_nombre').val(result.dataset.nombre_libro);
                    $('#update_cantidad').val(result.dataset.cantidad);
                    $('#update_precio').val(result.dataset.precio);
                    $('#update_descripcion').val(result.dataset.descripcion);
                    $('#update_autor').val(result.dataset.autor);
                    (result.dataset.estado == 1) ? $('#update_estado').prop('checked', true): $('#update_estado').prop('checked', false);
                    showSelectCategorias('update_categoria', result.dataset.id_categoria);
                    ShowSelectEditorial('update_editorial', result.dataset.id_editorial);
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
            url: apiLibros + 'update',
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
                        sweetAlert(1, 'libro modificado correctamente/book modify correctly', null);
                    } else if (result.status == 2) {
                        sweetAlert(3, 'libro modificado/book modify ' + result.exception, null);
                    } else if (result.status == 3) {
                        sweetAlert(1, 'libro modificado/book modify ' + result.exception, null);
                    }
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
            text: '¿Quiere eliminar el libro?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function (value) {
            if (value) {
                $.ajax({
                        url: apiLibros + 'delete',
                        type: 'post',
                        data: {
                            id_libro: id,
                            imagen_libro: file
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
                                    sweetAlert(1, 'libro eliminado correctamente/book removed correctly', null);
                                } else if (result.status == 2) {
                                    sweetAlert(3, 'libro eliminado/book removed ' + result.exception, null);
                                }

                                destroy('#tabla_libros');
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
            }
        });
}