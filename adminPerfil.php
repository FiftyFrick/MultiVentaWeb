<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - MultiVenta</title>
    <link rel='stylesheet' href='css/styleIndex.css'>
    <link rel='stylesheet' href='css/styleLogin.css'>
    <link rel='stylesheet' href='css/adminPerfil.css'> <!-- Nuevo CSS para este diseño -->
</head>
<body>
  <?php include("menu.php"); ?>
  <?php include("menuAdmin.php"); ?>

  <header>
    <h2>Panel de Perfil</h2>
  </header>
  
  <div class="contenido">
    <main>
      <section class="perfil-container">
        <div class="perfil-card">
          <!-- Avatar -->
          <img src="img/avatar.png" alt="Foto de perfil" class="perfil-avatar">
          
          <!-- Info usuario -->
          <h2>Walter</h2>
          <p class="rol">Administrador</p>
          <p class="email">walter@multiventa.com</p>
          <hr>

          <!-- Detalles -->
          <div class="perfil-detalles">
            <p><strong>Último acceso:</strong> 26/09/2025</p>
            <p><strong>Estado:</strong> Activo ✅</p>
          </div>

          <!-- Botones -->
          <div class="perfil-acciones">
            <button>Editar Perfil</button>
            <button>Cambiar Contraseña</button>
            <button class="logout">Cerrar Sesión</button>
          </div>
        </div>
      </section>
    </main>
  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
