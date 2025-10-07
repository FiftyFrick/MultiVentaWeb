<script>
  // Detectar el modo antes de que cargue el body
  if (localStorage.getItem('modo') === 'oscuro') {
    document.documentElement.classList.add('dark-mode');
  }
</script>