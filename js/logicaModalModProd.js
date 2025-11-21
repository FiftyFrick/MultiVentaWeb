
/* =============================================================
    PREPARAR SUBCATEGORÍAS AL CAMBIAR CATEGORÍA
============================================================= */

const categoriaSelect = document.getElementById("prod-categoria");
const subCategoriaSelect = document.getElementById("prod-subcategoria");

const nuevaCatInput = document.getElementById("nueva_categoria");
const nuevaSubInput = document.getElementById("nueva_sub_categoria");

const subCatOriginales = Array.from(subCategoriaSelect.options)
  .filter(opt => opt.value !== "" && opt.value !== "nueva");

/* Reiniciar al cargar */
subCategoriaSelect.innerHTML = '<option value="">Seleccione</option>' +
                               '<option value="nueva">➕ Nueva subcategoría...</option>';

categoriaSelect.addEventListener("change", () => {
  const idCat = categoriaSelect.value;

  /* NUEVA CATEGORÍA */
  if (idCat === "nueva") {
    nuevaCatInput.style.display = "block";
  } else {
    nuevaCatInput.style.display = "none";
  }

  /* FILTRAR SUBCATEGORÍAS */
  subCategoriaSelect.innerHTML = '<option value="">Seleccione</option>';

  subCatOriginales.forEach(opt => {
    if (opt.dataset.cat === idCat) {
      subCategoriaSelect.appendChild(opt.cloneNode(true));
    }
  });

  subCategoriaSelect.insertAdjacentHTML("beforeend", 
    '<option value="nueva">➕ Nueva subcategoría...</option>'
  );

  nuevaSubInput.style.display = "none";
});

subCategoriaSelect.addEventListener("change", () => {
  nuevaSubInput.style.display = 
    (subCategoriaSelect.value === "nueva") ? "block" : "none";
});

/* =============================================================
    ABRIR MODAL Y RELLENAR DATOS
============================================================= */

const modal = document.getElementById("modalEditarProducto");
const cerrarModal = document.getElementById("cerrarModalEditar");
const previewImg = document.getElementById("previewImg");
const inputImg = document.getElementById("inputImg");

function conectarEventosModificar() {
  document.querySelectorAll(".btn-modificar").forEach(btn => {
    btn.onclick = e => {
      const card = e.target.closest(".product-card");
      abrirModal(card);
    };
  });
}

function abrirModal(card) {

  modal.currentCard = card;

  // Datos básicos
  document.getElementById("prod-codigo").value =
    card.querySelector(".code-interno").textContent.replace("COD.","").trim();

  document.getElementById("prod-nombre").value =
    card.querySelector(".name").textContent.trim();

  document.getElementById("prod-codprov").value =
    card.querySelector(".code-prov").textContent.replace("Cod. Prov.","").trim();

  document.getElementById("prod-precio").value =
    card.querySelector(".price").textContent.replace("$","").trim();

  document.getElementById("prod-desc").value =
    card.querySelector(".desc").textContent.trim();

  previewImg.src = card.querySelector(".thumb img").src;


  /* ======= CATEGORÍA / SUBCATEGORÍA / FECHA ======= */

  const idCat = card.dataset.idCategoria;
  const idSub = card.dataset.idSubcategoria;
  const fecha = card.dataset.fecha;

  const selCat = document.getElementById("prod-categoria");
  const selSub = document.getElementById("prod-subcategoria");

  const inputNuevaCat = document.getElementById("nueva_categoria");
  const inputNuevaSub = document.getElementById("nueva_sub_categoria");

  // Reset campos nuevos
  inputNuevaCat.style.display = "none";
  inputNuevaSub.style.display = "none";
  inputNuevaCat.value = "";
  inputNuevaSub.value = "";

  /* --- Seleccionar categoría --- */
  if (idCat) {
    selCat.value = idCat;
    selCat.dispatchEvent(new Event("change"));
  }

  /* --- Seleccionar subcategoría --- */
  setTimeout(() => {
    if (idSub) selSub.value = idSub;
  }, 80);

  /* --- Fecha --- */
  if (fecha) {
    document.getElementById("prod-fecha").value = fecha;
  }

  modal.classList.remove("hidden");
}

