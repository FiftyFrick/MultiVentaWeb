<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cod_interno = $_POST['cod_interno'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'] ?: NULL;
    $id_sub_categoria = $_POST['id_sub_categoria'] ?: NULL;
    $precio = $_POST['precio'];
    $fecha = date('Y-m-d');

    // Manejo de imagen
    $ruta_imagen = null;
    if (!empty($_FILES['imagen']['name'])) {
        $carpetaDestino = "img/";
        $nombreArchivo = basename($_FILES["imagen"]["name"]);
        $ruta_imagen = $carpetaDestino . time() . "_" . $nombreArchivo;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_imagen)) {
            // Imagen subida con éxito
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Insertar en la base de datos
    $sql = "INSERT INTO productos (cod_interno, nombre, descripcion, id_categoria, id_sub_categoria, precio, ruta_imagen, fecha)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiiiss", $cod_interno, $nombre, $descripcion, $id_categoria, $id_sub_categoria, $precio, $ruta_imagen, $fecha);

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Producto agregado correctamente');
                window.location.href='productos.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
