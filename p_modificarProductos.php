<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>
  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/p_ModificarProductos.css'>

</head>
<body>
  <?php include("menuAdmin.php"); ?>

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


<article class="product-card big">
  <div class="thumb large">
    <img src="img/gtx1660super.jpeg" alt="GTX 1660 Super">
  </div>
  <div class="meta">
    <div class="code">COD. 8345</div>  <!-- NUEVO -->
    <div class="name">GTX 1660 Super</div>
    <div class="desc"> Rendimiento sólido para gaming en 1080p. Ideal para juegos competitivos y títulos exigentes a buena calidad gráfica. Bajo consumo, mantiene buenas temperaturas y es compatible con la mayoría de las PCs actuales.    </div>
    <div class="code">Cod. Prov. zv012</div>  <!-- NUEVO -->
    <div class="price">$250.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>
<!-- RX 6600 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/rx6600.jpeg" alt="RX 6600">
  </div>
  <div class="meta">
    <div class="code">COD. 8432</div>
    <div class="name">RX 6600</div>
    <div class="desc">Placa de video AMD serie 6000, excelente rendimiento 1080p.</div>
    <div class="code">Cod. Prov. rx6600-a1</div>
    <div class="price">$290.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Ryzen 5 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/rayzen5.jpeg" alt="Ryzen 5">
  </div>
  <div class="meta">
    <div class="code">COD. 5129</div>
    <div class="name">Ryzen 5</div>
    <div class="desc">Procesador Ryzen de última generación, ideal para gaming.</div>
    <div class="code">Cod. Prov. ry5-b3</div>
    <div class="price">$180.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Intel i7 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/inteli7.jpg" alt="Intel i7">
  </div>
  <div class="meta">
    <div class="code">COD. 7730</div>
    <div class="name">Intel i7</div>
    <div class="desc">Procesador Intel Core i7 para alto rendimiento en tareas pesadas.</div>
    <div class="code">Cod. Prov. i7-k9</div>
    <div class="price">$220.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Gabinete Coolermaster TD300 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/Gabinete-Coolermaster-Masterbox-Td300-Mesh-White.png" alt="Gabinete Coolermaster TD300">
  </div>
  <div class="meta">
    <div class="code">COD. 9901</div>
    <div class="name">Gabinete Coolermaster TD300</div>
    <div class="desc">Gabinete ATX ventilado con panel frontal mesh.</div>
    <div class="code">Cod. Prov. td300-wh</div>
    <div class="price">$85.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Gabinete Cooler Master -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/gabinetecoolermaster.jpeg" alt="Gabinete Cooler Master">
  </div>
  <div class="meta">
    <div class="code">COD. 4521</div>
    <div class="name">Gabinete Cooler Master</div>
    <div class="desc">Gabinete compacto con diseño minimalista.</div>
    <div class="code">Cod. Prov. cmx202</div>
    <div class="price">$70.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Intel i9 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/inteli9.jpeg" alt="Intel i9">
  </div>
  <div class="meta">
    <div class="code">COD. 9888</div>
    <div class="name">Intel i9</div>
    <div class="desc">Procesador tope de gama para entornos profesionales y gaming extremo.</div>
    <div class="code">Cod. Prov. i9-x7</div>
    <div class="price">$350.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Memoria DDR4 16GB -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/memddr4.jpg" alt="Memoria DDR4 16GB">
  </div>
  <div class="meta">
    <div class="code">COD. 1440</div>
    <div class="name">Memoria DDR4 16GB</div>
    <div class="desc">Memoria para PC de alto rendimiento.</div>
    <div class="code">Cod. Prov. d4-16x</div>
    <div class="price">$40.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Kit Memoria DDR4 32GB -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/kitmemddr4.jpg" alt="Kit Memoria DDR4 32GB">
  </div>
  <div class="meta">
    <div class="code">COD. 1672</div>
    <div class="name">Kit Memoria DDR4 32GB</div>
    <div class="desc">Kit dual channel para mejor rendimiento.</div>
    <div class="code">Cod. Prov. d4-32-kit</div>
    <div class="price">$80.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Kit Upgrade Ryzen 7 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/kitupgrade.jpeg" alt="Kit Upgrade Ryzen 7">
  </div>
  <div class="meta">
    <div class="code">COD. 3031</div>
    <div class="name">Kit Upgrade Ryzen 7</div>
    <div class="desc">Incluye placa + CPU + RAM para actualización completa.</div>
    <div class="code">Cod. Prov. up-ry7</div>
    <div class="price">$300.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Mouse Gamer -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/mouse-gamer-logitech-g-pro-gaming-con-cable-luz-led-rgb-12000-dpi.jpg" alt="Mouse Gamer Logitech G Pro">
  </div>
  <div class="meta">
    <div class="code">COD. 1104</div>
    <div class="name">Mouse Gamer Logitech G Pro</div>
    <div class="desc">Sensor preciso, RGB, diseñado para eSports.</div>
    <div class="code">Cod. Prov. lg-gp</div>
    <div class="price">$25.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Mando PS4 -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/ps4.jpg" alt="Mando PS4">
  </div>
  <div class="meta">
    <div class="code">COD. 4120</div>
    <div class="name">Mando PS4</div>
    <div class="desc">Control inalámbrico compatible con PlayStation 4.</div>
    <div class="code">Cod. Prov. ps4-c1</div>
    <div class="price">$18.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Mando Xbox -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/xbox x.jpg" alt="Mando Xbox Series X">
  </div>
  <div class="meta">
    <div class="code">COD. 5302</div>
    <div class="name">Mando Xbox Series X</div>
    <div class="desc">Control oficial con cableado mejorado.</div>
    <div class="code">Cod. Prov. xb-sx2</div>
    <div class="price">$20.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
  </div>
