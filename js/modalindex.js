// popup.js - manejo completo del popup + botón "Agregar al carrito"
// Asegurate de incluir este archivo al final del <body>, o que se ejecute después de DOMContentLoaded.

(function () {
  // --------------------------
  // Helpers para carrito (fallback si no existen globales)
  // --------------------------
  function obtenerCarrito() {
    try { return JSON.parse(localStorage.getItem('carrito')) || []; }
    catch(e) { return []; }
  }
  function guardarCarrito(carrito) {
    try { localStorage.setItem('carrito', JSON.stringify(carrito)); }
    catch(e) { console.error("No se pudo guardar carrito:", e); }
  }
  function agregarProductoCarrito(id, nombre, precio, imagen) {
    id = Number(id);
    precio = Number(precio) || 0;
    let carrito = obtenerCarrito();
    let existente = carrito.find(p => Number(p.id) === id);
    if (existente) {
      existente.cantidad = Number(existente.cantidad || 0) + 1;
    } else {
      carrito.push({ id, nombre, precio, imagen, cantidad: 1 });
    }
    guardarCarrito(carrito);
    return carrito;
  }

  // --------------------------
  // Funciones del popup
  // --------------------------
  function abrirPopup(img, nombre, precio, descripcion, id) {
    // Acepta parámetros en cualquier orden si algunos faltan (robusto)
    const popup = document.getElementById('popup');
    if (!popup) { console.error('No existe #popup en el DOM'); return; }

    const elImg = document.getElementById('popup-img');
    const elNombre = document.getElementById('popup-nombre');
    const elDesc = document.getElementById('popup-desc');
    const elPrecio = document.getElementById('popup-precio');
    const btnAdd = document.getElementById('popup-add');

    if (elImg) elImg.src = img || '';
    if (elNombre) elNombre.textContent = nombre || '';
    if (elDesc) elDesc.textContent = descripcion || '';
    if (elPrecio) elPrecio.textContent = (precio !== undefined && precio !== null) ? ("$" + precio) : '';

    if (btnAdd) {
      btnAdd.dataset.id = id !== undefined ? id : '';
      btnAdd.dataset.nombre = nombre || '';
      btnAdd.dataset.precio = precio !== undefined ? precio : '';
      btnAdd.dataset.imagen = img || '';
    }

    // Mostrar popup usando clase .show (y display fallback por compatibilidad)
    popup.classList.add('show');
    popup.style.display = 'flex';
  }

  function cerrarPopupCarrusel() {
    const popup = document.getElementById('popup');
    if (!popup) return;
    popup.classList.remove('show');
    // esperar la animación si quieres; aquí quitamos display inmediatamente
    popup.style.display = 'none';
  }

  // Exponer funciones al scope global (si las usás desde HTML inline)
  window.abrirPopup = abrirPopup;
  window.cerrarPopupCarrusel = cerrarPopupCarrusel;

  // --------------------------
  // Attach listeners cuando DOM esté listo
  // --------------------------
  document.addEventListener('DOMContentLoaded', () => {
    // 1) Cerrar si clic fuera del contenido
    document.addEventListener('click', (e) => {
      const popup = document.getElementById('popup');
      const contenido = document.querySelector('.popup-contenido');
      if (!popup) return;
      if (e.target === popup) cerrarPopupCarrusel();
    });

    // 2) Listener para el botón de cerrar (si hay uno con clase .btn-cerrar o id específico)
    const btnCerrar = document.querySelector('#popup .btn-cerrar, #popup .cerrar, #popup .popup-close');
    if (btnCerrar) btnCerrar.addEventListener('click', cerrarPopupCarrusel);

    // 3) Listener para agregar al carrito desde el popup
    // Esperamos a que exista el botón; si se carga dinámicamente, usamos observer (pero normalmente existe).
    const btnAdd = document.getElementById('popup-add');
    if (btnAdd) {
      // Evitar listeners duplicados: clonamos y reemplazamos
      const newBtn = btnAdd.cloneNode(true);
      btnAdd.parentNode.replaceChild(newBtn, btnAdd);

      newBtn.addEventListener('click', function (e) {
        const id = Number(this.dataset.id || this.getAttribute('data-id') || 0);
        const nombre = this.dataset.nombre || this.getAttribute('data-nombre') || '';
        const precioRaw = this.dataset.precio || this.getAttribute('data-precio') || 0;
        const imagen = this.dataset.imagen || this.getAttribute('data-imagen') || '';

        // Normalizar precio si viene como string con coma/puntos
        let precio = Number(String(precioRaw).replace(/\./g, '').replace(',', '.'));
        if (!Number.isFinite(precio)) precio = 0;

        agregarProductoCarrito(id, nombre, precio, imagen);

        // Cerrar popup y dar feedback
        cerrarPopupCarrusel();
        try { alert(`${nombre} agregado al carrito`); } catch (e) {}
      });
    } else {
      // Si no existe el botón aún (por carga dinámica), observamos el DOM por si aparece
      const observer = new MutationObserver((mutations, obs) => {
        const b = document.getElementById('popup-add');
        if (b) {
          obs.disconnect();
          // re-ejecutar esta función para enganchar el listener (llamamos a DOMContentLoaded handler recursivamente)
          location.reload(); // simple y rápido: recarga para enganchar listener (opcional)
        }
      });
      observer.observe(document.body, { childList: true, subtree: true });
    }
  });

})(); 
