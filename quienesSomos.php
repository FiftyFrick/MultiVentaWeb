<!DOCTYPE html>
<html lang='es'>
<head>
<!--
<script>
  // Detectar el modo antes de que cargue el body
  if (localStorage.getItem('modo') === 'oscuro') {
    document.documentElement.classList.add('dark-mode');
  }
</script>
-->
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='css/styleIndex.css'>
  <link rel='stylesheet' href='css/styleCarrusel.css'>

</head>
<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
      <h1>Quienes Somos</h1>
      </div>
    </div>    
  </header>
  <br>
  
  <div class="contenido">

    <main>


    </main>


  </div>


  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

  <script src="js/carrusel.js"></script>

    <!-- SOLO UN POPUP -->
  <div id="popup" class="popup">
    <div class="popup-contenido">
      <img id="popup-img" src="" alt="Imagen Pop-up">
      <p id="popup-desc"></p>
      <button class="btn-cerrar" onclick="cerrarPopup()">Cerrar</button>
    </div>
  </div>

</body>
</html>
