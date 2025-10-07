function moveCarousel(button, direction) {
  // Buscar el contenedor del carrusel al que pertenece el botón
  const container = button.closest('.carousel-container');
  const carousel = container.querySelector('.carousel');
  const images = carousel.querySelectorAll('img');

  // Obtener o inicializar el índice actual del carrusel
  let currentIndex = parseInt(carousel.dataset.index) || 0;
  const imageWidth = 250 + 20; // ancho + margen (ajustá según tu CSS)

  // Actualizar índice
  currentIndex += direction;
  if (currentIndex < 0) currentIndex = images.length - 1;
  if (currentIndex >= images.length) currentIndex = 0;

  // Aplicar movimiento
  const shift = -currentIndex * imageWidth;
  carousel.style.transform = `translateX(${shift}px)`;
  carousel.style.transition = "transform 0.5s ease";

  // Guardar el índice actualizado
  carousel.dataset.index = currentIndex;
}


// ==================== POPUP ====================

function abrirPopup(imagen, descripcion) {
  document.getElementById('popup-img').src = imagen;
  document.getElementById('popup-desc').innerText = descripcion;
  document.getElementById('popup').style.display = 'flex';
}

function cerrarPopup() {
  document.getElementById('popup').style.display = 'none';
}
