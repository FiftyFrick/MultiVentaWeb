<?php include("bd/conexion.php"); ?>


<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/styleProductos.css'>
  <link rel='stylesheet' href='css/p_agregarProductos.css'>
</head>



<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
        <h1>Agregar Productos</h1>
      </div>
    </div>    
  </header>

  <div class="contenido">
    
    <main class="content">

          <?php
    // Consultar todas las categorías
    $sqlCat = "SELECT id_categoria, nombre FROM categorias ORDER BY nombre";
    $resultCat = $conexion->query($sqlCat);

    // Consultar todas las subcategorías
    $sqlSub = "SELECT id_sub_categoria, id_categoria, nombre FROM sub_categorias ORDER BY nombre";
    $resultSub = $conexion->query($sqlSub);
    ?>

      <form class="formproducto" action="insertar_producto.php" method="POST" enctype="multipart/form-data">
        <!-- Imagen -->
        <div class="product-image">
          <p class="fecha" id="fecha-actual"></p>
          <input type="hidden" id="fecha-input" name="fecha">

          <p class="label">Imagen del Producto</p>
          <div class="thumb-preview">
            <img id="preview-img" src="img/img1.jpg" alt="Vista previa del producto">
          </div>

          <label class="upload-btn">
            Subir imagen
            <input id="file-input" type="file" name="imagen" class="input-file" accept="image/*">
          </label>
        </div>
 


          <!-- Datos -->
        <div class="product-data">
          <div class="field-group">
            <label>Código Interno del Producto</label>
            <input type="text" name="cod_interno" placeholder="COD. 0000" required>
          </div>

          <div class="field-group">
            <label>Nombre del Producto</label>
            <input type="text" name="nombre" placeholder="Ej: GTX 1660 Super" required>
          </div>

          <div class="field-group">
            <label>Descripción</label>
            <textarea name="descripcion" rows="5" placeholder="Ingrese una descripción..."></textarea>
          </div>

          <!-- CATEGORÍA -->
          <div class="field-group">
            <label>Categoría</label>
            <select name="id_categoria" id="categoria" required>
              <option value="">Seleccione</option>
              <?php while ($cat = $resultCat->fetch_assoc()) { ?>
                <option value="<?php echo $cat['id_categoria']; ?>">
                  <?php echo htmlspecialchars($cat['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva categoría...</option>
            </select>

            <!-- Campo oculto para nueva categoría -->
            <input type="text" id="nueva_categoria" name="nueva_categoria" placeholder="Ingrese nueva categoría" style="display:none;">
          </div>

          <!-- SUBCATEGORÍA -->
          <div class="field-group">
            <label>Sub-Categoría</label>
            <select name="id_sub_categoria" id="sub_categoria" required>
              <option value="">Seleccione</option>
              <?php while ($sub = $resultSub->fetch_assoc()) { ?>
                <option value="<?php echo $sub['id_sub_categoria']; ?>" data-cat="<?php echo $sub['id_categoria']; ?>">
                  <?php echo htmlspecialchars($sub['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva subcategoría...</option>
            </select>

            <!-- Campo oculto para nueva subcategoría -->
            <input type="text" id="nueva_sub_categoria" name="nueva_sub_categoria" placeholder="Ingrese nueva subcategoría" style="display:none;">
          </div>


          <div class="field-group">
            <label>Código del Provedor</label>
            <input type="text" name="cod_provedor" placeholder="COD. 0000" required>
          </div>
          
          <div class="field-group">
          <label>Precio</label>
          <input type="number" step="0.01" name="precio" placeholder="$" required>
        </div>

          <div class="actions">
            <button type="submit" class="btn-guardar">Guardar</button>
            <button type="reset" class="btn-limpiar">Limpiar</button>
            <button type="button" class="btn-cancelar" onclick="window.location.href='productos.php'">Cancelar</button>
          </div>
        </div>

      </form>

        

    </main>

  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>



<script src="js/agregarProductos.js" ></script>


</body>
</html>
