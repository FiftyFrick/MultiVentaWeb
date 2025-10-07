function toggleCaja() {
  const caja = document.getElementById("caja");
  caja.classList.toggle("activo");
}

window.onload = function() {
  const caja = document.getElementById("caja");
  caja.classList.add("activo");

  // Se cierra automáticamente a los 5 segundos
  setTimeout(() => {
    caja.classList.remove("activo");
  }, 5000);
};
