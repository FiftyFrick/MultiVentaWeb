<?php include("bd/conexion.php"); ?>
<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/styleProductos.css'>
</head>
<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
        <h1>Catálogo</h1>
      </div>

      <form class="filter-bar" method="GET">
        <div class="filter-group">
          <label for="buscar">Buscar:</label>
          <input type="text" id="buscar" name="buscar" placeholder="Nombre del producto" value="<?= $_GET['buscar'] ?? '' ?>">
        </div>
        <div class="filter-group">
          <label for="categoria">Categoría:</label>
          <select id="categoria" name="categoria">
  <option value="">Todas</option>
  <?php
  $sql = "SELECT id_categoria, nombre FROM categorias";
  $result = $conexion->query($sql);
  while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['id_categoria']}'>{$row['nombre']}</option>";
  }
  ?>
</select>

        </div>
        <div class="filter-group">
          <label for="sub_categoria">Sub-Categoría:</label>
          <select id="sub_categoria" name="sub_categoria">
  <option value="">Todas</option>
  <?php
  $sql = "SELECT id_sub_categoria, nombre FROM sub_categorias";
  $result = $conexion->query($sql);
  while ($row = $result->fetch_assoc()) {
      echo "<option value='{$row['id_sub_categoria']}'>{$row['nombre']}</option>";
  }
  ?>
</select>

        </div>
        <button type="submit" class="btn primary">Filtrar</button>
      </form>
    </div>    
  </header>
  <br>

  <div class="cards-grid catalog">
    <?php
      // Capturar filtros
      $buscar = $_GET['buscar'] ?? '';
      $categoria = $_GET['categoria'] ?? '';
      $sub_categoria = $_GET['sub_categoria'] ?? '';

      // Construir la consulta dinámica
      $sql = "SELECT * FROM productos WHERE 1=1";
      if ($buscar != '') $sql .= " AND nombre LIKE '%$buscar%'";
      if ($categoria != '') $sql .= " AND categoria = '$categoria'";
      if ($sub_categoria != '') $sql .= " AND sub_categoria = '$sub_categoria'";

      $resultado = $conexion->query($sql);

      if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
          echo "
          <article class='product-card big'>
            <div class='thumb large'>
              <img src='{$fila['ruta_imagen']}' alt='{$fila['nombre']}'>
            </div>
            <div class='meta'>
              <div class='code'>COD. {$fila['cod_interno']}</div>
              <div class='name'>{$fila['nombre']}</div>
              <div class='desc'>{$fila['descripcion']}</div>
              <div class='price'>$" . number_format($fila['precio'], 0, ',', '.') . "</div>
              <button class='btn small'>Agregar al carrito</button>
            </div>
          </article>
          ";
        }
      } else {
        echo "<p style='color:white;text-align:center;'>No se encontraron productos.</p>";
      }
    ?>
  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
