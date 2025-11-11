<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "multiventaservice";

$conexion = new mysqli($host, $user, $pass, $db);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}
/*
else{
    print"exito";
}
*/

$conexion->set_charset("utf8"); // Soporte para acentos y ñ
?>
