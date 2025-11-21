function generarPaginacion(total, porPagina) {

  const totalPaginas = Math.ceil(total / porPagina);
  const div = document.getElementById("paginacion");

  div.innerHTML = "";

  if (totalPaginas <= 1) return;

  // Botón Anterior
  if (paginaActual > 1) {
    const btnPrev = document.createElement("button");
    btnPrev.textContent = "Anterior";
    btnPrev.onclick = () => cargarProductos(paginaActual - 1);
    div.appendChild(btnPrev);
  }

  // Números de página
  for (let i = 1; i <= totalPaginas; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    btn.className = (i === paginaActual) ? "active" : "";
    btn.onclick = () => cargarProductos(i);
    div.appendChild(btn);
  }

  // Botón Siguiente
  if (paginaActual < totalPaginas) {
    const btnNext = document.createElement("button");
    btnNext.textContent = "Siguiente";
    btnNext.onclick = () => cargarProductos(paginaActual + 1);
    div.appendChild(btnNext);
  }
}
