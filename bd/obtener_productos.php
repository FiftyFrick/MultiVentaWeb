<?php
header("Content-Type: application/json; charset=utf-8");
require_once "conexion.php";  // Ajusta la ruta si está en otra carpeta

// Consulta
$sql = "SELECT * FROM productos";

$resultado = $conexion->query($sql);

// Verificar error en la consulta
if (!$resultado) {
    echo json_encode(["error" => "Error en la consulta SQL: " . $conexion->error]);
    exit;
}

$productos = [];

while ($fila = $resultado->fetch_assoc()) {
    $productos[] = $fila;
}

// Respuesta en JSON
echo json_encode($productos, JSON_UNESCAPED_UNICODE);
?>
