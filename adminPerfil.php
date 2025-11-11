<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - MultiVenta</title>
    <link rel='stylesheet' href='styleIndex.css'>
    <link rel='stylesheet' href='css/styleLogin.css'>
    <link rel='stylesheet' href='css/adminPerfil.css'> <!-- Nuevo CSS para este diseño -->
</head>
<body>
  <?php include("menuAdmin.php"); ?>

  <header>
    <h2>Panel de Perfil</h2>
  </header>
  
  <div class="contenido">
    <main>
      <section class="perfil-container">
  <div class="perfil-card">

    <div class="perfil-col izq">
      <img src="img/avatar.png" alt="Foto de perfil" class="perfil-avatar">
      <h2>Walter</h2>
      <p class="rol">Administrador</p>
      <p class="email">walter@multiventa.com</p>
      <hr>
    </div>

    <div class="perfil-col der">
      <div class="perfil-detalles">
        <p><strong>Último acceso:</strong> 26/09/2025</p>
        <p><strong>Estado:</strong> Activo ✅</p>
      </div>

      <div class="perfil-acciones">
        <button id="btnEditarPerfil">Editar Perfil</button>
        <button id="btnCambiarPass">Cambiar Contraseña</button>
        <button class="logout">Cerrar Sesión</button>
      </div>
    </div>

  </div>
</section>

    </main>
  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

  <!-- MODAL EDITAR PERFIL -->
<div id="modalPerfil" class="modal hidden">
  <div class="modal-content">
    
    <h2>Editar Perfil</h2>

    <form>
      <label>Nombre</label>
      <input type="text" value="Walter">

      <label>Email</label>
      <input type="text" value="walter@multiventa.com">

      <label>Rol</label>
      <input type="text" value="Administrador" disabled style="opacity: 0.6; cursor: not-allowed;">

      <button class="guardar">Guardar Cambios</button>
    </form>

    <span id="cerrarModal" class="cerrar">×</span>
  </div>
</div>

<!-- MODAL CAMBIAR CONTRASEÑA -->
<div id="modalPass" class="modal hidden">
  <div class="modal-content">
    
    <h2>Cambiar Contraseña</h2>

    <form>
      <label>Contraseña Actual</label>
      <input type="password" placeholder="********">

      <label>Nueva Contraseña</label>
      <input type="password" placeholder="********">

      <label>Repetir Nueva Contraseña</label>
      <input type="password" placeholder="********">

      <button class="guardar">Guardar Nueva Contraseña</button>
    </form>

    <span id="cerrarModalPass" class="cerrar">×</span>
  </div>
</div>



<script>
  const modal = document.getElementById('modalPerfil');
  const btn = document.getElementById('btnEditarPerfil');
  const cerrar = document.getElementById('cerrarModal');

  btn.onclick = () => modal.classList.remove('hidden');
  cerrar.onclick = () => modal.classList.add('hidden');

  // Cerrar clickeando fuera de la caja
  window.onclick = (e) => {
    if(e.target === modal) modal.classList.add('hidden');
  }
</script>


<script>
  const modalPass = document.getElementById('modalPass');
  const btnPass = document.getElementById('btnCambiarPass');
  const cerrarPass = document.getElementById('cerrarModalPass');

  btnPass.onclick = () => modalPass.classList.remove('hidden');
  cerrarPass.onclick = () => modalPass.classList.add('hidden');

  window.onclick = (e) => {
    if (e.target === modalPass) modalPass.classList.add('hidden');
  }
</script>


</body>
</html>
