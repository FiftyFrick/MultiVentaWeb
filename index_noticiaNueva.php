<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/noticiaNueva.css'>
</head>

<body>
  <?php include("menuAdmin.php"); ?>


  <header>
    <div class="cabecera">
      <div class="bienvenidos">
      <h1>Noticia Emergente</h1>
    </div>    
  </header>
  
  <div class="contenido">

<main class="noticia-editor">

  <form action="" method="post" enctype="multipart/form-data">

    <div class="form-columns">

      <!-- Columna izquierda (Texto) -->
      <div class="form-left">
        <label>Título</label>
        <input type="text" name="titulo" placeholder="Ej: Promoción de verano">

        <label>Descripción</label>
        <textarea name="descripcion" placeholder="Ej: Hasta 30% OFF en productos seleccionados" ></textarea>
      </div>

      <!-- Columna derecha (Imagen) -->
      <div class="form-right">
        <label>Imagen</label>

        <div class="preview-box">
          <img id="preview-img" src="img/img1.jpg" alt="Vista previa">
        </div>

        <label class="upload-btn">
          Elegir imagen
          <input type="file" name="imagen" id="file-input" accept="image/*">
        </label>
      </div>

    </div>

    <button class="guardar-btn">Guardar cambios</button>

  </form>

</main>



  </div>


  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

<script>
document.getElementById("file-input").addEventListener("change", function(){
  const file = this.files[0];
  if(file){
    const reader = new FileReader();
    reader.onload = function(e){
      document.getElementById("preview-img").src = e.target.result;
    }
    reader.readAsDataURL(file);
  }
});
</script>


</body>
</html>