</article>

<!-- Teclado Gamer -->
<article class="product-card big">
  <div class="thumb large">
    <img src="img/teclado.jpg" alt="Teclado Gamer">
  </div>
  <div class="meta">
    <div class="code">COD. 2980</div>
    <div class="name">Teclado Gamer</div>
    <div class="desc">Teclado retroiluminado ideal para gaming.</div>
    <div class="code">Cod. Prov. tk-bs1</div>
    <div class="price">$15.000</div>
    <div class="admin-actions">
      <button class="btn-ocultar">Ocultar</button>
      <button class="btn-modificar">Modificar</button>
      <button class="btn-eliminar">Eliminar</button>
    </div>
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

<!-- MODAL MODIFICAR PRODUCTO -->
<div id="modalEditarProducto" class="modal hidden">
  <div class="modal-content product-edit">

    <h2>Modificar Producto</h2>

    <form>
      <div class="modal-grid">

        <!-- Columna izquierda -->
        <div class="left-side">
          <label>Código</label>
          <input type="text" id="prod-codigo" value="COD. 8345">

          <label>Nombre</label>
          <input type="text" id="prod-nombre" value="GTX 1660 Super">

          <label>Código Proveedor</label>
          <input type="text" id="prod-codprov" value="zv012">

          <label>Precio</label>
          <input type="text" id="prod-precio" value="$250.000">
        </div>

        <!-- Columna derecha -->
        <div class="right-side">

          <label>Descripción</label>
          <textarea id="prod-desc" rows="6">Rendimiento sólido para gaming en 1080p...</textarea>

          <label>Imagen del Producto</label>
          <div class="preview-box" id="previewBox">
            <img src="img/gtx1660super.jpeg" alt="" id="previewImg">
          </div>

          <label class="upload-btn">
            Cambiar imagen
            <input type="file" id="inputImg" accept="image/*">
          </label>

        </div>

      </div>

      <button class="guardar">Guardar Cambios</button>
    </form>

    <span id="cerrarModalEditar" class="cerrar">×</span>
  </div>
</div>



