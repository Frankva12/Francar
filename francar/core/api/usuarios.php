<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/usuarios.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/private/index.php');
                } else {
                    header('location: ../../views/private/private.php');
                }
                break;
            case 'readProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'editProfile':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombre($_POST['profile_nombre'])) {
                            if ($usuario->setApellido($_POST['profile_apellido'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                        if ($usuario->setDireccion($_POST['profile_direccion'])) {
                                            if ($usuario->setTelefono($_POST['profile_telefono'])) {
                                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                        if ($usuario->updateUsuario()) {
                                            $_SESSION['nombreUsuario'] = $_POST['profile_nombre'];
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellido incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
                }
            } else {
                $result['exception'] = 'Usuario incorrecto';
            }
                break;
            case 'password':
                if ($usuario->setId($_SESSION['idUsuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setClave($_POST['clave_actual'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva']) {
                                    if ($usuario->setClave($_POST['clave_nueva'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['create_nombre'])) {
                    if ($usuario->setApellido($_POST['create_apellidos'])) {
                        if ($usuario->setAlias($_POST['create_alias'])) {
                            if ($usuario->setContrasenia($_POST['create_contrasenia'])) {
                                if ($usuario->setDireccion($_POST['create_direccion'])) {
                                    if ($usuario->setTelefono($_POST['create_telefono'])) {
                                        if ($usuario->setCorreo($_POST['create_correo'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }     
                                            } else {
                                                $result['exception'] = 'Correo incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Telefono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Direccion incorrecta';
                                    }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                    } else {
                        $result['exception'] = 'Apellido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }
                break;
            case 'get':
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_usuario'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update_nombres'])) {
                            if ($usuario->setApellido($_POST['update_apellidos'])) {
                                if ($usuario->setAlias($_POST['update_alias'])) {
                                    if ($usuario->setDireccion($_POST['update_direccion'])) {
                                        if ($usuario->setTelefono($_POST['update_telefono'])) {
                                            if ($usuario->setCorreo($_POST['update_correo'])) {
                                        if ($usuario->updateUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecto';
                            }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                            } else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'delete':
                if ($_POST['id_administrador'] != $_SESSION['idUsuario']) {
                    if ($usuario->setId($_POST['id_administrador'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
            default:
                exit('Acción no disponible');
        }
    } else if ($_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'read':
                if ($usuario->readUsuarios()) {
                    $result['status'] = 1;
                    $result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
                case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setAlias($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                            } else {
                                $result['exception'] = 'Alias incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
                break;
                -->
            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['nombre'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->setClave($_POST['contrasenia'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['idUsuario'] = $usuario->getId();
                                $_SESSION['nombreUsuario'] = $usuario->getNombre();
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Clave inexistente';
                            }
                        } else {
                            $result['exception'] = 'Clave menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Alias inexistente';
                    }
                } else {
                    $result['exception'] = 'Alias incorrecto';
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
