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
  <link rel='stylesheet' href='css/noticiaNueva.css'>
  

</head>
<body>
  <?php include("menu.php"); ?>
  <?php include("menuAdmin.php"); ?>


  <header>
    <div class="cabecera">
      <div class="bienvenidos">
      <h1>Noticia Nueva</h1>
    </div>    
  </header>
  <br>
  
  <div class="contenido">

    <main>
      <form action="" method="get">
        <label for="">Titulo</label>
        <input type="text">
        <br>
        <label for="">Descripcion</label>
        <input type="text">
        <br>
        <button>agregar</button>
      </form>

    </main>

    <aside>

      <h2>Noticias Segundarias</h2>
      <div class="noticias">
        <h3>lorem lorem 28/09/25</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore minima, 
          perferendis maiores est voluptate veniam suscipit sit at aperiam rerum 
          debitis ad quisquam assumenda placeat omnis repudiandae ipsa consectetur quidem!
        </p>
      </div>
      <br>
      <div class="noticias">
        <h3>lorem lorem 27/09/25</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore minima, 
          perferendis maiores est voluptate veniam suscipit sit at aperiam rerum 
          debitis ad quisquam assumenda placeat omnis repudiandae ipsa consectetur quidem!
        </p>
      </div>

    </aside>
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
