$(document).ready(function () {
    graficar_categoria();
    graficar_editorial();
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAccount = '../../core/api/dashboard/usuarios.php?site=private&action=';
const apiLibros2 = '../../core/api/dashboard/libros.php?site=private&action=';


//Función para cerrar la sesión del usuario
function signOff()

{
    swal({
            title: 'Advertencia',
            text: '¿Quiere cerrar la sesión?',
            icon: 'warning',
            buttons: ['Cancelar', 'Aceptar'],
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function (value) {
            if (value) {
                location.href = apiAccount + 'logout';
            } else {
                swal({
                    title: 'Enhorabuena',
                    text: 'Continúe con la sesión...',
                    icon: 'info',
                    button: 'Aceptar',
                    closeOnClickOutside: false,
                    closeOnEsc: false
                });
            }
        });
}

//Función para mostrar formulario de perfil de usuario
function modalProfile() {
    $.ajax({
            url: apiAccount + 'readProfile',
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
                    $('#profile_nombres').val(result.dataset.nombre_administrador);
                    $('#profile_apellidos').val(result.dataset.apellido_administrador);
                    $('#profile_correo').val(result.dataset.correo);
                    $('#profile_alias').val(result.dataset.alias_usuario);
                    M.updateTextFields();
                    $('#modal-profile').modal('open');
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

//Función para editar el perfil del usuario que ha iniciado sesión
$('#form-profile').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiAccount + 'editProfile',
            type: 'post',
            data: $('#form-profile').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-profile').modal('close');
                    sweetAlert(1, 'Perfil modificado correctamente', 'private.php');
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

//Función para cambiar la contraseña del usuario que ha iniciado sesión
$('#form-password').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiAccount + 'password',
            type: 'post',
            data: $('#form-password').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
                    $('#modal-password').modal('close');
                    sweetAlert(1, 'Contraseña cambiada correctamente', 'private.php');
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



function graficar_editorial() {
    var nombre = [];
    var cantidad = [];
    $.ajax({
            url: apiLibros2 + 'graficar_editorial',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                nombre.push(row.nombre_editorial);
                cantidad.push(parseInt(row.cantidad));
            });
            grafica_editorial("grafica_editorial", nombre, cantidad, "Existencia de libros por editorial")
        })
       
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        
}

function graficar_categoria() {
    $.ajax({
            url: apiLibros2 + 'graficar_categoria',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            var nombre1 = [];
            var cantidad1 = [];
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                nombre1.push(row.nombre_categoria);
                cantidad1.push(parseInt(row.cantidad));
            });
            grafica_categoria("grafica_categoria", nombre1, cantidad1, "Existencia de libros por categoria")
        })
       
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
        
}