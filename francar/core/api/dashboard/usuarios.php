<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['id_administrador'])) {
        switch ($_GET['action']) {


            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/private/index.php');
                } else {
                    header('location: ../../views/private/private.php');
                }
                break;


            case 'readProfile':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($usuario -> setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario -> getUsuario()) {
=======
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;


            case 'editProfile':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($usuario -> setId($_SESSION['id_usuario'])) {
                    if ($usuario -> getUsuario()) {
                        $_POST = $usuario -> validateForm($_POST);
                        if ($usuario -> setNombres($_POST['profile_nombres'])) {
                            if ($usuario -> setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario -> setCorreo($_POST['profile_correo'])) {
                                    if ($usuario -> setAlias($_POST['profile_alias'])) {
                                        if ($usuario -> updateUsuario()) {
=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['profile_nombres'])) {
                            if ($usuario->setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                        if ($usuario->updateUsuario()) {
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                                            $_SESSION['aliasUsuario'] = $_POST['profile_alias'];
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
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
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;


            case 'password':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($usuario -> setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario -> validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario -> setClave($_POST['clave_actual_1'])) {
                            if ($usuario -> checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario -> setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario -> changePassword()) {
=======
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                if ($usuario->setId($_SESSION['id_usuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;

                
            case 'read':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($result['dataset'] = $usuario -> readUsuarios()) {
=======
                if ($result['dataset'] = $usuario->readUsuarios()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                if ($result['dataset'] = $usuario->readUsuarios()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;


            case 'create':
<<<<<<< HEAD
<<<<<<< HEAD
                $_POST = $usuario -> validateForm($_POST);
                if ($usuario -> setNombre($_POST['create_nombres'])) {
                    if ($usuario -> setApellido($_POST['create_apellidos'])) {
                        if ($usuario -> setCorreo($_POST['create_correo'])) {
                            if ($usuario -> setTelefono($_POST['create_telefono'])) {
                                if ($usuario -> setDireccion($_POST['create_direccion'])) {
                                    if ($usuario -> setAlias($_POST['create_alias'])) {
                                        if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                            if ($usuario -> setContrasenia($_POST['create_clave1'])) {
                                                if ($usuario -> createUsuario()) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Clave menor a 6 caracteres';
                                            }
=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['create_nombres'])) {
                    if ($usuario->setApellido($_POST['create_apellidos'])) {
                        if ($usuario->setCorreo($_POST['create_correo'])) {
                            if ($usuario->setTelefono($_POST['create_telefono'])) {
                            if ($usuario->setDireccion($_POST['create_direccion'])) {
                            if ($usuario->setAlias($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($usuario->setContrasenia($_POST['create_clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
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
                                $result['exception'] = 'Telefono incorrecto';
                            }
                            
                        } else {
                            $result['exception'] = 'Direccion incorrecta';
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


            case 'get':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($usuario -> setId($_POST['id_administrador'])) {
                    if ($result['dataset'] = $usuario -> getUsuario()) {
=======
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;


            case 'update':
<<<<<<< HEAD
<<<<<<< HEAD
                $_POST = $usuario -> validateForm($_POST);
                if ($usuario -> setId($_POST['id_administrador'])) {
                    if ($usuario -> getUsuario()) {
                        if ($usuario -> setNombre($_POST['update_nombre_administrador'])) {
                            if ($usuario -> setApellido($_POST['update_apellido_administrador'])) {
                                if ($usuario -> setCorreo($_POST['update_correo'])) {
                                    if ($usuario -> setTelefono($_POST['update_telefono'])) {
                                        if ($usuario -> setDireccion($_POST['update_direccion'])) {
                                            if ($usuario -> setAlias($_POST['update_alias'])) {
                                                if ($usuario -> updateUsuario()) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Alias incorrecto';
                                            }

=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update_nombre_administrador'])) {
                            if ($usuario->setApellido($_POST['update_apellido_administrador'])) {
                                if ($usuario->setCorreo($_POST['update_correo'])) {
                                    if ($usuario->setTelefono($_POST['update_telefono'])) {
                                    if ($usuario->setDireccion($_POST['update_direccion'])) {
                                    if ($usuario->setAlias($_POST['update_alias'])) {
                                        if ($usuario->updateUsuario()) {
                                            $result['status'] = 1;
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                    
                                } else {
                                    $result['exception'] = 'Direccion incorrecta';
                                }
                                    } else {
                                        $result['exception'] = 'Telefono incorrecto';
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
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;


            case 'delete':
                if ($_POST['id_administrador'] != $_SESSION['id_:administrador']) {
<<<<<<< HEAD
<<<<<<< HEAD
                    if ($usuario -> setId($_POST['id_adminitrador'])) {
                        if ($usuario -> getUsuario()) {
                            if ($usuario -> deleteUsuario()) {
=======
                    if ($usuario->setId($_POST['id_adminitrador'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                    if ($usuario->setId($_POST['id_adminitrador'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
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
    } else {
        switch ($_GET['action']) {
            case 'read':
<<<<<<< HEAD
<<<<<<< HEAD
                if ($usuario -> readUsuarios()) {
=======
                if ($usuario->readUsuarios()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
                if ($usuario->readUsuarios()) {
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                    $result['status'] = 1;
                    $result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;


            case 'register':
<<<<<<< HEAD
<<<<<<< HEAD
                $_POST = $usuario -> validateForm($_POST);
                if ($usuario -> setNombres($_POST['nombres'])) {
                    if ($usuario -> setApellidos($_POST['apellidos'])) {
                        if ($usuario -> setCorreo($_POST['correo'])) {
                            if ($usuario -> setAlias($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario -> setClave($_POST['clave1'])) {
                                        if ($usuario -> createUsuario()) {
=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombres($_POST['nombres'])) {
                    if ($usuario->setApellidos($_POST['apellidos'])) {
                        if ($usuario->setCorreo($_POST['correo'])) {
                            if ($usuario->setAlias($_POST['alias'])) {
                                if ($_POST['clave1'] == $_POST['clave2']) {
                                    if ($usuario->setClave($_POST['clave1'])) {
                                        if ($usuario->createUsuario()) {
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
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


            case 'login':
<<<<<<< HEAD
<<<<<<< HEAD
                $_POST = $usuario -> validateForm($_POST);
                if ($usuario -> setAlias($_POST['alias_usuario'])) {
                    if ($usuario -> checkAlias()) {
                        if ($usuario -> setContrasenia($_POST['contrasenia'])) {
                            if ($usuario -> checkPassword()) {
                                $_SESSION['id_administrador'] = $usuario -> getId();
                                $_SESSION['alias_usuario'] = $usuario -> getAlias();
=======
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['alias_usuario'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->setContrasenia($_POST['contrasenia'])) {
                            if ($usuario->checkPassword()) {
                                $_SESSION['id_administrador'] = $usuario->getId();
                                $_SESSION['alias_usuario'] = $usuario->getAlias();
<<<<<<< HEAD
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
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
    }
	print(json_encode($result));
} else {
<<<<<<< HEAD
<<<<<<< HEAD
    exit('Recurso denegado');
} 
?>
=======
	exit('Recurso denegado');
}
?>
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
=======
	exit('Recurso denegado');
}
?>
>>>>>>> parent of e869098... Ordene codigo, elimine archivos (Dios nos socorra)
