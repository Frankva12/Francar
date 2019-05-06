<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/editoriales.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
	session_start();
	$editorial = new Editoriales;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ($_GET['site'] == 'private') {
		switch ($_GET['action']) {

<<<<<<< HEAD
<<<<<<< HEAD
			case 'read':
				if ($result['dataset'] = $editorial -> readEditoriales()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay editoriales registradas';
				}
				break;

			case 'search':
				$_POST = $editorial -> validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $editorial -> searchEditoriales($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
			case 'create':
				$_POST = $editorial -> validateForm($_POST);
				if ($editorial -> setNombreEditorial($_POST['create_editorial'])) {
					if ($editorial -> createEditorial()) {
						$result['status'] = 1;
					} else {
						$result['status'] = 2;
						$result['exception'] = 'Nombre incorrecto';
					}
				}
				break;


			case 'get':
				if ($editorial -> setId($_POST['id_editorial'])) {
					if ($result['dataset'] = $editorial -> getEditorial()) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'Editorial inexistente';
					}
				} else {
					$result['exception'] = 'Editorial incorrecta';
				}
				break;


			case 'update':
				$_POST = $editorial -> validateForm($_POST);
				if ($editorial -> setId($_POST['id_editorial'])) {
					if ($editorial -> updateEditorial()) {
						if ($editorial -> setNombreEditorial($_POST['update_editorial'])) {
							if ($editorial -> updateEditorial()) {
=======
					case 'read': 
						if ($result['dataset'] = $editorial->readEditoriales()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'No hay editoriales registradas';
						}
						break;

						case 'search':
                $_POST = $editorial->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $editorial->searchEditoriales($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
					case 'create':
						$_POST = $editorial->validateForm($_POST);
						if ($editorial->setNombreEditorial($_POST['create_editorial'])) {
							if($editorial->createEditorial()){
								$result['status']=1;
							}else {
							$result['status']=2;
							$result['exception'] = 'Nombre incorrecto';
							}
						}
						break;


					case 'get':
						if ($editorial->setId($_POST['id_editorial'])) {
							if ($result['dataset'] = $editorial->getEditorial()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
					case 'read': 
						if ($result['dataset'] = $editorial->readEditoriales()) {
							$result['status'] = 1;
						} else {
							$result['exception'] = 'No hay editoriales registradas';
						}
						break;

						case 'search':
                $_POST = $editorial->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $editorial->searchEditoriales($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
					case 'create':
						$_POST = $editorial->validateForm($_POST);
						if ($editorial->setNombreEditorial($_POST['create_editorial'])) {
							if($editorial->createEditorial()){
								$result['status']=1;
							}else {
							$result['status']=2;
							$result['exception'] = 'Nombre incorrecto';
							}
						}
						break;


					case 'get':
						if ($editorial->setId($_POST['id_editorial'])) {
							if ($result['dataset'] = $editorial->getEditorial()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
								$result['status'] = 1;
							} else {
								$result['exception'] = 'Editorial inexistente';
							}
						} else {
							$result['exception'] = 'Editorial incorrecta';
						}
						break;


<<<<<<< HEAD
<<<<<<< HEAD
			case 'delete':
				if ($editorial -> setId($_POST['id_editorial'])) {
					if ($editorial -> getEditorial()) {
						if ($editorial -> deleteEditorial()) {} else {
							$result['exception'] = 'Editorial inexistente';
=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
					case 'update':
					$_POST = $editorial->validateForm($_POST);
					if ($editorial->setId($_POST['id_editorial'])) {
							if ($editorial->updateEditorial()) {
								if ($editorial->setNombreEditorial($_POST['update_editorial'])) {
										if($editorial->updateEditorial()){
											$result['status']=1;
										} else {
										$result['status']=2;
										$result['exception'] = 'Nombre incorrecto';
										}
								}
							}
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
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
						exit('Acción no disponible');
						}
		}
			print(json_encode($result));
		}
<<<<<<< HEAD
<<<<<<< HEAD
		print(json_encode($result));
	}
} 
=======
}
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
}
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
?>