<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="styleIndex.css">
  <link rel='stylesheet' href='css/styleCarrusel.css'>

</head>
<body>


<div class="frame-mbp">
  
    <?php include("menu.php"); ?>

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
  
    <!-- POPUP MEJORADO -->
    <div id="popup" class="popup">
      <div class="popup-contenido popup-anim">
          
          <img id="popup-img" src="" alt="Imagen del producto">

          <h2 id="popup-nombre"></h2>

          <p id="popup-desc" class="popup-descripcion"></p>

          <p id="popup-precio" class="popup-precio"></p>

          <div class="popup-botones">
            <button id="popup-add" class="btn-agregar-popup">Agregar al carrito</button>
            <button class="btn-cerrar" onclick="cerrarPopupCarrusel()">Cerrar</button>
          </div>

      </div>
    </div>

    
</body>
</html>







<script src="js/modalindex.js" ></script>
</body>
</html>
