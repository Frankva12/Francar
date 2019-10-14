const lang = localStorage.getItem('language');

$(document).ready(function(){
    if (lang != null) {
        showTraslate(lang);
    } else {
        showTraslate('ES');
    }
})

function showTraslate(id) { 
    $('.idioma').text(id);
    $('.lang').each(function(index, element) {
        $(this).text(arrLang[id][$(this).attr('key')]);
    })
}

function showEs() {
    showTraslate('ES');
    localStorage.setItem('language', 'ES');
}

function showEn() {
    showTraslate('EN');
    localStorage.setItem('language', 'EN');
}

function showEs2() {
    showTraslate('ES');
    localStorage.setItem('language', 'ES');
}

function ShowEs2() {
    showTraslate('ES');
    localStorage.setItem('language', 'ES');
    destroyTable('tabla-libros');
    initTable2('tabla-libros');
}


function ShowEn2() {
    showTraslate('EN');
    localStorage.setItem('language', 'EN');
    destroyTable('tabla-libros');
    initTable2('tabla-libros');
}

var arrLang = {
    'ES': {
        'titulo': 'Libreria Francar',
        'estadisticas': 'Estadisticas',
        'Estadistica_menu': 'Estadisticas',
        'Libros_menu': 'Libros',
        'Editoriales_menu': 'Editoriales',
        'Categorias_menu': 'Categorias',
        'Usuarios_menu': 'Usuarios',
        'Cerrar_sesion_menu': 'Cerrar Sesión',
        'Direccion_footer': 'Nos ubicamos en avenida Aguilares 218, San Salvador',
        'Ubicacion_footer': 'Ubicación:',
        'Correo_footer': 'Correo:',
        'Telefono_footer': 'Telefono',
        'Redes_sociales': 'Redes sociales:',
        'titulo_libros': 'libros',
        'Imagen': 'Imagen',
        'Nombre': 'Nombre',
        'Apellido': 'Apellido',
        'Direccion': 'Dirección',
        'Precio': 'Precio',
        'Cantidad': 'Cantidad',
        'Categoria': 'Categoria',
        'Editorial': 'Editorial',
        'Estado': 'Estado',
        'Acciones': 'Acciones',
        'Agregar_libros': 'Agregar libros',
        'Agregar_editorial': 'Agregar editorial',
        'Agregar_usuarios': 'Agregar usuarios',
        'Agregar_categorias':'Agregar categorias',
        'Crear_usuario':'Crear usuario',
        'Modificar_libros': 'Modificar libros',
        'Modificar_editorial': 'Modificar editorial',
        'Modificar_categoria': 'Modificar categoria',
        'Reporte_ventas': 'Reporte de ventas',
        'Reporte_ventas_categoria': 'Reportes de ventas por categoria',
        'Reporte_ventas_editorial': 'Reporte de ventas por editorial',
        'Reporte_clientes': 'Reporte clientes',
        'Reporte_Bitacora': 'Reporte bitacora',
        'Nombre_libro': 'Nombre del libro',
        'Descripcion': 'Descripcion',
        'Autor': 'Autor',
        'Cambiar_contraseña': 'Cambiar contraseña',
        'Contrasenia': 'Contraseña',
        'olvido': '¿Olvidó su contraseña?',
        'Confirmar_contraseña': 'Confirmar contraseña',
        'Contraseña_actual': 'Contraseña actual',
        'Repita_contraseña_actual': 'Repita la contraseña actual',
        'Contraseña_nueva': 'Contraseña nueva',
        'Repita_contraseña_nueva': 'Repita nueva contraseña',
        'Guardar_cambios': 'Guardar cambios',
        'bienvenidos': 'Bienvenidos',
        'Contraseña': 'Contraseña',

    },
    'EN':{
        'titulo': 'Library Francar',
        'estadisticas': 'Statistics',
        'Estadistica_menu': 'Statistics',
        'Libros_menu': 'books',
        'Editoriales_menu': 'Editorials',
        'Categorias_menu': 'Categories',
        'Usuarios_menu': 'Users',
        'Cerrar_sesion_menu': 'Log Out',
        'Direccion_footer': 'We are located on Avenida Aguilares 218, San Salvador',
        'Ubicacion_footer': 'Location:',
        'Correo_footer': 'Email:',
        'Redes_sociales': 'Social Networks:',
        'titulo_libros': 'books',
        'Imagen': 'Image',
        'Nombre': 'Name',
        'Apellido': 'Last name',
        'Direccion': 'Direction',
        'Precio': 'Price',
        'Cantidad': 'Amount',
        'Categoria': 'Category',
        'Editorial': 'Editorial',
        'Estado': 'State',
        'Acciones': 'Accions',
        'Agregar_libros': 'Add books',
        'Agregar_editorial': 'Add editorial',
        'Agregar_categorias':'Add categories',
        'Agregar_usuarios': 'Add users',
        'Modificar_libros': 'Modify books',
        'Modificar_editorial': 'Modify editorial',
        'Modificar_categoria': 'Modify categorie',
        'Reporte_ventas': 'Report of sales',
        'Reporte_ventas_categoria': 'Reportes of sales by categories',
        'Reporte_ventas_editorial': 'Reporte of sales by editorial',
        'Reporte_clientes': 'Report of clients',
        'Reporte_Bitacora': 'log report',
        'Nombre_libro': 'Name of book',
        'Descripcion': 'Description',
        'Autor': 'Author',
        'Cambiar_contraseña': 'Change password',
        'Contrasenia': 'password',
        'olvido': 'Forgot your password?',
        'Confirmar_contraseña':'Password confirm',
        'Contraseña_actual': 'Current password',
        'Repita_contraseña_actual': 'Repeat the current password',
        'Contraseña_nueva': 'New Password',
        'Repita_contraseña_nueva': 'Repeat new password',
        'Guardar_cambios': 'Save changes',
        'bienvenidos': 'Welcome',
        'Contraseña': 'Password',
    }
}