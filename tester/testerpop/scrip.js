<script>
const abrir = document.getElementById('abrirPopup');
const cerrar = document.getElementById('cerrarPopup');
const popup = document.getElementById('popup');

abrir.addEventListener('click', function() {
  popup.style.display = 'flex'
});

cerrar.addEventListener('click', function() {
  popup.style.display = 'none'
});
</script>
