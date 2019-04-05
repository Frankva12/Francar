<?php
/*
    Clase para realizar las operaciones en la base de datos.
*/
class Database
{
/*
    Atributos de la clase para almacenar los datos necesarios al realizar las acciones respectivas.
*/
    private static $connection = null;
    private static $statement = null;
    private static $id = null;

/*
    Método para establecer la conexión con la base de datos utilizando las credenciales respectivas.
    No recibe parámetros y no devuelve ningún valor, capturando las excepciones del servidor de bases de datos.
*/
    private function connect()
    {
        $server = 'localhost';
        $database = 'coffeeshop';
        $username = 'root';
        $password = '';
        try {
            @self::$connection = new PDO('mysql:host='.$server.'; dbname='.$database.'; charset=utf8', $username, $password);
        } catch(PDOException $error) {
            exit(self::getException($error->getCode(), $error->getMessage()));
        }
    }

/*
    Método para anular la conexión con la base de datos y capturar la información de las excepciones en las sentencias SQL.
    No recibe parámetros y no devuelve ningún valor.
*/
    private function desconnect()
    {
        self::$connection = null;
        $error = self::$statement->errorInfo();
        if ($error[0] != '00000') {
            exit(self::getException($error[1], $error[2]));
        }
    }

/*
    Método para ejecutar las siguientes sentencias SQL: insert, update y delete.
    Recibe como parámetros la sentencia SQL de tipo string y los valores de los campos respectivos en un arreglo.
    Se utiliza además, para obtener el valor de la llave primaria del último registro insertado.
    Devuelve como resultado TRUE en caso de éxito y FALSE en caso contrario.
*/
    public static function executeRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconnect();
        return $state;
    }

/*
    Método para obtener el resultado del primer registro de una consulta tipo SELECT.
    Recibe como parámetros la sentencia SQL de tipo string y los valores de los campos respectivos en un arreglo.
    Devuelve como resultado un arreglo asociativo del registro en caso de éxito, NULL en caso contrario.
*/
    public static function getRow($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

/*
    Método para obtener todos los registros de una consulta tipo SELECT.
    Recibe como parámetros la sentencia SQL de tipo string y los valores de los campos respectivos en un arreglo.
    Devuelve como resultado un arreglo asociativo de los registros en caso de éxito, NULL en caso contrario.
*/
    public static function getRows($query, $values)
    {
        self::connect();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconnect();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

/*
    Método para obtener el valor de la llave primaria del último registro insertado.
    No recibe parámetros.
*/
    public static function getLastRowId()
    {
        return self::$id;
    }

/*
    Método para obtener el mensaje de error al ocurrir una excepción.
    No recibe parámetros.
*/
    private static function getException($code, $message)
    {
        switch ($code) {
            case 1045:
                $message = 'Autenticación desconocida';
                break;
            case 1049:
                $message = 'Base de datos desconocida';
                break;
            case 1054:
                $message = 'Nombre de campo desconocido';
                break;
            case 1062:
                $message = 'Dato duplicado, no se puede guardar';
                break;
            case 1146:
                $message = 'Nombre de tabla desconocido';
                break;
            case 1451:
                $message = 'Registro ocupado, no se puede eliminar';
                break;
            case 2002:
                $message = 'Servidor desconocido';
                break;
            default:
                $message = 'Ocurrió un problema, contacte al administrador :(';
        }
        return $message;
    }
}
?>
