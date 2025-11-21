<?php
include "bd/conexion.php";

// ID real de la categoría Accesorios
$idAccesorios = 2;

$accesorios = [];

// 🔥 Validar conexión antes de consultar
if (!isset($conexion) || $conexion->connect_errno) {
    $errorDB = true;
} else {
    $errorDB = false;

    $sql = "SELECT * FROM productos 
            WHERE id_categoria = $idAccesorios 
            ORDER BY fecha DESC 
            LIMIT 10";

    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $accesorios[] = $fila;
        }
    }
}

if (isset($conexion)) {
    $conexion->close();
}
?>

<div class="carrusel">
  <h2>Accesorios</h2>

  <?php if ($errorDB): ?>

      <!-- 🔥 Mensaje si NO hay base de datos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        ⚠ No se puede conectar a la base de datos.  
        El carrusel de accesorios no está disponible.
      </p>

  <?php elseif (count($accesorios) > 0): ?>

    <!-- 🔥 Carrusel -->
    <div class="carousel-container">
      <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

      <div class="carousel-wrapper">
        <div class="carousel">

          <?php foreach ($accesorios as $producto): ?>
            <div>
              <button class="btn-popup"
              onclick="abrirPopup(
                '<?= $producto['ruta_imagen'] ?>',
                '<?= htmlspecialchars($producto['nombre'], ENT_QUOTES) ?>',
                '<?= $producto['precio'] ?>',
                '<?= htmlspecialchars($producto['descripcion'], ENT_QUOTES) ?>',
                '<?= $producto['id'] ?>'
              )">
              <img src="<?= $producto['ruta_imagen'] ?>" alt="<?= $producto['nombre'] ?>">
            </button>
              <p><?= $prod['nombre'] ?></p>
            </div>
          <?php endforeach; ?>

        </div>
      </div>

      <button class="carousel-btn right" onclick="moveCarousel(this, 1)">❯</button>
    </div>

  <?php else: ?>

      <!-- 🔥 Mensaje si NO hay productos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        No hay accesorios para mostrar
      </p>

  <?php endif; ?>
</div>
