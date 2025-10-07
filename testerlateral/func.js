function toggleCaja() {
  let caja = document.getElementById("caja");
  caja.classList.toggle("activo");
}

// Mostrar automáticamente al cargar
window.onload = function() {
  document.getElementById("caja").classList.add("activo");
  // Opcional: cerrar sola después de 5 seg
  setTimeout(() => {
    document.getElementById("caja").classList.remove("activo");
  }, 5000);
}
