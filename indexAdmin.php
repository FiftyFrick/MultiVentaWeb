<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styleIndex.css">
  <link rel='stylesheet' href='css/styleCarrusel.css'>

</head>
<body>


<div class="frame-mbp">
  

  
      <?php include("menuAdmin.php"); ?>


  <div class="cabeza">
    <section class="hero">
      <div class="hero-inner">
        <h1 class="hero-title">Bienvenido a <span>MultiVenta</span></h1>
        <p class="hero-sub">Tu plataforma de Pre-ventas rápida y simple.</p>
        <div class="hero-actions">
          <button class="btn primary">Ver catálogo</button>
          <button class="btn outline">Contactar</button>
        </div>
      </div>
      <div class="hero-visual">
        <div class="card-sample">
          <img src="img/xbox x.jpg" height="400px" width="600px" alt="producto ejemplo"  />
        </div>
      </div>
    </section>
  </div>

</div>


  <div class="contentMain">

    <main>
      <?php include("in_ultimosIngresos.php"); ?>

      
      <?php include("in_accesorios.php"); ?>

      
      <?php include("in_tuUpgrade.php"); ?>

    </main>

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








<script>
  
function toggleCaja() {
  const caja = document.getElementById('caja');
  caja.style.display = (caja.style.display === 'none') ? 'block' : 'none';
}

</script>

</body>
</html>
