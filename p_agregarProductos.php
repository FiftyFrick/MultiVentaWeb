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
  <?php include("menuAdmin.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
        <h1>Agregar Productos</h1>
      </div>
    </div>    
  </header>

  <div class="contenido">
    
  <main class="content">
  
<!-- Imagen -->
<div class="product-image">
  <p class="label">Imagen del Producto</p>

  <div class="thumb-preview">
    <img id="preview-img" src="img/img1.jpg" alt="Vista previa del producto">
  </div>

  <label class="upload-btn">
    Subir imagen
    <input id="file-input" type="file" class="input-file" accept="image/*">
  </label>
</div>


  <!-- Datos -->
  <div class="product-data">
    <div class="field-group">
      <label>Código Interno del Producto</label>
      <input type="text" placeholder="COD. 0000">
    </div>

    <div class="field-group">
      <label>Nombre del Producto</label>
      <input type="text" placeholder="Ej: GTX 1660 Super">
    </div>

    <div class="field-group">
      <label>Descripción</label>
      <textarea rows="5" placeholder="Ingrese una descripción..."></textarea>
    </div>
    
    <div class="field-group">
      <label>Código del Proveedor</label>
      <input type="text" placeholder="COD. 0000">
    </div>

    <div class="field-group">
      <label>Precio</label>
      <input type="number" placeholder="$">
    </div>

    <div class="actions">
      <button class="btn-guardar">Guardar</button>
      <button class="btn-limpiar">Limpiar</button>
      <button class="btn-cancelar">Cancelar</button>
    </div>
  </div>

</main>

  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

<script>
  const fileInput = document.getElementById("file-input");
  const previewImg = document.getElementById("preview-img");

  fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    if (file) {
      previewImg.src = URL.createObjectURL(file);
    }
  });
</script>

</body>
</html>
