<?php
header("Content-Type: text/plain; charset=utf-8");

/*
  ESTE ARCHIVO SOLO MUESTRA LO QUE RECIBE
  NO HACE NADA MÁS
*/

// Mostrar método
echo "=== MÉTODO DE ENVÍO ===\n";
echo $_SERVER["REQUEST_METHOD"] . "\n\n";

// Mostrar raw body (por si viene FormData o JSON)
echo "=== RAW INPUT (php://input) ===\n";
$raw = file_get_contents("php://input");
echo ($raw !== "" ? $raw : "(vacío)") . "\n\n";

// Mostrar POST
echo "=== CONTENIDO DE \$_POST ===\n";
print_r($_POST);
echo "\n\n";

// Mostrar FILES
echo "=== CONTENIDO DE \$_FILES ===\n";
print_r($_FILES);
echo "\n\n";

// Extra: si vino archivo, mostrar info detallada
if (isset($_FILES) && count($_FILES) > 0) {
    foreach ($_FILES as $name => $file) {
        echo "Archivo recibido en $name:\n";
        echo "- Nombre original: " . $file["name"] . "\n";
        echo "- Tipo MIME: " . $file["type"] . "\n";
        echo "- Tamaño: " . $file["size"] . " bytes\n";
        echo "- Temporal: " . $file["tmp_name"] . "\n\n";
    }
}

echo "=== FIN ===\n";
