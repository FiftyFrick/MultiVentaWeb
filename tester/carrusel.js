let currentIndex = 0;
const carousel = document.getElementById('carousel');
const images = document.querySelectorAll('.carousel img');
const imageWidth = 250 + 20; // ancho de imagen + margen

function moveCarousel(direction) {
  if (currentIndex === 0) {
    currentIndex = 2; // primer click pasa a la segunda imagen
  } else {
    currentIndex = 0; // segundo click vuelve a la primera
  }

  const shift = -currentIndex * imageWidth;
  carousel.style.transform = `translateX(${shift}px)`;
}
