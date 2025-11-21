<?php session_start(); ?>
<header class="topbar">
  <div class="brand">
    <div class="logo">MV</div>
    <div class="brand-name">MultiVenta</div>
  </div>

  <nav class="nav">
  <div class="dropdown">
    <a href="index.php" class="nav-link">Inicio</a>

    <?php if(isset($_SESSION['admin'])): ?>
      <!-- MENÚ DESPLEGABLE PARA ADMIN -->
      <div class="dropdown-content">
        <a href="productos.php" class="nav-link">Catálogo</a>
        <a href="carrito.php" class="nav-link">Carrito</a>
        <a href="quienesSomos.php" class="nav-link">Quienes Somos</a>
      </div>
    <?php else: ?>
      <!-- MENÚ NORMAL PARA USUARIO -->
      <a href="productos.php" class="nav-link">Catálogo</a>
      <a href="carrito.php" class="nav-link">Carrito</a>
      <a href="quienesSomos.php" class="nav-link">Quienes Somos</a>
    <?php endif; ?>
  </div>
</nav>


  <br>

  <?php if(isset($_SESSION['admin'])): ?>
  <nav class="nav">
    <a href="index_noticiaNueva.php" class="nav-link">Noticia Emergente</a>
    <a href="p_agregarProductos.php" class="nav-link">Agregar Productos</a>
    <a href="p_modificarProductos.php" class="nav-link">Modificar Productos</a>
  </nav>
  <?php endif; ?>

  <div class="user-area">
    <?php if(isset($_SESSION['admin'])): ?>
      <a href="adminPerfil.php"><button class="btn ghost">Perfil</button></a>
    <?php else: ?>
      <a href="admin.php"><button class="btn ghost">Iniciar Sesión</button></a>
    <?php endif; ?>
  </div>

</header>
