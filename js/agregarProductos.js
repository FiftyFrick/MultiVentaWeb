

// Mostrar fecha actual en formato dd/mm/yyyy
const fechaActual = new Date();
const formato = fechaActual.toLocaleDateString("es-AR", {
  day: "2-digit",
  month: "2-digit",
  year: "numeric"
});

document.getElementById("fecha-actual").textContent = "Fecha: " + formato;
document.getElementById("fecha-input").value = formato;










  // Mostrar preview de la imagen subida 
  const fileInput = document.getElementById("file-input");
  const previewImg = document.getElementById("preview-img");

  fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    if (file) {
      previewImg.src = URL.createObjectURL(file);
    }
  });







// SCRIPT de todas las CATEGORIAS y SUBCATEGORIAS  


const categoriaSelect = document.getElementById('categoria');
const subCategoriaSelect = document.getElementById('sub_categoria');

// Guardar todas las subcategorías originales, excepto "Seleccione"
const todasSubCat = Array.from(subCategoriaSelect.options)
  .filter(o => o.value && o.value !== '') // elimina el "Seleccione"
  .map(o => o.cloneNode(true));

const nuevaCatInput = document.getElementById('nueva_categoria');
const nuevaSubInput = document.getElementById('nueva_sub_categoria');

// 🔹 Limpiar subcategorías al cargar la página (solo mostrar "Seleccione")
subCategoriaSelect.innerHTML = '<option value="">Seleccione</option>';

categoriaSelect.addEventListener('change', () => {
  const idCat = categoriaSelect.value;

  // Mostrar/ocultar campo de nueva categoría
  if (idCat === 'nueva') {
    nuevaCatInput.style.display = 'block';
    nuevaCatInput.required = true;
  } else {
    nuevaCatInput.style.display = 'none';
    nuevaCatInput.required = false;
  }

  // Limpiar subcategorías
  subCategoriaSelect.innerHTML = '<option value="">Seleccione</option>';

  // Agregar solo las subcategorías que coincidan con la categoría seleccionada
  todasSubCat.forEach(opt => {
    if (opt.dataset.cat === idCat) {
      subCategoriaSelect.appendChild(opt.cloneNode(true));
    }
  });

  // Agregar la opción "Nueva subcategoría" al final
  const optNueva = todasSubCat.find(o => o.value === 'nueva');
  if (optNueva) subCategoriaSelect.appendChild(optNueva.cloneNode(true));

  // Reset del campo de nueva subcategoría
  nuevaSubInput.style.display = 'none';
  nuevaSubInput.required = false;
});

subCategoriaSelect.addEventListener('change', () => {
  if (subCategoriaSelect.value === 'nueva') {
    nuevaSubInput.style.display = 'block';
    nuevaSubInput.required = true;
  } else {
    nuevaSubInput.style.display = 'none';
    nuevaSubInput.required = false;
  }
});
