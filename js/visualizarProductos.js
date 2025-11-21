function cargarProductos() {

  // 1️⃣ Leer los filtros del formulario
  const buscar = document.getElementById("buscar").value;
  const categoria = document.getElementById("categoria").value;
  const subcategoria = document.getElementById("sub_categoria").value;

  // 2️⃣ Construir la URL con query params
  const url = `./bd/obtener_productos.php?buscar=${encodeURIComponent(buscar)}&categoria=${categoria}&sub_categoria=${subcategoria}`;

  // 3️⃣ Llamar al backend con los filtros
  fetch(url)
    .then(r => r.json())
    .then(productos => {
      const cont = document.getElementById("contenedorProductos");
      cont.innerHTML = "";

      productos.forEach(p => {
        const card = document.createElement("article");
        card.className = "product-card big";
        card.dataset.id = p.id;

        card.dataset.idCategoria = p.id_categoria;
        card.dataset.idSubcategoria = p.id_sub_categoria;
        card.dataset.fecha = p.fecha;

        card.innerHTML = `
          <div class="thumb large">
              <img src="${p.ruta_imagen}">
          </div>

          <div class="meta">
              <div class="code code-interno">COD. ${p.cod_interno}</div>
              <div class="name">${p.nombre}</div>
              <div class="desc">${p.descripcion}</div>
              <div class="code code-prov">Cod. Prov. ${p.cod_provedor}</div>
              <div class="price">$${p.precio}</div>

              <div class="admin-actions">
                  <button class="btn-modificar">Modificar</button>
                  <button class="btn-eliminar">Eliminar</button>
              </div>
          </div>
        `;

        cont.appendChild(card);
      });

      conectarEventosModificar();
    });
}


document.querySelector(".filter-bar").addEventListener("submit", e => {
  e.preventDefault(); // evita recarga
  cargarProductos();  // recarga productos con filtros
});