<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/categorias.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
	session_start();
	$categoria = new Categorias;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ($_GET['site'] == 'private') {
		switch ($_GET['action']) {
			case 'readCategorias':
            if ($result['dataset'] = $categoria->readCategorias()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Contenido no disponible';
            }
			break;
		}
		print(json_encode($result));
	} else {
		exit('Recurso denegado'); 
	}
}
?>