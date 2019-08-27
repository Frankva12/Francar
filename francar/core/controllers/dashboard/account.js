$(document).ready(function () {
    //se inicializan los casos para graficar 
    graficar_categoria();
    graficar_editorial();
    graficar_cantidad_libros_vendidos();
    graficar_ventas_libros();
    grafica_ventas_categorias();
    ventas_por_categoria();
    ventas_por_editoriales();
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
$('#form-contrasenia').submit(function () {
    event.preventDefault();
    $.ajax({
            url: apiAccount + 'password',
            type: 'post',
            data: $('#form-contrasenia').serialize(),
            datatype: 'json'
        })
        .done(function (response) {
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if (result.status) {
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


//funcion para graficar la existencia de libros por editoriales
function graficar_editorial() {
    //se hacen los arreglos para poder recorrer las filas de la consulta
    var nombre = [];
    var cantidad = [];
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'graficar_editorial',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                //se recorren todos los datos que esten en las filas especificadas en el row
                nombre.push(row.nombre_editorial);
                cantidad.push(parseInt(row.cantidad));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_editorial("grafica_editorial", nombre, cantidad, "Existencia de libros por editorial")
        })

        //en caso de error se ejecuta esta funcion
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}

//funcion para graficar las existencias de los libros por categoria
function graficar_categoria() {
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'graficar_categoria',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se hacen los arreglos para poder recorrer las filas de la consulta
            var nombre1 = [];
            var cantidad1 = [];
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                //se recorren todos los datos que esten en las filas especificadas en el row
                nombre1.push(row.nombre_categoria);
                cantidad1.push(parseInt(row.cantidad));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_categoria("grafica_categoria", nombre1, cantidad1, "Existencia de libros por categoria")
        })
        //en caso de error se ejecuta el caso fail.
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}

//funcion para graficar la cantidad de libros vendidos 
function graficar_cantidad_libros_vendidos() {
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'libros_vendidos_cantidad',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se hacen los arreglos para poder recorrer las filas de la consulta
            var nombre2 = [];
            var cantidad2 = [];
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                //se recorren todos los datos que esten en las filas especificadas en el row
                nombre2.push(row.nombre_libro);
                cantidad2.push(parseInt(row.cantidad));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_ventas("cantidad_libros_vendidos", nombre2, cantidad2, "Cantidad de libros vendidos.")
        })

        //en caso de error se ejecuta esta funcion
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}

//grafica para  generar las ventas por libros
function graficar_ventas_libros() {
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'libros_ventas_ganancias',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se hacen los arreglos para poder recorrer las filas de la consulta
            var nombre2 = [];
            var precio1 = [];
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                nombre2.push(row.nombre_libro);
                precio1.push(parseInt(row.precio));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_cantidad_libros_vendidos("cantidad_ganancias_libros", nombre2, precio1, "Ventas de libros")
        })

        //en caso de error se ejecuta esta funcion
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}

//funcion para graficar las ventas por categorias
function ventas_por_categoria() {
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'ventas_categoria',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se hacen los arreglos para poder recorrer las filas de la consulta
            var nombre = [];
            var precio = [];
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                nombre.push(row.nombre_categoria);
                precio.push(parseInt(row.precio));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_ventas_categorias("venta_categoria", nombre, precio, "Cantidad de venta de libros por categorias")
        })
        //en caso de error se ejecuta esta funcion
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}

//funcion para graficar las ventas por editoriales
function ventas_por_editoriales() {
    //se manda a pedir los datos de la api
    $.ajax({
            url: apiLibros2 + 'ventas_editoriales',
            type: 'post',
            data: null,
            datatype: 'json'
        })
        .done(response => {
            //se hacen los arreglos para poder recorrer las filas de la consulta
            var nombre = [];
            var precio = [];
            //se genera un ciclo para poder recorrer las filas de la tabla de la base de datos
            const result = JSON.parse(response);
            result.dataset.forEach(row => {
                nombre.push(row.nombre_editorial);
                precio.push(parseInt(row.precio));
            });
            //se mandar los parametros de la funcion que se crea en el controlador de function.js los cuales son el id, xAxis, yAxis y legend
            grafica_ventas_editoriales("venta_editorial", nombre, precio, "Ventas por editoriales")
        })

        //en caso de error se ejecuta esta funcion
        .fail(function (jqXHR) {
            //Se muestran en consola los posibles errores de la solicitud AJAX
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });

}