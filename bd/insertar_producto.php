<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cod_interno = $_POST['cod_interno'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $id_categoria = $_POST['id_categoria'] ?: NULL;
    $id_sub_categoria = $_POST['id_sub_categoria'] ?: NULL;
    $cod_provedor = $_POST['cod_provedor'];
    $precio = $_POST['precio'];
    $fecha = date('Y-m-d');

// Manejo de imagen
$ruta_imagen = null;
if (!empty($_FILES['imagen']['name'])) {
    // Carpeta donde se guardará físicamente (un nivel arriba)
    $carpetaServidor = "../img/";
    if (!is_dir($carpetaServidor)) mkdir($carpetaServidor, 0777, true);

    // Nombre de archivo con timestamp
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $nombreServidor = time() . "_" . $nombreArchivo;

    // Ruta real en el servidor
    $rutaServidor = $carpetaServidor . $nombreServidor;

    // Ruta que se guardará en la base de datos (visible desde el proyecto)
    $ruta_imagen = "img/" . $nombreServidor;

    // Mover archivo subido
    if (!move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaServidor)) {
        echo "Error al subir la imagen.";
        $ruta_imagen = null;
    }
}



    // Insertar en la base de datos
    $sql = "INSERT INTO productos 
        (cod_interno, nombre, descripcion, id_categoria, id_sub_categoria, cod_provedor, precio, ruta_imagen, fecha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssiisdss",
        $cod_interno,
        $nombre,
        $descripcion,
        $id_categoria,
        $id_sub_categoria,
        $cod_provedor,
        $precio,
        $ruta_imagen,
        $fecha
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('✅ Producto agregado correctamente');
                window.location.href='../productos.php';
              </script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>
