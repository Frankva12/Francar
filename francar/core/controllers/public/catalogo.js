$(document).ready(function()
{
    $('.slider').slider();
    readCategorias();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCatalogo = '../../core/api/productos.php?site=commerce&action=';

//Función para obtener y mostrar las categorías de productos
function readCategorias()
{
    $.ajax({
        url: apiCatalogo + 'readCategorias',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                result.dataset.forEach(function(row){
                    content += `
                        <div class="col s12 m6 l4">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="../../resources/img/categorias/${row.imagen_categoria}">
                                </div>
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">${row.nombre_categoria}<i class="material-icons right">more_vert</i></span>
                                    <p class="center"><a href="#" onclick="readProductosCategoria(${row.id_categoria}, '${row.nombre_categoria}')" class="tooltipped" data-tooltip="Ver más"><i class="material-icons small">local_cafe</i></a></p>
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">${row.nombre_categoria}<i class="material-icons right">close</i></span>
                                    <p>${row.descripcion_categoria}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#title').text('Nuestro catálogo');
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada
function readProductosCategoria(id, categoria)
{
    $('#slider').hide();
    $.ajax({
        url: apiCatalogo + 'readProductos',
        type: 'post',
        data:{
            id_categoria: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                result.dataset.forEach(function(row){
                    content += `
                        <div class="col s12 m6 l4">
                            <div class="card hoverable">
                                <div class="card-image">
                                    <img src="../../resources/img/productos/${row.imagen_producto}" class="materialboxed">
                                    <a href="#" onclick="getProducto(${row.id_producto})" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-tooltip="Ver detalle"><i class="material-icons">add</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">${row.nombre_producto}</span>
                                    <p>Precio(US$) ${row.precio_producto}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#title').text('Categoría: ' + categoria);
                $('#catalogo').html(content);
                $('.materialboxed').materialbox();
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Función para obtener y mostrar los datos del producto seleccionado
function getProducto(id)
{
    $.ajax({
        url: apiCatalogo + 'detailProducto',
        type: 'post',
        data:{
            id_producto: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = `
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="../../resources/img/productos/${result.dataset.imagen_producto}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3 class="header">${result.dataset.nombre_producto}</h3>
                                <p>${result.dataset.descripcion_producto}</p>
                                <p><b>Precio(US$) ${result.dataset.precio_producto}</b></p>
                            </div>
                            <div class="card-action">
                                <form method="post" id="form-cantidad">
                                    <div class="row center">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">list</i>
                                            <input id="cantidad" type="number" name="cantidad" min="1" class="validate">
                                            <label for="cantidad">Cantidad</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <button type="submit" class="btn waves-effect waves-light blue tooltipped" data-tooltip="Agregar al carrito"><i class="material-icons">add_shopping_cart</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                $('#title').text('Detalles del producto');
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
