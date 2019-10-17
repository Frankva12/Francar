function initTable(id){
    var table =   $('#'+id).DataTable({
        "oLanguage":{
            "sProcessing":     "Procesando.../Procesing...",
            "sLengthMenu":     "Mostrar/Show _MENU_ registros/registers",
            "sZeroRecords":    "No se encontraron resultados/ We don´t find results",
            "sEmptyTable":     "Ningún dato disponible en esta tabla/ No data in this table",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros/ Showing registers from _START_ to _END_ of the total of _TOTAL_ registers",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros/ Showing registers from 0 to 10 from the total of 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)/ (filter from a total of _MAX_ registers)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar/Search:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando.../Loading...",
            "oPaginate": {
                "sFirst":    "Primer/First",
                "sLast":     "Ultimo/Last",
                "sNext":     "Siguiente/Next",
                "sPrevious": "Anterior/Before"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente: Activate for order the column in ascend form ",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente : Activate for order the column in descent form "
            }
        },
        retrieve: true
    });
}

function destroy(id){
    var table =  $(id).DataTable().destroy();
}

