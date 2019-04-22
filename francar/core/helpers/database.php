<?php
$host="localhost";
$user="root";
$password="";
$db="libreria_francar";
try{
$conn = new mysqli($host,$user,$password,$db);
}catch(PDOException $e){
    echo ':(Error al conectar con la base de datos ' .$e;
    exit;
}
echo'SI CONECTA WUJUUUUUUUUU';
return $conn;
?>
