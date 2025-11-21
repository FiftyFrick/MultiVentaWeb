<?php include("bd/conexion.php"); ?>

<?php
// Obtener categorías
$resultCat = $conexion->query("SELECT id_categoria, nombre FROM categorias");

// Obtener subcategorías
$resultSub = $conexion->query("
    SELECT id_sub_categoria, id_categoria, nombre 
    FROM sub_categorias
");
?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>

  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/p_ModificarProductos.css'>
</head>

<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
        <h1>Modificar Productos</h1>
      </div>
<!-- ------------------ BARRA DE FILTROS ------------------ -->
<form class="filter-bar" method="GET">

  <!-- BUSCAR -->
  <div class="filter-group">
    <label for="buscar">Buscar:</label>
    <input type="text" id="buscar" name="buscar" 
           placeholder="Nombre del producto"
           value="<?= isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">
  </div>

  <!-- CATEGORÍA -->
  <div class="filter-group">
    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria">
      <option value="">Todas</option>
      <?php
        $categorias = $conexion->query("SELECT id_categoria, nombre FROM categorias");
        while ($row = $categorias->fetch_assoc()) {

          // mantener seleccionada la opción
          $selected = (isset($_GET['categoria']) && $_GET['categoria'] == $row['id_categoria'])
                        ? 'selected' : '';

          echo "<option value='{$row['id_categoria']}' $selected>{$row['nombre']}</option>";
        }
      ?>
    </select>
  </div>

  <!-- SUB CATEGORÍA -->
  <div class="filter-group">
    <label for="sub_categoria">Sub-Categoría:</label>
    <select id="sub_categoria" name="sub_categoria">
      <option value="">Todas</option>
      <?php
        $subcats = $conexion->query("SELECT id_sub_categoria, nombre FROM sub_categorias");
        while ($row = $subcats->fetch_assoc()) {

          // mantener seleccionada la opción
          $selected = (isset($_GET['sub_categoria']) && $_GET['sub_categoria'] == $row['id_sub_categoria'])
                        ? 'selected' : '';

          echo "<option value='{$row['id_sub_categoria']}' $selected>{$row['nombre']}</option>";
        }
      ?>
    </select>
  </div>

  <button type="submit" class="btn primary">Filtrar</button>
</form>


    </div>
  </header>

  <br>

  <!-- ------------------ CONTENEDOR DE PRODUCTOS ------------------ -->
  <div class="cards-grid catalog" id="contenedorProductos"></div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>


  <!-- ------------------ MODAL EDITAR PRODUCTO ------------------ -->
  <div id="modalEditarProducto" class="modal hidden">
    <div class="modal-content product-edit">

      <h2>Modificar Producto</h2>

      <form id="formEditarProducto">
        <div class="modal-grid">

          <!-- Columna izquierda -->
          <div class="left-side">

            <label>Código Interno</label>
            <input type="text" id="prod-codigo">

            <label>Nombre</label>
            <input type="text" id="prod-nombre">

            <label>Código Proveedor</label>
            <input type="text" id="prod-codprov">

            <label>Precio</label>
            <input type="text" id="prod-precio">

            <!-- -------- CATEGORÍA -------- -->
            <label>Categoría</label>
            <select id="prod-categoria">
              <option value="">Seleccione</option>
              <?php 
                $resultCat->data_seek(0);
                while ($cat = $resultCat->fetch_assoc()) { ?>
                <option value="<?= $cat['id_categoria']; ?>">
                    <?= htmlspecialchars($cat['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva categoría...</option>
            </select>

            <input type="text" id="nueva_categoria" placeholder="Ingrese nueva categoría" style="display:none;">


            <!-- -------- SUBCATEGORÍA -------- -->
            <label>Subcategoría</label>
            <select id="prod-subcategoria">
              <option value="">Seleccione</option>
              <?php 
                $resultSub->data_seek(0);
                while ($sub = $resultSub->fetch_assoc()) { ?>
                <option 
                  value="<?= $sub['id_sub_categoria']; ?>"
                  data-cat="<?= $sub['id_categoria']; ?>"
                >
                  <?= htmlspecialchars($sub['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva subcategoría...</option>
            </select>

            <input type="text" id="nueva_sub_categoria" placeholder="Ingrese nueva subcategoría" style="display:none;">


            <label>Fecha</label>
            <input type="date" id="prod-fecha">

          </div>

          <!-- Columna derecha -->
          <div class="right-side">

            <label>Descripción</label>
            <textarea id="prod-desc" rows="6"></textarea>

            <label>Imagen del Producto</label>
            <div class="preview-box">
              <img id="previewImg">
            </div>

            <label class="upload-btn">
              Cambiar imagen
              <input type="file" id="inputImg" accept="image/*">
            </label>

          </div>
        </div>

        <button type="submit" class="guardar">Guardar Cambios</button>
      </form>

      <span id="cerrarModalEditar" class="cerrar">×</span>

    </div>
  </div>


<!-- ================================================================
   JAVASCRIPT
================================================================ -->

<script src="js/visualizarProductos.js"></script>

<script src="js/logicaModalModProd.js" ></script>

<script>
/* =============================================================
    OCULTAR / ELIMINAR
============================================================= */

document.addEventListener("click", e => {
/*
  if (e.target.matches(".btn-ocultar")) {
    e.target.closest(".product-card").style.display = "none";
  }
    */

  if (e.target.matches(".btn-eliminar")) {
    const card = e.target.closest(".product-card");

    if (confirm("¿Eliminar producto?")) {

      const fd = new FormData();
      fd.append("id", card.dataset.id);

      fetch("bd/eliminar_producto.php", {
        method:"POST", body:fd
      }).then(r => r.text())
        .then(console.log);

      card.remove();
    }
  }

});
</script>

</body>
</html>
