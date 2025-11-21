<?php
include("conexion.php");

$buscar        = $_GET['buscar'] ?? '';
$categoria     = $_GET['categoria'] ?? '';
$subcategoria  = $_GET['sub_categoria'] ?? '';

$sql = "SELECT * FROM productos WHERE 1=1";

if ($buscar != '') {
    $buscar = $conexion->real_escape_string($buscar);
    $sql .= " AND nombre LIKE '%$buscar%'";
}

if ($categoria != '') {
    $categoria = (int)$categoria;
    $sql .= " AND id_categoria = $categoria";
}

if ($subcategoria != '') {
    $subcategoria = (int)$subcategoria;
    $sql .= " AND id_sub_categoria = $subcategoria";
}

$sql .= " ORDER BY id ASC";

$res = $conexion->query($sql);
$data = [];

while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
