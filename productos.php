<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/styleProductos.css'>

</head>
<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
      <h1>Catalogo</h1>
      </div>
      
      <div class="filter-bar">
        <div class="filter-group">
          <label for="buscar">Buscar:</label>
          <input type="text" id="buscar" placeholder="Nombre del producto">
        </div>
        <div class="filter-group">
          <label for="categoria">Categoría:</label>
          <select id="categoria">
            <option value="">Todas</option>
            <option value="electronica">Electrónica</option>
            <option value="ropa">Ropa</option>
            <option value="hogar">Hogar</option>
          </select>
          </div>
          <div class="filter-group">

          <label for="Sub-categoria">Sub-Categoría:</label>
          <select id="Sub-categoria">
            <option value="">Todas</option>
            <option value="electronica">Electrónica</option>
            <option value="ropa">Ropa</option>
            <option value="hogar">Hogar</option>
          </select>
        </div>
        <button class="btn primary">Filtrar</button>
      </div>

    </div>    
  </header>
  <br>

  <div class="cards-grid catalog">


            <!-- GTX 1660 Super -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/gtx1660super.jpeg" alt="GTX 1660 Super">
      </div>
      <div class="meta">
        <div class="name">GTX 1660 Super</div>
        <div class="desc"></div>
        <div class="price">$250.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- RX 6600 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/rx6600.jpeg" alt="RX 6600">
      </div>
      <div class="meta">
        <div class="name">RX 6600</div>
        <div class="desc"></div>
        <div class="price">$290.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Ryzen 5 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/rayzen5.jpeg" alt="Ryzen 5">
      </div>
      <div class="meta">
        <div class="name">Ryzen 5</div>
        <div class="desc"></div>
        <div class="price">$180.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Intel i7 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/inteli7.jpg" alt="Intel i7">
      </div>
      <div class="meta">
        <div class="name">Intel i7</div>
        <div class="desc"></div>
        <div class="price">$220.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Gabinete Coolermaster TD300 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/Gabinete-Coolermaster-Masterbox-Td300-Mesh-White.png" alt="Gabinete Coolermaster TD300">
      </div>
      <div class="meta">
        <div class="name">Gabinete Coolermaster TD300</div>
        <div class="desc"></div>
        <div class="price">$85.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Gabinete Cooler Master -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/gabinetecoolermaster.jpeg" alt="Gabinete Cooler Master">
      </div>
      <div class="meta">
        <div class="name">Gabinete Cooler Master</div>
        <div class="desc"></div>
        <div class="price">$70.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Intel i9 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/inteli9.jpeg" alt="Intel i9">
      </div>
      <div class="meta">
        <div class="name">Intel i9</div>
        <div class="desc"></div>
        <div class="price">$350.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Memoria DDR4 16GB -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/memddr4.jpg" alt="Memoria DDR4 16GB">
      </div>
      <div class="meta">
        <div class="name">Memoria DDR4 16GB</div>
        <div class="desc"></div>
        <div class="price">$40.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Kit Memoria DDR4 32GB -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/kitmemddr4.jpg" alt="Kit Memoria DDR4 32GB">
      </div>
      <div class="meta">
        <div class="name">Kit Memoria DDR4 32GB</div>
        <div class="desc"></div>
        <div class="price">$80.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Kit Upgrade Ryzen 7 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/kitupgrade.jpeg" alt="Kit Upgrade Ryzen 7">
      </div>
      <div class="meta">
        <div class="name">Kit Upgrade Ryzen 7</div>
        <div class="desc"></div>
        <div class="price">$300.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Mouse Gamer Logitech G Pro -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/mouse-gamer-logitech-g-pro-gaming-con-cable-luz-led-rgb-12000-dpi.jpg" alt="Mouse Gamer Logitech G Pro">
      </div>
      <div class="meta">
        <div class="name">Mouse Gamer Logitech G Pro</div>
        <div class="desc"></div>
        <div class="price">$25.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Mando PS4 -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/ps4.jpg" alt="Mando PS4">
      </div>
      <div class="meta">
        <div class="name">Mando PS4</div>
        <div class="desc"></div>
        <div class="price">$18.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Mando Xbox Series X -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/xbox x.jpg" alt="Mando Xbox Series X">
      </div>
      <div class="meta">
        <div class="name">Mando Xbox Series X</div>
        <div class="desc"></div>
        <div class="price">$20.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>

    <!-- Teclado Gamer -->
    <article class="product-card big">
      <div class="thumb large">
        <img src="img/teclado.jpg" alt="Teclado Gamer">
      </div>
      <div class="meta">
        <div class="name">Teclado Gamer</div>
        <div class="desc"></div>
        <div class="price">$15.000</div>
        <button class="btn small">Agregar al carrito</button>
      </div>
    </article>


  </div>

<!--
  <nav class="pagination">
    <a href="#">&laquo;</a> 
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">7</a>
    <a href="#">99</a>
    <a href="#">&raquo;</a> 
  </nav>
-->

  <div class="block-spam">
    <!-- spam -->
  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
