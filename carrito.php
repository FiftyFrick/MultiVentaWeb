<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="css/styleCarrito.css">
</head>
<body>
  <?php include("menu.php"); ?>

  <div class="contenido">       
    <main class="content">
      <section class="cart-container">
        <!-- 🛒 Carrito -->
        <div class="cart-left">
          <h2>Mi carrito</h2>
          <div id="carritoItems"></div>
          <br>
          <button id="vaciarCarrito" class="btn danger">Vaciar carrito</button>
          <a href="productos.php"><button class="btn danger">Seguir comprando</button></a>

        </div>

        <!-- 📦 Resumen -->
        <div class="cart-right">
          <div class="field-group">
            <input type="text" id="nombreCliente" placeholder="Ingresa tu Nombre Aquí" required>
          </div>

          <h2>Resumen del pedido</h2>
          <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">$0.00</span>
          </div>
          <div class="summary-row total">
            <span>Total</span>
            <span id="total">$0.00</span>
          </div>

          <a id="btnWhatsapp" href="#" target="_blank" class="btn-whatsapp">
            <i class="fa-brands fa-whatsapp"></i> Seguir Compra
          </a>
        </div>
      </section>
    </main>
  </div>

  <footer class="footer">
    <p>© 2025 Walter. Todos los derechos reservados.</p>
  </footer>

  <!-- 🚀 Script del carrito -->
  <script>
    const carritoItems = document.getElementById("carritoItems");
    const subtotalSpan = document.getElementById("subtotal");
    const totalSpan = document.getElementById("total");
    const btnVaciar = document.getElementById("vaciarCarrito");
    const btnWhatsapp = document.getElementById("btnWhatsapp");
    const inputNombre = document.getElementById("nombreCliente");

    const telefono = "5491122334455"; // ← poné tu número de WhatsApp

    // 🧩 Obtener y guardar carrito
    function obtenerCarrito() {
      return JSON.parse(localStorage.getItem("carrito")) || [];
    }

    function guardarCarrito(carrito) {
      localStorage.setItem("carrito", JSON.stringify(carrito));
    }

    // 🧾 Mostrar carrito
    function renderizarCarrito() {
      const carrito = obtenerCarrito();
      carritoItems.innerHTML = "";

      if (carrito.length === 0) {
        carritoItems.innerHTML = "<p>El carrito está vacío.</p>";
        subtotalSpan.textContent = "$0.00";
        totalSpan.textContent = "$0.00";
        btnWhatsapp.href = "#";
        return;
      }

      let total = 0;

      carrito.forEach((item, index) => {
        const totalItem = item.precio * item.cantidad;
        total += totalItem;

        const div = document.createElement("div");
        div.classList.add("cart-item");
        div.innerHTML = `
        <img src="${item.imagen}" class="item-img">

        <div class="item-info">
          <p><strong>${item.nombre}</strong></p>
          <p class="price">$${item.precio.toLocaleString()}</p>
        </div>

        <div class="item-actions">
          <button onclick="cambiarCantidad(${index}, -1)"> - </button>
          <input type="text" value="${item.cantidad}" readonly>
          <button onclick="cambiarCantidad(${index}, 1)"> + </button>
        </div>

        <div class="item-total">$${totalItem.toLocaleString()}</div>
        <button class="remove" onclick="eliminarItem(${index})">x</button>
      `;

        carritoItems.appendChild(div);
      });

      subtotalSpan.textContent = `$${total.toLocaleString()}`;
      totalSpan.textContent = `$${total.toLocaleString()}`;
      actualizarWhatsapp(carrito, total);
    }

    // ➕➖ Cambiar cantidad
    function cambiarCantidad(index, cambio) {
      let carrito = obtenerCarrito();
      carrito[index].cantidad += cambio;

      if (carrito[index].cantidad <= 0) {
        carrito.splice(index, 1);
      }

      guardarCarrito(carrito);
      renderizarCarrito();
    }

    // ❌ Eliminar producto
    function eliminarItem(index) {
      let carrito = obtenerCarrito();
      carrito.splice(index, 1);
      guardarCarrito(carrito);
      renderizarCarrito();
    }

    // 🧹 Vaciar todo el carrito
    btnVaciar.addEventListener("click", () => {
      localStorage.removeItem("carrito");
      renderizarCarrito();
    });

    // 💬 Generar mensaje de WhatsApp
    function actualizarWhatsapp(carrito, total) {
      let mensaje = "Hola! Quiero finalizar esta compra:%0A%0A";
      carrito.forEach(item => {
        mensaje += `- ${item.nombre} x${item.cantidad} ($${item.precio} c/u)%0A`;
      });
      mensaje += `%0ATotal: $${total.toLocaleString()}%0A%0ANombre: ${encodeURIComponent(inputNombre.value || "")}`;
      btnWhatsapp.href = `https://wa.me/${telefono}?text=${mensaje}`;
    }

    // 🔄 Actualizar enlace cuando escriben su nombre
    inputNombre.addEventListener("input", () => {
      const carrito = obtenerCarrito();
      let total = carrito.reduce((acc, p) => acc + p.precio * p.cantidad, 0);
      actualizarWhatsapp(carrito, total);
    });

    // 🧠 Renderizar al cargar
    renderizarCarrito();
  </script>
</body>
</html>
