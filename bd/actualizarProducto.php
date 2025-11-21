<?php
require "conexion.php";

// -------------------------------------------
// VALIDAR CAMPOS REQUERIDOS
// -------------------------------------------

// -------------------------------------------
// VALIDAR CAMPOS REQUERIDOS + MOSTRAR VALORES
// -------------------------------------------
$errores = [];

/*
$campos = [
    "id",
    "cod_interno",
    "nombre",
    "descripcion",
    "cod_provedor",
    "precio"
];

foreach ($campos as $c) {
    if (!isset($_POST[$c])) {
        $errores[] = "$c NO recibido";
    } else {
        $valor = $_POST[$c];
        echo "POST[$c] = " . ($valor === "" ? "(vacío)" : $valor) . "\n";
    }
}

echo "\n------------------------------------\n";
*/
if (!empty($errores)) {
    echo "ERROR: Faltan datos obligatorios:\n";
    foreach ($errores as $e) echo "- $e\n";
    exit;
}

// echo "OK: Todos los campos requeridos llegaron.\n\n";


$id             = $_POST["id"];
$codigo         = $_POST["cod_interno"];
$nombre         = $_POST["nombre"];
$descripcion    = $_POST["descripcion"];
$cod_provedor   = $_POST["cod_provedor"];
$precio         = $_POST["precio"];
$fecha          = $_POST["fecha"] ?? null;

$id_categoria    = $_POST["id_categoria"]    ?? null;
$id_subcategoria = $_POST["id_sub_categoria"] ?? null;

$nueva_categoria     = trim($_POST["nueva_categoria"] ?? "");
$nueva_subcategoria  = trim($_POST["nueva_subcategoria"] ?? "");


// -------------------------------------------
// CREAR NUEVA CATEGORÍA
// -------------------------------------------

if ($nueva_categoria !== "") {

    $sql = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
    $sql->bind_param("s", $nueva_categoria);
    $sql->execute();

    $id_categoria = $conexion->insert_id;
}


// -------------------------------------------
// CREAR NUEVA SUBCATEGORÍA
// -------------------------------------------

if ($nueva_subcategoria !== "") {

    if (!$id_categoria) {
        echo "ERROR: No se puede crear subcategoría sin categoría.";
        exit;
    }

    $sql = $conexion->prepare("INSERT INTO sub_categorias (id_categoria, nombre) VALUES (?, ?)");
    $sql->bind_param("is", $id_categoria, $nueva_subcategoria);
    $sql->execute();

    $id_subcategoria = $conexion->insert_id;
}


// -------------------------------------------
// SUBIR IMAGEN
// -------------------------------------------

$nombre_imagen_final = null;

if (isset($_FILES["ruta_imagen"]) && $_FILES["ruta_imagen"]["error"] === 0) {

    $tmp = $_FILES["ruta_imagen"]["tmp_name"];
    $nombreImg = time() . "_" . $_FILES["ruta_imagen"]["name"];

    $destino = "../img_productos/" . $nombreImg;

    if (move_uploaded_file($tmp, $destino)) {
        $nombre_imagen_final = "img_productos/" . $nombreImg;
    } else {
        echo "ERROR: No se pudo guardar la imagen.";
        exit;
    }
}


// -------------------------------------------
// UPDATE DEL PRODUCTO
// -------------------------------------------

if ($nombre_imagen_final) {

  $sql = $conexion->prepare("
    UPDATE productos
    SET cod_interno=?, nombre=?, descripcion=?, cod_provedor=?, 
        precio=?, fecha=?, id_categoria=?, id_sub_categoria=?, ruta_imagen=?
    WHERE id=?
");

$sql->bind_param(
    "ssssdsiisi",
    $codigo,
    $nombre,
    $descripcion,
    $cod_provedor,
    $precio,
    $fecha,
    $id_categoria,
    $id_subcategoria,
    $nombre_imagen_final,
    $id
);



} else {

    $sql = $conexion->prepare("
    UPDATE productos
    SET cod_interno=?, nombre=?, descripcion=?, cod_provedor=?, 
        precio=?, fecha=?, id_categoria=?, id_sub_categoria=?
    WHERE id=?
");

$sql->bind_param(
    "ssssdsiii",
    $codigo,
    $nombre,
    $descripcion,
    $cod_provedor,
    $precio,
    $fecha,
    $id_categoria,
    $id_subcategoria,
    $id
);


}

$ok = $sql->execute();


// -------------------------------------------
// RESPUESTA
// -------------------------------------------

if ($ok) {
    echo "OK: Producto actualizado correctamente.";
} else {
    echo "ERROR: No se pudo actualizar el producto.";
}
