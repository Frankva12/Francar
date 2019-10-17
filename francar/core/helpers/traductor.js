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
        'Cliente': 'Cliente',
        'Carrito': 'Carrito',
        'Imagen': 'Imagen',
        'Nombre': 'Nombre',
        'Apellido': 'Apellido',
        'Direccion': 'Dirección',
        'Precio': 'Precio',
        'Cantidad': 'Cantidad',
        'Categoria': 'Categoría',
        'Categorias': 'Categorias',
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
        'Registrarse': 'Registrarse',
        'Contactanos_publica': 'Contactanos',
        'Quienes_somos': '¿Quienes somos?',
        'mision': 'Misión',
        'Vision':'Visión',
        'Aventura': 'Aventura',
        'Misterio': 'Misterio',
        'lograr_Ser': 'Lograr ser la mejor librería a nivel nacional con ayuda de la tecnología.',
        'Somos_empresa': 'Somos una empresa que busca fomentar la lectura en los jóvenes, apoyados de la ayuda de la tecnología, para obtenerlos de manera más efectiva virtualmente.',
        'Libros_Disponibles': 'Libros disponibles',
        'Iniciar_Sesion': 'Iniciar Sesion',
        'Cerrar_Sesion': 'Cerrar sesion',    
        'Nuestros_telefonos': 'Nuestros telefonos son: 2121-2828 y 2277-7777',
        'Nuestro_Correo': 'Nuestro correo: libreriafrancar@gmail.com.',
        'Libros_Recien': 'LIBROS RECIEN INGRESADOS', 
        'Sintesis': 'Sintesis',
        'Informacion': 'Información',
        'Las_tediosas':'Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad.',
        'Hogwards':'Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de terribles acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco.',
        'Fecha_Crucial': 'La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento protector que lo mantiene a salvo. El anunciado enfrentamiento a muerte con lord Voldemort es inminente, y la casi imposible misión de encontrar y destruir los restantes Horrocruxes más urgente que nunca.',
        'Novela':'El término novela de misterio a menudo es utilizado como sinónimo de novela de detective o novela de crimen, es decir, una novela o cuento en la cual un detective (profesional o aficionado) investiga y resuelve un misterio criminal.',
        'Origenes': 'Se considera que los orígenes del género de aventuras se encuentran en La Odisea y en La Ilíada de Homero (siglo VIII a. d C.) y, por ende, en la épica clásica. En la primera, el héroe Ulises lucha por volver a su hogar en Ítaca tras la Guerra de Troya. He aquí el viaje iniciático del protagonista que será la base para las futuras aventuras narrativas.',
        'Literatura_terror':'La Literatura de terror es un género de ficción literario que pretende o tiene la capacidad de asustar, causar miedo o aterrorizar sus lectores o espectadores en inducir sentimientos de horror y terror.',
        'Titulo_harry': 'Título: Harry Potter y la Orden del Fenix',
        'Titulo_harry2': 'Título: Harry Potter y el misterio del principe',
        'Titulo_harry3': 'Título: Harry Potter y las reliquias de la muerte',
        'Precio_25': 'Precio: $25.00',
        'Editorial_sala': 'Editorial: Salamandra',
        'descripcion_1': 'Descripcion: Las tediosas vacaciones de verano en casa de sus tíos todavía no han acabado y Harry se encuentra más inquieto que nunca. Apenas ha tenido noticias de Ron y Hermione, y presiente que algo extraño está sucediendo en Hogwarts. En efecto, cuando por fin comienza otro curso en el famoso colegio de magia y hechicería, sus temores se vuelven realidad.',
        'descripcion_2': 'Descripcion: Con dieciséis años cumplidos, Harry Potter inicia el sexto curso en Hogwarts en medio de terribles acontecimientos que asolan Inglaterra. Elegido capitán del equipo de Quidditch, los entrenamientos, los exámenes y las chicas ocupan todo su tiempo, pero la tranquilidad dura poco. A pesar de los férreos controles de seguridad que protegen la escuela, dos alumnos son brutalmente atacados.',
        'descripcion_3': 'Descripcion: La fecha crucial se acerca. Cuando cumpla diecisiete años, Harry perderá el encantamiento protector que lo mantiene a salvo. El anunciado enfrentamiento a muerte con lord Voldemort es inminente, y la casi imposible misión de encontrar y destruir los restantes Horrocruxes más urgente que nunca. Ha llegado la hora final, el momento de tomar las decisiones más difíciles.',
    },
    'EN':{
        'titulo': 'Library Francar',
        'estadisticas': 'Statistics',
        'Estadistica_menu': 'Statistics',
        'Libros_menu': 'books',
        'Editoriales_menu': 'Publishers',
        'Categorias_menu': 'Categories',
        'Usuarios_menu': 'Users',
        'Cerrar_sesion_menu': 'Log Out',
        'Direccion_footer': 'We are located on Avenida Aguilares 218, San Salvador',
        'Ubicacion_footer': 'Location:',
        'Telefono_footer': 'Phone',
        'Correo_footer': 'Email:',
        'Redes_sociales': 'Social Networks:',
        'titulo_libros': 'books',
        'Cliente': 'Client',
        'Carrito': 'shopping cart',
        'Imagen': 'Image',
        'Nombre': 'Name',
        'Apellido': 'Last name',
        'Direccion': 'Direction',
        'Precio': 'Price',
        'Cantidad': 'Amount',
        'Categoria': 'Category',
        'Categorias': 'Categories',
        'Editorial': 'Publisher',
        'Estado': 'State',
        'Aventura': 'Adventure',
        'Misterio': 'Mistery',
        'Acciones': 'Accions',
        'Agregar_libros': 'Add books',
        'Agregar_editorial': 'Add publisher',
        'Agregar_categorias':'Add categories',
        'Agregar_usuarios': 'Add users',
        'Modificar_libros': 'Modify books',
        'Modificar_editorial': 'Modify publisher',
        'Modificar_categoria': 'Modify categorie',
        'Reporte_ventas': 'Report of sales',
        'Reporte_ventas_categoria': 'Reports of sales by categories',
        'Reporte_ventas_editorial': 'Reports of sales by publisher',
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
        'Registrarse': 'Register',
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
        'Informacion': 'Information',
        'Las_tediosas': 'The tedious summer vacations at his uncles house are not over yet and Harry is more restless than ever. He has barely heard from Ron and Hermione, and senses that something strange is happening at Hogwarts. Indeed, when another course at the famous school of magic and witchcraft finally begins, his fears become reality.',
        'Hogwards':'With sixteen years of age, Harry Potter begins the sixth year at Hogwarts amid terrible events that plague England. Elected captain of the Quidditch team, training, exams and girls take up all their time, but peace of mind is short-lived.',
        'Fecha_Crucial': 'The big date is coming. When he turns seventeen, Harry will lose the protective enchantment that keeps him safe. The announced confrontation to the death with Lord Voldemort is imminent, and the almost impossible mission to find and destroy the remaining Horcruxes more urgent than ever.',
        'Novela':'The term mystery novel is often used as a synonym for detective novel or crime novel, that is, a novel or story in which a detective (professional or amateur) investigates and solves a criminal mystery.',
        'Origenes': 'The origins of the adventure genre are considered to be found in The Odyssey and Homers Iliad (8th century BC) and, therefore, in the classic epic. In the first, the hero Ulysses struggles to return to his home in Ithaca after the Trojan War. Here is the initiatory journey of the protagonist that will be the basis for future narrative adventures.',
        'Literatura_terror':'Horror Literature is a genre of literary fiction that seeks or has the ability to scare, cause fear or terrorize its readers or spectators in inducing feelings of horror and terror.',
        'Titulo_harry': 'Title: Harry Potter and the Order of the Phoenix',
        'Titulo_harry2': 'Title: Harry Potter and the mystery of the prince',
        'Titulo_harry3': 'Title: Harry Potter and the Deathly Hallows',
        'Precio_25': 'Price: $25.00',
        'Editorial_sala': 'Publisher: Salamandra',
        'descripcion_1': 'Description: The tedious summer vacations at his uncles house are not over yet and Harry is more restless than ever. He has barely heard from Ron and Hermione, and senses that something strange is happening at Hogwarts. Indeed, when another course at the famous school of magic and witchcraft finally begins, his fears become reality.',
        'descripcion_2': 'Description: With sixteen years of age, Harry Potter begins the sixth year at Hogwarts amid terrible events that plague England. Elected captain of the Quidditch team, training, exams and girls take up all their time, but peace of mind is short-lived. Despite the tight security controls that protect the school, two students are brutally attacked.',
        'descripcion_3': 'Description: The crucial date is approaching. When he turns seventeen, Harry will lose the protective enchantment that keeps him safe. The announced confrontation to the death with Lord Voldemort is imminent, and the almost impossible mission to find and destroy the remaining Horcruxes more urgent than ever. The final hour has come, the time to make the most difficult decisions.',
    }
}