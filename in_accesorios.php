<div class="carrusel">
  <h2>Últimos Ingresos</h2>
  <div class="carousel-container">
    <button class="carousel-btn left" onclick="moveCarousel(this, -1)">❮</button>

    <div class="carousel-wrapper">
      <div class="carousel">
        <div>
          <button class="btn-popup" onclick="abrirPopup('img/img1.jpg', 'Descripción 1')">
            <img src="img/img1.jpg" alt="Imagen 1">
          </button>
          <p>Descripción 1</p>
        </div>

        <div>
          <button class="btn-popup" onclick="abrirPopup('img/img2.jpg', 'Descripción 2')">
            <img src="img/img2.jpg" alt="Imagen 2">
          </button>
          <p>Descripción 2</p>
        </div>

        <div>
          <button class="btn-popup" onclick="abrirPopup('img/img3.jpg', 'Descripción 3')">
            <img src="img/img3.jpg" alt="Imagen 3">
          </button>
          <p>Descripción 3</p>
        </div>

        <div>
          <button class="btn-popup" onclick="abrirPopup('img/img4.jpg', 'Descripción 4')">
            <img src="img/img4.jpg" alt="Imagen 4">
          </button>
          <p>Descripción 4</p>
        </div>
      </div>
    </div>

    <button class="carousel-btn right" onclick="moveCarousel(this, 1)">❯</button>
  </div>
</div>
