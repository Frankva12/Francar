<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/libros.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $libro = new Libros;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if ($_GET['site'] == 'private') {
        switch ($_GET['action']) {
            case 'read':
                if ($result['dataset'] = $libro->readLibros()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay libros registrados';
                }
                break;

            case 'create':
                $_POST = $libro->validateForm($_POST);
                if ($libro->setNombre($_POST['create_nombre'])) {
                    if ($libro->setDescripcion($_POST['create_descripcion'])) {
                        if ($libro->setAutor($_POST['create_autor'])) {
                            if ($libro->setCantidad($_POST['create_cantidad'])) {
                            if ($libro->setPrecio($_POST['create_precio'])) {
                                if ($libro->setCategoria($_POST['create_categoria'])) {
                                    if ($libro->setEditorial($_POST['create_editorial'])) {
                                        if ($libro->setEstado(isset($_POST['create_estado']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['create_archivo']['tmp_name'])) {
                                                if ($libro->setImagen($_FILES['create_archivo'], null)) {
                                                    if ($libro->createlibros()) {
                                                        if ($libro->saveFile($_FILES['create_archivo'], $libro->getRuta(), $libro->getImagen())) {
                                                            
                                                                $result['status']=1;
                                                        
                                                        } else {
                                                            $result['status'] = 2;
                                                            $result['exception'] = 'No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Operación fallida';
                                                        }
                                                    } else {
                                                        $result['exception'] = $producto->getImageError();
                                                    }
                                                }else {
                                                    $result['exception'] = 'Autor incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Seleccione una imagen';
                                            }
                                        }else {
                                            $result['exception'] = 'Seleccione un editorial';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoria';
                                    }
                                } else {
                                    $result['exception'] = 'Precio incorrecto';
                                }
                             } 
                             else {
                                    $result['exception'] = 'Cantidad incorrecta';
                             }
                            } else {
                                $result['exception'] = 'Autor incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Descripción incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                break;
                
            case 'get':
                if ($libro->setId($_POST['id_libro'])) {
                    if ($result['dataset'] = $libro->getlibros()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'libro inexistente';
                    }
                } else {
                    $result['exception'] = 'libro incorrecto';
                }
                break;

            case 'update':
                $_POST = $libro->validateForm($_POST);
                if ($libro->setId($_POST['id_libro'])) {
                    if ($libro->getlibros()) {
                        if ($libro->setNombre($_POST['update_nombre'])) {
                            if ($libro->setDescripcion($_POST['update_descripcion'])) {
                                if ($libro->setAutor($_POST['update_autor'])) {
                                    if ($libro->setPrecio($_POST['update_precio'])) {
                                        if ($libro->setCategoria($_POST['update_categoria'])) {
                                            if ($libro->setEditorial($_POST['update_editorial'])) {
                                                if ($libro->setCantidad($_POST['update_cantidad'])) {
                                                if ($libro->setEstado(isset($_POST['update_estado']) ? 1 : 0)) {
                                                    if (is_uploaded_file($_FILES['update_archivo']['tmp_name'])) {
                                                        if ($libro->setImagen($_FILES['update_archivo'], $_POST['imagen_libro'])) {
                                                            $archivo = true;
                                                } else {
                                                    $result['exception'] = $libro->getImageError();
                                                    $archivo = false;
                                                }
                                            } else {
                                                if ($libro->setImagen(null, $_POST['imagen_libro'])) {
                                                    $result['exception'] = 'No se subió ningún archivo';
                                                } else {
                                                    $result['exception'] = $libro->getImageError();
                                                }
                                                $archivo = false;
                                            }
                                            if ($libro->updatelibros()) {
                                                if ($archivo) {
                                                    if ($libro->saveFile($_FILES['update_archivo'], $libro->getRuta(), $libro->getImagen())) {
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
                                        }
                                        } else {
                                            $result['exception'] = 'Cantidad incorrecta';
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
                                $result['exception'] = 'Editorial incorrecta';
                            }
                            } else {
                                $result['exception'] = 'Descripción incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'libro inexistente';
                    }
                } else {
                    $result['exception'] = 'libro incorrecto';
                }
                break;
            case 'delete':
                if ($libro->setId($_POST['id_libro'])) {
                    if ($libro->getlibros()) {
                        if ($libro->deletelibros()) {
                            if ($libro->deleteFile($libro->getRuta(), $_POST['imagen_libro'])) {
                                $result['status'] = 1;
                            } else {
                                $result['status'] = 2;
                                $result['exception'] = 'No se borró el archivo';
                            }
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'libro inexistente';
                    }
                } else {
                    $result['exception'] = 'libro incorrecto';
                }
                break;
                //Operación para mostrar los tipos de categorias en la tabla
            case 'readCategoria':
            if ($result['dataset'] = $libro->readLibroCategoria()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Contenido no disponible';
            }
            break;
            //Operacion para mostrar los tipos de receta en el tabla
        case 'readEditorial':
            if ($result['dataset'] = $libro->readLibroEditorial()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Contenido no disponible';
            }
            break;
            
            case 'graficar_editorial':
               if($result['dataset'] = $libro->cantidad_libros_editoriales()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay libros';
            }
        break;

        case 'graficar_categoria':
               if($result['dataset'] = $libro->cantidad_libros_categorias()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'No hay libros';
            }
        break;

            default:
                exit('Acción no disponible');
        }
        
    }
    
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
