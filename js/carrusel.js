function moveCarousel(button, direction) {
  const container = button.closest('.carousel-container');
  const carousel = container.querySelector('.carousel');
  const items = carousel.querySelectorAll('div');

  // Tamaño de cada item (ajustalo si tu CSS cambia)
  const itemWidth = 250 + 20; // ancho + margen

  // Cantidad total de ítems
  const totalItems = items.length;

  // Ancho visible del carrusel
  const wrapper = container.querySelector('.carousel-wrapper');
  const visibleWidth = wrapper.offsetWidth;

  // Cuántos items entran en pantalla
  const itemsVisible = Math.floor(visibleWidth / itemWidth);

  // Cuántos movimientos máximos puedo hacer
  const maxIndex = totalItems - itemsVisible;

  // Índice actual
  let currentIndex = parseInt(carousel.dataset.index) || 0;

  // Actualizar índice
  currentIndex += direction;

  // Limitar índice para no pasarse
  if (currentIndex < 0) currentIndex = 0;
  if (currentIndex > maxIndex) currentIndex = maxIndex;

  // Aplicar movimiento
  const shift = -currentIndex * itemWidth;
  carousel.style.transform = `translateX(${shift}px)`;
  carousel.style.transition = "transform 0.5s ease";

  // Guardar índice
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
