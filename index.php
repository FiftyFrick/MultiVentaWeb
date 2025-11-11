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
  
  <header class="topbar">
    <div class="brand">
      <div class="logo">MV</div>
      <div class="brand-name">MultiVenta</div>
    </div>
    <nav class="nav">
      <a href="index.php" class="nav-link">Inicio</a>
      <a href="productos.php" class="nav-link">Catálogo</a>
      <a href="carrito.php" class="nav-link">Carrito</a>
      <a href="quienesSomos.php" class="nav-link">Quienes Somos</a>
    </nav>
    <div class="user-area">
      <a href="admin.php"> <button class="btn ghost" > Iniciar sesión </button> </a>
    </div>

        <!-- 🟩 Caja flotante de bienvenida -->
    <!-- caja estatica  
    <div id="caja" class="caja">
      <div class="contenido">
        <span class="cerrar" onclick="toggleCaja()">&times;</span>
        <p><strong>¡Bienvenido!</strong><br>
        Revisa nuestros Últimos Productos agregados!!!</p>
      </div>
    </div>
-->
    <?php include("cajaFlotante.php"); ?>

    
  </header>

  <div class="cabeza">
    <section class="hero">
      <div class="hero-inner">
        <h1 class="hero-title">Bienvenido a <span>MultiVenta</span></h1>
        <p class="hero-sub">Tu plataforma de Pre-ventas rápida y simple.</p>
        <div class="hero-actions">
          <a href="productos.php"><button class="btn primary">Ver catálogo</button></a>
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
