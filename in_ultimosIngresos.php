<?php 
include "bd/conexion.php";

$productos = [];

// 🔥 Validación de conexión
if (!isset($conexion) || $conexion->connect_errno) {
    $errorDB = true;
} else {
    $errorDB = false;

    $sql = "SELECT * FROM productos ORDER BY fecha DESC LIMIT 10";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $productos[] = $fila;
        }
    }
}

if (isset($conexion)) {
    $conexion->close();
}
?>

<div class="carrusel">
  <h2>Últimos Ingresos</h2>

  <?php if ($errorDB): ?>

      <!-- 🔥 Sin base de datos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        ⚠ No se puede conectar a la base de datos.<br>
        Los últimos ingresos no están disponibles.
      </p>

  <?php elseif (count($productos) > 0): ?>

    <!-- 🔥 Carrusel -->
    <div class="carousel-container">
      <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

      <div class="carousel-wrapper">
        <div class="carousel">

          <?php foreach ($productos as $producto): ?>
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



              <p><?= $producto['nombre'] ?></p>
            </div>
          <?php endforeach; ?>

        </div>
      </div>

      <button class="carousel-btn right" onclick="moveCarousel(this, 1)">❯</button>
    </div>

  <?php else: ?>

      <!-- 🔥 Sin productos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        No hay productos para mostrar
      </p>

  <?php endif; ?>
</div>
