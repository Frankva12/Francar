$(document).ready(function()
{
    $('.slider').slider();
    readCategorias();
})

// Constante para establecer la ruta y parámetros de comunicación con la API
const api = '../../core/api/public/categorias.php?action=';

// Función para obtener y mostrar las categorías de productos
function readCategorias()
{
    $.ajax({
        url: api + 'readCategorias',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        // Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            // Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                result.dataset.forEach(function(row){
                    content += `
                        <div class="col s12 m6 l4">
                            <div class="card hoverable">
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="../../resources/img/categorias/${row.imagen_categoria}">
                                </div>
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">${row.nombre_categoria}<i class="material-icons right">close</i></span>
                                    <p>${row.descripcion_categoria}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#title').text('Nuestras categorias');
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
                $('#categorias').html('');
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        // Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
