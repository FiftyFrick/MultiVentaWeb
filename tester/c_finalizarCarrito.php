<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Carrito</title>
    <link rel="stylesheet" href="css/styleIndex.css">
</head>
<body>
    <?php include("menu.php"); ?>
    <?php include("menuadmin.php"); ?>

    <header>

    </header>
    <br>
    <div class="contenido">
        <main class="content">
            <?php
                session_start();

                echo "<h1>Seguir Compra</h1>";

                if (empty($_SESSION['carrito'])) {
                    echo "<p>No hay productos en el carrito.</p>";
                } else {
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $producto) {
                        echo "<p>{$producto['nombre']} - {$producto['precio']} USD</p>";
                        $total += $producto['precio'];
                    }
                    echo "<h3>Total: $total USD</h3>";
                    echo "<p>Integrar Mercado Pago aquí más adelante.</p>";
                }
            ?>
        </main>

    </div>

    <footer class="footer">
        <p>© 2025 Walter. Todos los derechos reservados.</p>
    </footer>
    
</body>
</html>



