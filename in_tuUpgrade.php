<?php
include "bd/conexion.php";

$idUpgrade = 5;

$upgrade = [];

// 🔥 Validar la conexión primero
if (!isset($conexion) || $conexion->connect_errno) {
    $errorDB = true;
} else {
    $errorDB = false;

    $sql = "SELECT * FROM productos 
            WHERE id_sub_categoria = $idUpgrade 
            ORDER BY fecha DESC 
            LIMIT 10";

    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $upgrade[] = $fila;
        }
    }
}

if (isset($conexion)) {
    $conexion->close();
}
?>

<div class="carrusel">
  <h2>Tu Upgrade</h2>

  <?php if ($errorDB): ?>

      <!-- Sin base de datos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        ⚠ No se puede conectar a la base de datos.  
        No es posible mostrar las opciones de upgrade.
      </p>

  <?php elseif (count($upgrade) > 0): ?>

    <!-- Carrusel -->
    <div class="carousel-container">
      <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

      <div class="carousel-wrapper">
        <div class="carousel">

          <?php foreach ($upgrade as $prod): ?>
            <div>
              <button class="btn-popup"
                onclick="abrirPopup(
                  '<?= $prod['ruta_imagen'] ?>',
                  '<?= htmlspecialchars($prod['nombre'], ENT_QUOTES) ?>',
                  '<?= $prod['precio'] ?>',
                  '<?= htmlspecialchars($prod['descripcion'], ENT_QUOTES) ?>',
                  '<?= $prod['id'] ?>'
                )">
                <img src="<?= $prod['ruta_imagen'] ?>" alt="<?= $prod['nombre'] ?>">
              </button>

              <p><?= $prod['nombre'] ?></p>
            </div>
          <?php endforeach; ?>

        </div>
      </div>

      <button class="carousel-btn right" onclick="moveCarousel(this, 1)">❯</button>
    </div>

  <?php else: ?>

      <!-- Sin productos -->
      <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
        No hay productos para mostrar
      </p>

  <?php endif; ?>
</div>
