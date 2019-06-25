<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/categorias.php');

// Se comprueba si existe una acción a realizar, de lo contrario se muestra un mensaje de error
if (isset($_GET['action'])) {
    session_start();
    $categoria = new Categorias;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    switch ($_GET['action']) {
        case 'readCategorias':
            if ($result['dataset'] = $categoria->readCategorias()) {
                $result['status'] = 1;
            } else {
                $result['exception'] = 'Contenido no disponible';
            }
            break;
        default:
            exit('Acción no disponible');
    }
    print(json_encode($result));
} else {
    exit('Recurso denegado');
}
?>