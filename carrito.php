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
<!--

            <?php
                session_start();

                // Inicializar carrito si no existe
                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = array();
                }

                // Mostrar contenido del carrito
                echo "<h1>Carrito de Compras</h1>";

                if (empty($_SESSION['carrito'])) {
                    echo "<p>El carrito está vacío.</p>";
                } else {
                    echo "<ul>";
                    foreach ($_SESSION['carrito'] as $producto) {
                        echo "<li>{$producto['nombre']} - {$producto['precio']} USD</li>";
                    }
                    echo "</ul>";
                    echo "<a href='checkout.php'>Finalizar Compra</a>";
                }
            ?>
-->

        <!-- Contenido -->

        <section class="cart-container">
            <!-- Carrito -->
            <div class="cart-left">
                <h2>Mi carrito</h2>
                <div class="cart-item">
                    <img src="img/kitupgrade.jpeg" alt="Paquete del mes">
                    <div class="item-info">
                        <p>Paquete del mes Kit Upgrade Rayzen 7</p>
                        <p class="price">$188,000.00</p>
                    </div>
                    <div class="item-actions">
                        <button> - </button>
                        <input type="text" value="1">
                        <button> + </button>
                    </div>
                    <div class="item-total">$188,000.00</div>
                    <button class="remove">x</button>
                </div>
                <br>
                <!--
                <div class="extras">
                    <a href="#">➤ Ingresar código promocional</a>
                    <a href="#">➤ Agregar una nota</a>
                </div>
                -->
            </div>

        <!-- Resumen -->
            <div class="cart-right">
                <input type="text" placeholder="Ingresa tu nombre aqui" required >

                <h2>Resumen del pedido</h2>
                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>$188,000.00</span>
                </div>
                
                <div class="summary-row total">
                    <span>Total</span>
                    <span>$188,000.00</span>
                </div>
                <?php
                $telefono = "5491122334455"; // ← poné tu número acá
                $mensaje = "Hola! Quiero finalizar esta compra:%0A%0A";

                if (!empty($_SESSION['carrito'])) {
                    foreach ($_SESSION['carrito'] as $item) {
                        $nombre = urlencode($item['nombre']);
                        $cantidad = urlencode($item['cantidad']);
                        $precio = urlencode($item['precio']);
                        $mensaje .= "- $nombre x$cantidad ($$precio c/u)%0A";
                    }
                }

                $mensaje .= "%0ATotal: $" . urlencode($total); // Asegúrate de tener $total calculado
                $linkWhatsapp = "https://wa.me/$telefono?text=$mensaje";
                ?>

                <a href="<?php echo $linkWhatsapp; ?>" target="_blank" class="btn-whatsapp">
                <i class="fa-brands fa-whatsapp"></i>
                Seguir Compra
                </a>

                                
            </div>
        </section>


        </main>
    </div>

<footer class="footer">
<p>© 2025 Walter. Todos los derechos reservados.</p>
</footer>

</body>
</html>