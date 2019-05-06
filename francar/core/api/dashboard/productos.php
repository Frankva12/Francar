<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/productos.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $producto = new Productos;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ($_GET['site'] == 'private') {
        switch ($_GET['action']) {

            case 'readProductos':
                if ($result['dataset'] = $producto->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay libros registrados';
                }
                break;


            case 'readCategorias':
                if ($result['dataset'] = $producto->readCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorías registradas';
                }
                break;

            case 'readEditoriales': 
            if ($result['dataset'] = $editorial->readEditoriales()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay editoriales registradas';
            }
            break;



            case 'create':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setNombre($_POST['create_nombre'])) {
                    if ($producto->setDescripcion($_POST['create_descripcion'])) {
                        if ($producto->setAutor($_POST['create_autor'])) {
                            if ($producto->setPrecio($_POST['create_precio'])) {
                                if ($producto->setCategoria($_POST['create_categoria'])) {
                                    if ($producto->setEditorial($_POST['create_editorial'])) {
                                        if ($producto->setEstado(isset($_POST['create_estado']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($producto->setImagen($_FILES['create_archivo'], null)) {
                                                    if ($producto->createProducto()) {
                                                        if ($producto->saveFile($_FILES['create_archivo'], $producto->getRuta(), $producto->getImagen())) {
                                                            if($editorial->createProducto()){
                                                                $result['status']=1;
                                                        }
                                                        } else {
                                                            $result['status'] = 2;
                                                            $result['exception'] = 'No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                        }
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                }else {
                                                    $result['exception'] = 'Autor incorrecto'
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                        }else {
                                            $result['exception'] = 'Seleccione un editorial';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Seleccione una categoría';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Descripción incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                break;



                
            case 'get':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($producto->getProducto()) {
                        if ($producto->setNombre($_POST['update_nombre'])) {
                            if ($producto->setDescripcion($_POST['update_descripcion'])) {
                                if ($producto->setAutor($_POST['update_autor'])) {
                                    if ($producto->setPrecio($_POST['update_precio'])) {
                                        if ($producto->setCategoria($_POST['update_categoria'])) {
                                            if ($producto->setEditorial($_POST['update_editorial'])) {
                                                if ($producto->setEstado(isset($_POST['update_estado']) ? 1 : 0)) {
                                                    if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                        if ($producto->setImagen($_FILES['update_archivo'], $_POST['imagen_producto'])) {
                                                            $archivo = true;
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if ($producto->setImagen(null, $_POST['imagen_producto'])) {
                                                    $result['exception'] = 'No se subió ningún archivo';
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($producto->updateProducto()) {
                                                if ($archivo) {
                                                    if ($producto->saveFile($_FILES['update_archivo'], $producto->getRuta(), $producto->getImagen())) {
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
                                            $result['exception'] = 'Autor incorrecto';
                                        } else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
                                    }
                                } else {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Editorial incorrecta';
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($producto->getProducto()) {
                        if ($producto->deleteProducto()) {
                            if ($producto->deleteFile($producto->getRuta(), $_POST['imagen_producto'])) {
                                $result['status'] = 1;
                            } else {
                                $result['status'] = 2;
                                $result['exception'] = 'No se borró el archivo';
                            }
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'commerce') {
        switch ($_GET['action']) {
            case 'readCategorias':
                if ($result['dataset'] = $producto->readCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'Contenido no disponible';
                }
                break;
            case 'readProductos':
                if ($producto->setCategoria($_POST['id_categoria'])) {
                    if ($result['dataset'] = $producto->readProductosCategoria()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Categoría incorrecta';
                }
                break;
            case 'detailProducto':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
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
