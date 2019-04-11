<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/categorias.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
	session_start();
	$categoria = new Categorias;
	$result = array('status' => 0, 'exception' => '');
	//Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'dashboard') {
		switch ($_GET['action']) {
			case 'read':
				if ($result['dataset'] = $categoria->readCategorias()) {
					$result['status'] = 1;
				} else {
					$result['exception'] = 'No hay categorías registradas';
				}
				break;
			case 'search':
				$_POST = $categoria->validateForm($_POST);
				if ($_POST['busqueda'] != '') {
					if ($result['dataset'] = $categoria->searchCategorias($_POST['busqueda'])) {
						$result['status'] = 1;
					} else {
						$result['exception'] = 'No hay coincidencias';
					}
				} else {
					$result['exception'] = 'Ingrese un valor para buscar';
				}
				break;
			case 'create':
				$_POST = $categoria->validateForm($_POST);
        		if ($categoria->setNombre($_POST['create_nombre'])) {
					if ($categoria->setDescripcion($_POST['create_descripcion'])) {
						if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
							if ($categoria->setImagen($_FILES['create_archivo'], null)) {
								if ($categoria->createCategoria()) {
									if ($categoria->saveFile($_FILES['create_archivo'], $categoria->getRuta(), $categoria->getImagen())) {
										$result['status'] = 1;
									} else {
										$result['status'] = 2;
										$result['exception'] = 'No se guardó el archivo';
									}
								} else {
									$result['exception'] = 'Operación fallida';
								}
							} else {
								$result['exception'] = $categoria->getImageError();
							}
						} else {
							$result['exception'] = 'Seleccione una imagen';
						}
					} else {
						$result['exception'] = 'Descripción incorrecta';
					}
				} else {
					$result['exception'] = 'Nombre incorrecto';
				}
            	break;
            case 'get':
                if ($categoria->setId($_POST['id_categoria'])) {
                    if ($result['dataset'] = $categoria->getCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Categoría inexistente';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
            	break;
			case 'update':
				$_POST = $categoria->validateForm($_POST);
				if ($categoria->setId($_POST['id_categoria'])) {
					if ($categoria->getCategoria()) {
		                if ($categoria->setNombre($_POST['update_nombre'])) {
							if ($categoria->setDescripcion($_POST['update_descripcion'])) {
								if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
									if ($categoria->setImagen($_FILES['update_archivo'], $_POST['imagen_categoria'])) {
										$archivo = true;
									} else {
										$result['exception'] = $categoria->getImageError();
										$archivo = false;
									}
								} else {
									if ($categoria->setImagen(null, $_POST['imagen_categoria'])) {
										$result['exception'] = 'No se subió ningún archivo';
									} else {
										$result['exception'] = $categoria->getImageError();
									}
									$archivo = false;
								}
								if ($categoria->updateCategoria()) {
									if ($archivo) {
										if ($categoria->saveFile($_FILES['update_archivo'], $categoria->getRuta(), $categoria->getImagen())) {
											$result['status'] = 1;
										} else {
											$result['status'] = 2;
											$result['exception'] = 'No se guardó el archivo';
										}
									} else {
										$result['status'] = 3;
									}
								} else {
									$result['exception'] = 'Operación fallida';
								}
							} else {
								$result['exception'] = 'Descripción incorrecta';
							}
						} else {
							$result['exception'] = 'Nombre incorrecto';
						}
					} else {
						$result['exception'] = 'Categoría inexistente';
					}
				} else {
					$result['exception'] = 'Categoría incorrecta';
				}
            	break;
            case 'delete':
				if ($categoria->setId($_POST['id_categoria'])) {
					if ($categoria->getCategoria()) {
						if ($categoria->deleteCategoria()) {
							if ($categoria->deleteFile($categoria->getRuta(), $_POST['imagen_categoria'])) {
								$result['status'] = 1;
							} else {
								$result['status'] = 2;
								$result['exception'] = 'No se borró el archivo';
							}
						} else {
							$result['exception'] = 'Operación fallida';
						}
					} else {
						$result['exception'] = 'Categoría inexistente';
					}
				} else {
					$result['exception'] = 'Categoría incorrecta';
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
