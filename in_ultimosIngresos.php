<?php 
include "bd/conexion.php";

$sql = "SELECT * FROM productos ORDER BY fecha DESC LIMIT 10";
$resultado = $conexion->query($sql);

$productos = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $productos[] = $fila;
    }
}

$conexion->close();
?>

<div class="carrusel">
  <h2>Últimos Ingresos</h2>

  <?php if (count($productos) > 0): ?>

    <div class="carousel-container">
      <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

      <div class="carousel-wrapper">
        <div class="carousel">

          <?php foreach ($productos as $producto): ?>
            <div>
              <button class="btn-popup" onclick="abrirPopup('<?= $producto['ruta_imagen'] ?>', '<?= $producto['nombre'] ?>')">
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

    <p style="text-align:center; padding:20px; color:#ccc; font-size:18px;">
      No hay productos para mostrar
    </p>

  <?php endif; ?>
</div>
