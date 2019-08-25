<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/public/usuarios.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como cliente para realizar las operaciones correspondientes
    if (isset($_SESSION['id_cliente'])){
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/public/');
                } else {
                    header('location: ../../../views/public/index.php');
                }
                break;


            case 'readProfile':
                if ($usuario->setId($_SESSION['id_cliente'])) {
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
                if ($usuario->setId($_SESSION['id_cliente'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNombres($_POST['profile_nombres'])) {
                            if ($usuario->setApellidos($_POST['profile_apellidos'])) {
                                if ($usuario->setCorreo($_POST['profile_correo'])) {
                                    if ($usuario->setAlias($_POST['profile_alias'])) {
                                        if ($usuario->updateUsuario()) {
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
                if ($usuario->setId($_SESSION['id_cliente'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
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
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;

            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNombre($_POST['create_nombres'])) {
                    if ($usuario->setApellido($_POST['create_apellidos'])) {
                        if ($usuario->setCorreo($_POST['create_correo'])) {
                            if ($usuario->setTelefono($_POST['create_telefono'])) {
                            if ($usuario->setDireccion($_POST['create_direccion'])) {
                            if ($usuario->setAlias($_POST['create_alias'])) {
                                if ($_POST['create_clave1'] == $_POST['create_clave2']) {
                                    if ($usuario->setEstado(isset($_POST['create_estado']) ? 1 : 0)) {
                                    if ($usuario->setContrasenia($_POST['create_clave1'])) {
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Clave menor a 6 caracteres';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
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
                            $result['exception'] = 'Alias incorrecto o alias repetido';

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
                if ($usuario->setId($_POST['id_cliente'])) {
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
                if ($usuario->setId($_POST['id_cliente'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update_nombre_cliente'])) {
                            if ($usuario->setApellido($_POST['update_apellido_cliente'])) {
                                if ($usuario->setCorreo($_POST['update_correo'])) {
                                    if ($usuario->setTelefono($_POST['update_telefono'])) {
                                    if ($usuario->setDireccion($_POST['update_direccion'])) {
                                        if ($usuario->setEstado(isset($_POST['update_estado']) ? 1 : 0)) {
                                        if ($usuario->setAlias($_POST['update_alias'])) {
                                        if ($usuario->updateUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }                                    
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
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
                if ($_POST['id_cliente'] != $_SESSION['id_:cliente']) {
                    if ($usuario->setId($_POST['id_adminitrador'])) {
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
                exit('Acción no disponible PO');
        }
    } else  if($_GET['site'] == 'public'){
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

                
            case 'login':
            $_POST = $usuario->validateForm($_POST);
             if ($_POST['g-recaptcha-response']) {
            if ($usuario->setAlias($_POST['alias_cliente'])) {
                if ($usuario->checkAlias()) {
                    if ($usuario->setContrasenia($_POST['contrasenia'])) {
                        if ($usuario->checkPassword()) {
                            $_SESSION['id_administrador'] = $usuario->getId();
                            $_SESSION['alias_cliente'] = $usuario->getAlias();
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
        } else {
            $result['exception'] = 'Por favor realice la verificación';
        }
            break;

            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['g-recaptcha-response']) {
                if ($usuario->setNombre($_POST['nombres'])) {
                    if ($usuario->setApellido($_POST['apellidos'])) {
                        if ($usuario->setAlias($_POST['alias'])) {
                            if ($usuario->setContrasenia($_POST['clave1'])) {
                                if ($usuario->setDireccion($_POST['direccion'])) {
                                    if ($usuario->setTelefono($_POST['telefono'])) {
                                        if ($usuario->setCorreo($_POST['correo'])) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                if ($usuario->setContrasenia($_POST['clave1'])) {
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
                                        $result['exception'] = 'Correo incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Direccion incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    } else {
                    $result['exception'] = 'Alias incorrecto';
                    }       
                } else {
                    $result['exception'] = 'Apellidos incorrectos';
                    }
            } else {
                $result['exception'] = 'Nombres incorrectos';
            }
        } else {
            $result['exception'] = 'Complete formulario de no soy un robot ';
        }
        break;
        
            default:
                exit('Acción no disponiblexd');
        }
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>