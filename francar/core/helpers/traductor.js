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
        'titulo': 'Librería Francar',
        'estadisticas': 'Estadísticas',
        'Estadistica_menu': 'Estadísticas',
        'Libros_menu': 'Libros',
        'Editoriales_menu': 'Editoriales',
        'Categorias_menu': 'Categorías',
        'Usuarios_menu': 'Usuarios',
        'Cerrar_sesion_menu': 'Cerrar Sesión',
        'Direccion_footer': 'Nos ubicamos en Avenida Aguilares 218, San Salvador',
        'Ubicacion_footer': 'Ubicación:',
        'Correo_footer': 'Correo:',
        'Telefono_footer': 'Teléfono',
        'Redes_sociales': 'Redes sociales:',
        'titulo_libros': 'Libros',
        'Imagen': 'Imagen',
        'Nombre': 'Nombre',
        'Apellido': 'Apellido',
        'Direccion': 'Dirección',
        'Precio': 'Precio',
        'Cantidad': 'Cantidad',
        'Categoria': 'Categoría',
        'Editorial': 'Editorial',
        'Estado': 'Estado',
        'Acciones': 'Acciones',
        'Agregar_libros': 'Agregar libros',
        'Agregar_editorial': 'Agregar editorial',
        'Agregar_usuarios': 'Agregar usuarios',
        'Agregar_categorias':'Agregar categorías',
        'Crear_usuario':'Crear usuario',
        'Modificar_libros': 'Modificar libros',
        'Modificar_editorial': 'Modificar editorial',
        'Modificar_categoria': 'Modificar categoria',
        'Reporte_ventas': 'Reporte de ventas',
        'Reporte_ventas_categoria': 'Reportes de ventas por categoría',
        'Reporte_ventas_editorial': 'Reporte de ventas por editorial',
        'Reporte_clientes': 'Reporte clientes',
        'Reporte_Bitacora': 'Reporte bitácora',
        'Nombre_libro': 'Nombre del libro',
        'Descripcion': 'Descripción',
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
        'Contactanos_publica': 'Contactanos',
        'Quienes_somos': '¿Quienes somos?',
        'mision': 'Misión',
        'Vision':'Visión',
        'lograr_Ser': 'Lograr ser la mejor librería a nivel nacional con ayuda de la tecnología.',
        'Somos_empresa': 'Somos una empresa que busca fomentar la lectura en los jóvenes, apoyados de la ayuda de la tecnología, para obtenerlos de manera más efectiva virtualmente.',
        'Libros_Disponibles': 'Libros disponibles',
        'Iniciar_Sesion': 'Iniciar Sesion',
        'Cerrar_Sesion': 'Cerrar sesion',    
        'Nuestros_telefonos': 'Nuestros telefonos son: 2121-2828 y 2277-7777',
        'Nuestro_Correo': 'Nuestro correo: libreriafrancar@gmail.com.',
        'Libros_Recien': 'LIBROS RECIEN INGRESADOS', 
        'Sintesis': 'Sintesis',
        'Las_tediosas':'Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad.'
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
        'Reporte_ventas_categoria': 'Reports of sales by categories',
        'Reporte_ventas_editorial': 'Reports of sales by editorial',
        'Reporte_clientes': 'Report of clients',
        'Reporte_Bitacora': 'Log report',
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
        'Contactanos_publica': 'Contact us',
        'Quienes_somos': 'About us',
        'mision': 'Mission',
        'lograr_Ser': 'Achieve to be the best national bookstore with the help of technology.',
        'Somos_empresa': 'We are a company that seeks to encourage reading among young people, supported by the help of technology, to obtain the most effective way virtually.',
        'Vision':'Vision',
        'Libros_Disponibles': 'available books',
        'Iniciar_Sesion': 'Log in',
        'Cerrar_Sesion': 'Log out', 
        'Nuestros_telefonos': 'Our phones are: 2121-2828 and 2277-7777',   
        'Nuestro_Correo': 'Our mail: libreriafrancar@gmail.com.',
        'Libros_Recien': 'Newly entered books', 
        'Sintesis': 'Synthesis',
        'Las_tediosas': 'The tedious summer vacations at his uncles' house are not over yet and Harry is more restless than ever. He has barely heard from Ron and Hermione, and senses that something strange is happening at Hogwarts. Indeed, when another course at the famous school of magic and witchcraft finally begins, his fears become reality.'
    }
}