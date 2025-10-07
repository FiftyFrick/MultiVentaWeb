<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='css/styleIndex.css'>
    <link rel='stylesheet' href='css/styleLogin.css'>


</head>
<body>
  <?php include("menu.php"); ?>

  <header>
    <h2>Panel de Administración</h2>
  </header>
  <br>
  
  <div class="contenido">
  <main>
    <section class="login-container">
      <h2>Iniciar Sesión</h2>
      <form action="login.php" method="POST" class="login-form">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Ingresar</button>

        <!--<p class="registro">Solicita Tu Registro <a href="#">Solicita Aqui</a></p> -->
      </form>
    </section>
  </main>
</div>


  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>
    
</body>
</html>
