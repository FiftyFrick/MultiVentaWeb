<?php
include "bd/conexion.php";

// Cambia 7 por el ID real de tu categoría "Tu Upgrade"
$idUpgrade = 5;

$sql = "SELECT * FROM productos 
        WHERE id_sub_categoria = $idUpgrade 
        ORDER BY fecha DESC 
        LIMIT 10";

$resultado = $conexion->query($sql);

$upgrade = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $upgrade[] = $fila;
    }
}

$conexion->close();
?>

<div class="carrusel">
  <h2>Tu Upgrade</h2>

  <?php if (count($upgrade) > 0): ?>
  
    <div class="carousel-container">
      <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

      <div class="carousel-wrapper">
        <div class="carousel">

          <?php foreach ($upgrade as $prod): ?>
            <div>
              <button class="btn-popup" onclick="abrirPopup('<?= $prod['ruta_imagen'] ?>', '<?= $prod['nombre'] ?>')">
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

    <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
      No hay productos para mostrar
    </p>

  <?php endif; ?>
</div>
