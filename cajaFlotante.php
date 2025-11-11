<?php require_once "bd/conexion.php";?>
<?php

$sql = "SELECT * FROM ventana_emergente ORDER BY id DESC LIMIT 1";
$result = $conexion->query($sql);
$noticia = $result->fetch_assoc();
?>

<div id="caja" class="caja">
  <div class="contenido">
    <span class="cerrar" onclick="toggleCaja()">&times;</span>
    <p><strong><?php echo $noticia['titulo']; ?></strong><br>
    <?php echo $noticia['descripcion']; ?></p>

    <?php if(!empty($noticia['ruta_imagen']) && file_exists($noticia['ruta_imagen'])): ?>
    <img src="<?php echo $noticia['ruta_imagen']; ?>" style="width:100%; margin-top:10px; border-radius:8px;">
    <?php endif; ?>
  </div>
</div>
