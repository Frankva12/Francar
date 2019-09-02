<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/dashboard/usuarios.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../core/libraries/PHPMailer-master/src/Exception.php';
require '../../../core/libraries/PHPMailer-master/src/PHPMailer.php';
require '../../../core/libraries/PHPMailer-master/src/SMTP.php';


//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['action'])) {
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (isset($_SESSION['id_administrador'])){
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../../views/private/');
                } else {
                    header('location: ../../../views/private/private.php');
                }
                break;


            case 'readProfile':
                if ($usuario->setId($_SESSION['id_usuario'])) {
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
                if ($usuario->setId($_SESSION['id_usuario'])) {
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
                if ($usuario->setId($_SESSION['id_administrador'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['actual1'] == $_POST['actual2']) {
                        $contrasenia = $usuario->setContrasenia($_POST['actual1']);
                        if ($contrasenia[0]) { 
                            if ($usuario->checkPassword()) {
                                if ($_POST['nueva1'] == $_POST['nueva2']) {  
                                    $contrasenia = $usuario->setContrasenia($_POST['nueva1']);
                                    if ($contrasenia[0]) { 
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = $contrasenia[1];
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = $contrasenia[1];
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
                                            $contrasenia = $usuario->setContrasenia($_POST['create_clave1']);
                                                if ($contrasenia[0]) { 
                                                if ($usuario->createUsuario()) {
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = $contrasenia[1];
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
                if ($usuario->setId($_POST['id_administrador'])) {
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update_nombre_administrador'])) {
                            if ($usuario->setApellido($_POST['update_apellido_administrador'])) {
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
                if ($_POST['id_administrador'] != $_SESSION['id_:administrador']) {
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

    } else  if($_GET['site'] == 'private'){
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

            case 'Recuperacion':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setCorreo($_POST['correo_usuario'])) {
                    if ($usuario->Correo_contra()) {
                        $token = uniqid();
                        if ($usuario->setToken($token)) {
                            if ($usuario->updateToken()) {
                                if ($correousuario = $usuario->getCorreo()) {
                                    //echo('PEPITO');
                                    $mail = new PHPMailer(true);
                                    $mail->CharSet = "UTF-8";
                                try {
                                    $mail->SMTPDebug = 2;
                                    $mail->isSMTP();
                                    $mail->Host = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'libreriafrancar@gmail.com';
                                    $mail->Password = 'Hola!1234';
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Port = 587;

                                    $mail->setFrom('libreriafrancar@gmail.com');
                                    $mail->addAddress($correousuario);

                                    $mail->isHTML(true);
                                    $mail->Subject = 'Recuperacion de su contraseña';
                                    $mail->Body = 'Bienvenido, '.$correousuario.' Usted ha solicitado un cambio de contraseña <br> <a href="http://localhost/Francar/francar/views/private/recuperacion_contrasenia.php?token='.$token.'">Por favor, haga click aqui para modificar su contraseña</a>';

                                    $mail->send();
                                    echo 'Su mensaje ha sido enviado correctamente';
                                    $result['status'] = 1;
                                } catch (Exception $e) {
                                    echo "Su mensaje no pudo enviarse'{$mail->ErrorInfo}'";
                                    $result['exception'] = 'El correo no ha podido enviarse';
                                    }
                                } else {
                                    $result['exception'] = 'Correo inexistente';
                                }
                            } else {
                                $result['exception'] = 'Correo invalido';
                            }
                        } else {
                            $result['exception'] = 'Correo invalido';
                        }
                    } else {
                        $result['exception'] = 'Correo invalido';
                    }
                } else {
                    $result['exception'] = 'Correo invalido';
                }
            break;

            case 'RecuCambio':
            if ($usuario->setToken($_POST['token'])) {
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['contra_nueva1'] == $_POST['contra_nueva2']) {
                    $contrasenia = $usuario->setContrasenia($_POST['contra_nueva1']);
                    if ($contrasenia[0]) { 
                        if ($usuario->tokenPass()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No se pudo actualizar la contraseña.';
                        }
                    } else {
                        $result['exception'] = $contrasenia[1];
                    }
                } else {
                    $result['exception'] = 'Las contraseñas ingresadas no coinciden.';
                }

            } else {
                $result['exception'] = 'Token invalido. Contacte al administrado.';
            }
            break;

            case 'register':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['g-recaptcha-response']) {
                if ($usuario->setNombre($_POST['nombres'])) {
                    if ($usuario->setApellido($_POST['apellidos'])) {
                        if ($usuario->setAlias($_POST['alias'])) {
                                if ($usuario->setDireccion($_POST['direccion'])) {
                                    if ($usuario->setTelefono($_POST['telefono'])) {
                                        if ($usuario->setCorreo($_POST['correo'])) {
                                            if ($_POST['clave1'] == $_POST['clave2']) {
                                                if ($_POST['clave1'] != $_POST['alias']) {
                                                    $contrasenia = $usuario->setContrasenia($_POST['clave1']);
                                                    if ($contrasenia[0]) { 
                                                    if ($usuario->createUsuario()) {
                                                    $result['status'] = 1;
                                                        } else {
                                                    $result['exception'] = 'Operación fallida';
                                                    }
                                                } else {
                                                    $result['exception'] = $contrasenia[1];
                                                }
                                            } else {
                                                $result['exception'] = 'La clave no puede ser igual al alias';
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

            case 'login':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['g-recaptcha-response']) {
                if ($usuario->setAlias($_POST['alias_usuario'])) {
                    if ($usuario->checkAlias()) {
                        $contrasenia = $usuario->setContrasenia($_POST['contrasenia']);
                        if ($contrasenia[0]) {
                            if ($usuario->UpdateLogin()) {
                                if ($usuario->checkPassword()) {
                                    $result['status'] = 1;
                                    $_SESSION['id_administrador'] = $usuario->getId();
                                    $_SESSION['alias_usuario'] = $usuario->getAlias();
                                    $_SESSION['tiempo'] = time();
                                    } else {
                                        $result['exception'] = 'Clave inexistente';
                                    }
                                } else {
                                        $result['exception'] = 'No pudimos actualizar los intentos';
                                }
                            } else {
                                $result['exception'] = $contrasenia[1];
                            }
                        } else {
                            $result['exception'] = 'Alias inexistente';
                        }
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                } else {
                    $result['exception'] = 'Complete formulario de no soy un robot';
                }
                break;


                case 'intentos':
                    $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setAlias($_POST['alias_usuario'])) {
                            if ($result['dataset'] = $usuario->Intentos()) {
                                $result['status'] = 1;
                        }
                        else {
                            $result['exception'] = 'No pudimos sumar intentos';
                        }
                    }else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                    break;

                case 'BloquearIntentos':
                    $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setAlias($_POST['alias_usuario'])) {
                        if ($result['dataset'] = $usuario->BloquearIntentos()) {
                            $result['status'] = 2;
                        }
                            else {
                                $result['exception'] = 'No hemos podido bloquear usuario';
                            } 
                        }
                        else {
                            $result['exception'] = 'Alias incorrecto';
                    }
                    break;
              /*   case 'bloquear':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setAlias($_POST['alias'])) {
                    if ($usuario->checkAlias()) {
                        if ($usuario->bloquearUsuario()) {
                            $result['status'] = 1;
                            $result['message'] = 'Usuario bloqueado';
                        }
                    }
                }
                break; */
            default:
                exit('Acción no disponiblexd');
        }
    }
	print(json_encode($result));
} else {
	exit('Recurso denegado');
}
?>
