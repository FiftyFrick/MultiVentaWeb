

// Acción "Guardar cambios" -> actualiza la tarjeta en la UI (y cierra modal)
  form.addEventListener('submit', function(e){
    e.preventDefault();
    const card = modalProducto.currentCard;
    if (!card) {
      modalProducto.classList.add('hidden');
      return;
    }

    // Leer inputs
    const inpCodigo = document.getElementById('prod-codigo').value.trim();
    const inpNombre = document.getElementById('prod-nombre').value.trim();
    const inpCodProv = document.getElementById('prod-codprov').value.trim();
    const inpPrecio = document.getElementById('prod-precio').value.trim();
    const inpDesc = document.getElementById('prod-desc').value.trim();

    // Aplicar a la tarjeta (se supone que la estructura coincide)
    const codes = card.querySelectorAll('.code');
    if (codes && codes.length > 0) codes[0].textContent = 'COD. ' + inpCodigo;
    if (codes && codes.length > 1) codes[1].textContent = 'Cod. Prov. ' + inpCodProv;

    const nameEl = card.querySelector('.name');
    if (nameEl) nameEl.textContent = inpNombre;

    const descEl = card.querySelector('.desc');
    if (descEl) descEl.textContent = inpDesc;

    const priceEl = card.querySelector('.price');
    if (priceEl) priceEl.textContent = inpPrecio;

    // si la imagen fue cambiada, actualizar la miniatura
    const thumbImg = card.querySelector('.thumb img');
    if (thumbImg && previewImg.src) thumbImg.src = previewImg.src;

    // Aquí podrías enviar un fetch/ajax al backend para persistir los cambios
    // fetch('/api/producto/actualizar', { method:'POST', body: FormData... })

    modalProducto.classList.add('hidden');
  });



  
  // Funcionalidad Ocultar / Eliminar (delegación simple)
  document.addEventListener('click', function(e){
    if (e.target.matches('.btn-ocultar')) {
      const card = e.target.closest('.product-card');
      if (card) {
        card.style.display = 'none'; // ocultar visualmente
        // si quieres deshacer ocultado podrías añadir un toast con "Deshacer"
      }
    }

    if (e.target.matches('.btn-eliminar')) {
      const card = e.target.closest('.product-card');
      if (card) {
        if (confirm('¿Eliminar producto? Esta acción no se puede deshacer en la UI.')) {
          card.remove();
          // aquí deberías llamar al backend para borrar permanentemente
        }
      }
    }
  });