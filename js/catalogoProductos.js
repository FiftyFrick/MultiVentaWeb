
function obtenerCarrito() {
  let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
  

  // Normalizamos por si quedaron ids como string
  carrito = carrito.map(p => ({
    ...p,
    id: Number(p.id)
  }));

  return carrito;
}

function guardarCarrito(carrito) {
  localStorage.setItem('carrito', JSON.stringify(carrito));
}

document.querySelectorAll('.agregar').forEach(btn => {
  btn.addEventListener('click', () => {

    const id = Number(btn.dataset.id);
    const nombre = btn.dataset.nombre;
    const precio = Number(btn.dataset.precio);
    const imagen = btn.dataset.imagen; // <-- nueva línea

    let carrito = obtenerCarrito();
    let existente = carrito.find(p => p.id === id);

    if (existente) {
      existente.cantidad++;
    } else {
      carrito.push({
        id,
        nombre,
        precio,
        imagen,      // <-- guardamos también la imagen
        cantidad: 1
      });
    }

    guardarCarrito(carrito);
    alert(`${nombre} agregado al carrito`);
  });
});
