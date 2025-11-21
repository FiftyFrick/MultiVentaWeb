<?php
session_start();
include("conexion.php");

// Recibir datos
$usuario = $_POST['usuario'];
$password = $_POST['password'];

// Consultar base de datos
$sql = "SELECT * FROM usuariosadmin WHERE nombre = ? AND contraseña = MD5(?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $password);
$stmt->execute();
$resultado = $stmt->get_result();

if($resultado->num_rows > 0){
    $fila = $resultado->fetch_assoc();
    $_SESSION['admin'] = $fila['nombre']; // Guardamos sesión
    header("Location: ../index.php"); // Redirigir al panel
    exit();
} else {
    echo "<script>alert('Usuario o contraseña incorrectos'); window.location='../admin.php';</script>";
}

/*
INSERT INTO usuariosadmin (nombre, email, telefono, contraseña)
VALUES ('walter', 'walter@example.com', '123456789', MD5('1234'));
*/

?>


