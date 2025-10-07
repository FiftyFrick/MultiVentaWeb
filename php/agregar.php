<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Simular agregar un producto (en un caso real se extrae de base de datos)
$producto = array(
    'id' => $_GET['id'] ?? 1,
    'nombre' => $_GET['nombre'] ?? 'Producto genérico',
    'precio' => $_GET['precio'] ?? 10
);

$_SESSION['carrito'][] = $producto;

header("Location: ../carrito.php");
?>