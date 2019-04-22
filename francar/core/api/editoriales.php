<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/editoriales.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
	session_start();
	$editorial = new Editoriales;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'dashboard') {
		switch ($_GET['action']) {
            case 'read': 
				if ($result['dataset'] = $editorial->readEditoriales()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay editoriales registradas';
				}
				break;
			case 'create':
				$_POST = $editorial->validateForm($_POST);
        		if ($editorial->setNombre($_POST['create_editorial'])) {
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
            case 'get':
                if ($editorial->setId($_POST['id_editorial'])) {
                    if ($result['dataset'] = $editorial->getEditorial()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Editorial inexistente';
                    }
                } else {
                    $result['exception'] = 'Editorial incorrecta';
                }
            	break;
			case 'update':
				$_POST = $editorial->validateForm($_POST);
				if ($editorial->setId($_POST['id_editorial'])) {
					if ($editorial->getEditorial()) {
		                if ($editorial->setNombre($_POST['update_editorial'])) {
						} else {
							$result['exception'] = 'Nombre incorrecto';
						}
					} else {
						$result['exception'] = 'Editorial inexistente';
					}
				} else {
					$result['exception'] = 'Editorial incorrecta';
				}
            	break;
            case 'delete':
				if ($editorial->setId($_POST['id_editorial'])) {
					if ($editorial->getEditorial()) {
						if ($editorial->deleteEditorial()) {
					} else {
						$result['exception'] = 'Editorial inexistente';
					}
				} else {
					$result['exception'] = 'Editorial incorrecta';
				}
            	break;
			default:
				exit('Acción no disponible');
		}
	} else {
		exit('Acceso no disponible');
	}
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
