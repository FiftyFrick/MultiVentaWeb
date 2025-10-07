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
<!--  <?php include("menuAdmin.php"); ?> -->
  
  <header>
    <div class="cabecera">
      <div class="bienvenidos">
      <h1>Bienvenido a MultiVenta</h1>
      <p>Tu tienda multipropósito de confianza.</p>
      <!--<button class="btn" onclick="mostrarMensaje()">Notificaciones</button> -->

      <div id="caja" class="caja">
        <div class="contenido">
          <span class="cerrar" onclick="toggleCaja()">&times;</span>
          <p><strong>¡Bienvenido!</strong><br>
          Este es un panel lateral que se despliega.
          </p>
        </div>

        <div class="boton" onclick="toggleCaja()">☰</div>
      </div>
      </div>
      <div class="ads">
        <!-- spam -->
      </div>
    </div>    
  </header>
  <br>
  
  <div class="contentMain">

    <main>
      <?php include("in_ultimosIngresos.php"); ?>

      
      <?php include("in_accesorios.php"); ?>

      
      <?php include("in_tuUpgrade.php"); ?>

    </main>
<!--
    <aside>
    </aside>
-->
  </div>


  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

  <script src="js/carrusel.js"></script>
  <script src="js/mensajeEmergente.js"></script>


  

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