/* cerrar */
cerrarModal.onclick = () => modal.classList.add("hidden");
window.onclick = e => { if (e.target === modal) modal.classList.add("hidden"); }

/* preview */
inputImg.onchange = () => {
  if (inputImg.files[0]) previewImg.src = URL.createObjectURL(inputImg.files[0]);
};



/* =============================================================
    GUARDAR CAMBIOS
============================================================= */

document.getElementById("formEditarProducto").onsubmit = async (e) => {
  e.preventDefault();

  const btnGuardar = e.target.querySelector('button[type="submit"]');
  btnGuardar.disabled = true;
  btnGuardar.textContent = "Guardando...";

  try {
    const card = modal.currentCard;
    if (!card) throw new Error("No se encontró la tarjeta del producto.");

    const datos = new FormData();

    datos.append("id", card.dataset.id);
    datos.append("cod_interno", document.getElementById("prod-codigo").value.trim());
    datos.append("nombre", document.getElementById("prod-nombre").value.trim());
    datos.append("descripcion", document.getElementById("prod-desc").value.trim());
    datos.append("cod_provedor", document.getElementById("prod-codprov").value.trim());

    const precioRaw = document.getElementById("prod-precio").value.trim();
    const precioClean = precioRaw.replace(/[^0-9.]/g, "");
    datos.append("precio", precioClean);

    const fecha = document.getElementById("prod-fecha").value;
    if (fecha) datos.append("fecha", fecha);

    const catVal = document.getElementById("prod-categoria").value;
    if (catVal === "nueva") {
      const nuevaCat = document.getElementById("nueva_categoria").value.trim();
      if (!nuevaCat) {
        alert("Ingresá el nombre de la nueva categoría o seleccioná una existente.");
        btnGuardar.disabled = false;
        btnGuardar.textContent = "Guardar Cambios";
        return;
      }
      datos.append("nueva_categoria", nuevaCat);
      datos.append("id_categoria", "");
    } else {
      datos.append("id_categoria", catVal);
    }

    const subVal = document.getElementById("prod-subcategoria").value;
    if (subVal === "nueva") {
      const nuevaSub = document.getElementById("nueva_sub_categoria").value.trim();
      if (!nuevaSub) {
        alert("Ingresá el nombre de la nueva subcategoría o seleccioná una existente.");
        btnGuardar.disabled = false;
        btnGuardar.textContent = "Guardar Cambios";
        return;
      }
      datos.append("nueva_subcategoria", nuevaSub);
      datos.append("id_sub_categoria", "");
    } else {
      datos.append("id_sub_categoria", subVal);
    }

    if (inputImg.files && inputImg.files[0]) {
      datos.append("ruta_imagen", inputImg.files[0]);
    }

    const resp = await fetch("bd/actualizarProducto.php", {
      method: "POST",
      body: datos
    });

    const text = await resp.text();
    let jsonResp = null;
    try { jsonResp = JSON.parse(text); } catch (err) {}

    if (resp.ok) {

      if (jsonResp && jsonResp.ok) {
        alert(jsonResp.msg || "Producto actualizado correctamente.");
      } else {
        console.log("Respuesta del servidor:", text);
        alert("Producto actualizado. (ver consola para más detalles)");
      }

      modal.classList.add("hidden");
      cargarProductos();

    } else {
      console.error("Error HTTP:", resp.status, text);
      alert("Error al actualizar el producto. Revisa la consola para más detalles.");
    }

  } catch (error) {
    console.error("Error en onsubmit:", error);
    alert("Ocurrió un error: " + (error.message || error));
  } finally {
    btnGuardar.disabled = false;
    btnGuardar.textContent = "Guardar Cambios";
  }
};