<script>
  // Referencias
  const modalProducto = document.getElementById('modalEditarProducto');
  const btnModificar = document.querySelectorAll('.btn-modificar');
  const cerrarModalProd = document.getElementById('cerrarModalEditar');
  const inputImg = document.getElementById('inputImg');
  const previewImg = document.getElementById('previewImg');
  const form = modalProducto.querySelector('form');

  // Función para abrir modal y poblar campos desde la tarjeta
  function abrirModalDesdeCard(cardEl) {
    // Buscar datos dentro de la card
    const codeEl = cardEl.querySelector('.code');
    const nameEl = cardEl.querySelector('.name');
    const descEl = cardEl.querySelector('.desc');
    const priceEl = cardEl.querySelector('.price');
    const thumbImg = cardEl.querySelector('.thumb img');

    // Inputs del modal
    const inpCodigo = document.getElementById('prod-codigo');
    const inpNombre = document.getElementById('prod-nombre');
    const inpCodProv = document.getElementById('prod-codprov');
    const inpPrecio = document.getElementById('prod-precio');
    const inpDesc = document.getElementById('prod-desc');

    // Rellenar (si no encuentra, vacía)
    inpCodigo.value = codeEl ? codeEl.textContent.replace('COD.','').trim() : '';
    inpNombre.value = nameEl ? nameEl.textContent.trim() : '';
    // Intentar sacar código proveedor si existe en segunda .code dentro de la meta
    const codes = cardEl.querySelectorAll('.code');
    inpCodProv.value = codes && codes.length > 1 ? codes[1].textContent.replace(/Cod\.? Prov\.?/i, '').trim() : '';
    inpPrecio.value = priceEl ? priceEl.textContent.trim() : '';
    inpDesc.value = descEl ? descEl.textContent.trim() : '';
    previewImg.src = thumbImg ? thumbImg.src : '';

    // guardar referencia a la card en el modal (para aplicar cambios luego)
    modalProducto.currentCard = cardEl;

    modalProducto.classList.remove('hidden');
  }

  // Asignar handler a cada botón modificar
  btnModificar.forEach(btn => {
    btn.addEventListener('click', (e) => {
      // Buscar la tarjeta contenedora (article.product-card)
      const card = e.target.closest('.product-card');
      if (!card) return console.warn('No se encontró la tarjeta del producto.');
      abrirModalDesdeCard(card);
    });
  });

  // Cerrar modal (X)
  if (cerrarModalProd) cerrarModalProd.addEventListener('click', () => {
    modalProducto.classList.add('hidden');
  });

  // Cerrar clic fuera del contenido
  window.addEventListener('click', (e) => {
    if (e.target === modalProducto) modalProducto.classList.add('hidden');
  });

  // Preview al subir imagen
  if (inputImg) {
    inputImg.addEventListener('change', function(){
      const file = this.files[0];
      if(file){
        previewImg.src = URL.createObjectURL(file);
      }
    });
  }

  // Acción "Guardar cambios" -> actualiza la tarjeta en la UI (y cierra modal)
  form.addEventListener('submit', function(e){
    e.preventDefault();
    const card = modalProducto.currentCard;
    if (!card) {
      modalProducto.classList.add('hidden');
      return;
    }

    // Leer inputs
    const inpCodigo = document.getElementById('prod-codigo').value.trim();
    const inpNombre = document.getElementById('prod-nombre').value.trim();
    const inpCodProv = document.getElementById('prod-codprov').value.trim();
    const inpPrecio = document.getElementById('prod-precio').value.trim();
    const inpDesc = document.getElementById('prod-desc').value.trim();

    // Aplicar a la tarjeta (se supone que la estructura coincide)
    const codes = card.querySelectorAll('.code');
    if (codes && codes.length > 0) codes[0].textContent = 'COD. ' + inpCodigo;
    if (codes && codes.length > 1) codes[1].textContent = 'Cod. Prov. ' + inpCodProv;

    const nameEl = card.querySelector('.name');
    if (nameEl) nameEl.textContent = inpNombre;

    const descEl = card.querySelector('.desc');
    if (descEl) descEl.textContent = inpDesc;

    const priceEl = card.querySelector('.price');
    if (priceEl) priceEl.textContent = inpPrecio;

    // si la imagen fue cambiada, actualizar la miniatura
    const thumbImg = card.querySelector('.thumb img');
    if (thumbImg && previewImg.src) thumbImg.src = previewImg.src;

    // Aquí podrías enviar un fetch/ajax al backend para persistir los cambios
    // fetch('/api/producto/actualizar', { method:'POST', body: FormData... })

    modalProducto.classList.add('hidden');
  });

  // Funcionalidad Ocultar / Eliminar (delegación simple)
  document.addEventListener('click', function(e){
    if (e.target.matches('.btn-ocultar')) {
      const card = e.target.closest('.product-card');
      if (card) {
        card.style.display = 'none'; // ocultar visualmente
        // si quieres deshacer ocultado podrías añadir un toast con "Deshacer"
      }
    }

    if (e.target.matches('.btn-eliminar')) {
      const card = e.target.closest('.product-card');
      if (card) {
        if (confirm('¿Eliminar producto? Esta acción no se puede deshacer en la UI.')) {
          card.remove();
          // aquí deberías llamar al backend para borrar permanentemente
        }
      }
    }
  });
</script>



</body>
</html>
