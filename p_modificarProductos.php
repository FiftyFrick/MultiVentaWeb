<?php include("bd/conexion.php"); ?>

<?php
// Obtener categorías
$resultCat = $conexion->query("SELECT id_categoria, nombre FROM categorias");

// Obtener subcategorías
$resultSub = $conexion->query("
    SELECT id_sub_categoria, id_categoria, nombre 
    FROM sub_categorias
");
?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>MultiVenta</title>

  <link rel='stylesheet' href='styleIndex.css'>
  <link rel='stylesheet' href='css/p_ModificarProductos.css'>
</head>

<body>
  <?php include("menu.php"); ?>

  <header>
    <div class="cabecera">
      <div class="bienvenidos">
        <h1>Modificar Productos</h1>
      </div>

      <!-- ------------------ BARRA DE FILTROS ------------------ -->
      <form class="filter-bar" method="GET">
        <div class="filter-group">
          <label for="buscar">Buscar:</label>
          <input type="text" id="buscar" name="buscar" 
                 placeholder="Nombre del producto"
                 value="<?= isset($_GET['buscar']) ? htmlspecialchars($_GET['buscar']) : '' ?>">
        </div>

        <div class="filter-group">
          <label for="categoria">Categoría:</label>
          <select id="categoria" name="categoria">
            <option value="">Todas</option>
            <?php
              $categorias = $conexion->query("SELECT id_categoria, nombre FROM categorias");
              while ($row = $categorias->fetch_assoc()) {
                echo "<option value='{$row['id_categoria']}'>{$row['nombre']}</option>";
              }
            ?>
          </select>
        </div>

        <div class="filter-group">
          <label for="sub_categoria">Sub-Categoría:</label>
          <select id="sub_categoria" name="sub_categoria">
            <option value="">Todas</option>
            <?php
              $subcats = $conexion->query("SELECT id_sub_categoria, nombre FROM sub_categorias");
              while ($row = $subcats->fetch_assoc()) {
                echo "<option value='{$row['id_sub_categoria']}'>{$row['nombre']}</option>";
              }
            ?>
          </select>
        </div>

        <button type="submit" class="btn primary">Filtrar</button>
      </form>
    </div>
  </header>

  <br>

  <!-- ------------------ CONTENEDOR DE PRODUCTOS ------------------ -->
  <div class="cards-grid catalog" id="contenedorProductos"></div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>


  <!-- ------------------ MODAL EDITAR PRODUCTO ------------------ -->
  <div id="modalEditarProducto" class="modal hidden">
    <div class="modal-content product-edit">

      <h2>Modificar Producto</h2>

      <form id="formEditarProducto">
        <div class="modal-grid">

          <!-- Columna izquierda -->
          <div class="left-side">

            <label>Código Interno</label>
            <input type="text" id="prod-codigo">

            <label>Nombre</label>
            <input type="text" id="prod-nombre">

            <label>Código Proveedor</label>
            <input type="text" id="prod-codprov">

            <label>Precio</label>
            <input type="text" id="prod-precio">

            <!-- -------- CATEGORÍA -------- -->
            <label>Categoría</label>
            <select id="prod-categoria">
              <option value="">Seleccione</option>
              <?php 
                $resultCat->data_seek(0);
                while ($cat = $resultCat->fetch_assoc()) { ?>
                <option value="<?= $cat['id_categoria']; ?>">
                    <?= htmlspecialchars($cat['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva categoría...</option>
            </select>

            <input type="text" id="nueva_categoria" placeholder="Ingrese nueva categoría" style="display:none;">


            <!-- -------- SUBCATEGORÍA -------- -->
            <label>Subcategoría</label>
            <select id="prod-subcategoria">
              <option value="">Seleccione</option>
              <?php 
                $resultSub->data_seek(0);
                while ($sub = $resultSub->fetch_assoc()) { ?>
                <option 
                  value="<?= $sub['id_sub_categoria']; ?>"
                  data-cat="<?= $sub['id_categoria']; ?>"
                >
                  <?= htmlspecialchars($sub['nombre']); ?>
                </option>
              <?php } ?>
              <option value="nueva">➕ Nueva subcategoría...</option>
            </select>

            <input type="text" id="nueva_sub_categoria" placeholder="Ingrese nueva subcategoría" style="display:none;">


            <label>Fecha</label>
            <input type="date" id="prod-fecha">

          </div>

          <!-- Columna derecha -->
          <div class="right-side">

            <label>Descripción</label>
            <textarea id="prod-desc" rows="6"></textarea>

            <label>Imagen del Producto</label>
            <div class="preview-box">
              <img id="previewImg">
            </div>

            <label class="upload-btn">
              Cambiar imagen
              <input type="file" id="inputImg" accept="image/*">
            </label>

          </div>
        </div>

        <button type="submit" class="guardar">Guardar Cambios</button>
      </form>

      <span id="cerrarModalEditar" class="cerrar">×</span>

    </div>
  </div>


<!-- ================================================================
   JAVASCRIPT
================================================================ -->

<script>
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
</script>



<script>
/* =============================================================
    CARGAR PRODUCTOS
============================================================= */

function cargarProductos() {
  fetch("bd/obtener_productos.php")
    .then(r => r.json())
    .then(productos => {
      const cont = document.getElementById("contenedorProductos");
      cont.innerHTML = "";

      productos.forEach(p => {

        const card = document.createElement("article");
        card.className = "product-card big";
        card.dataset.id = p.id;

        // CORRECCIÓN: antes se usaba "article" (inexistente)
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
                  <button class="btn-ocultar">Ocultar</button>
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

cargarProductos();



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

    const resp = await fetch("bd/actualizar_producto.php", {
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



/* =============================================================
    OCULTAR / ELIMINAR
============================================================= */

document.addEventListener("click", e => {

  if (e.target.matches(".btn-ocultar")) {
    e.target.closest(".product-card").style.display = "none";
  }

  if (e.target.matches(".btn-eliminar")) {
    const card = e.target.closest(".product-card");

    if (confirm("¿Eliminar producto?")) {

      const fd = new FormData();
      fd.append("id", card.dataset.id);

      fetch("bd/eliminar_producto.php", {
        method:"POST", body:fd
      }).then(r => r.text())
        .then(console.log);

      card.remove();
    }
  }

});
</script>

</body>
</html>
