<?php
$horaCargaPagina = date("H:i:s");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mensaje = "Respuesta por POST: " . date("H:i:s");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>POST vs Fetch</title>
</head>
<body>

<h2>Diferencia entre POST y Fetch</h2>

<p><strong>La página fue cargada a las:</strong> <?= $horaCargaPagina ?></p>

<hr>

<h3>1. POST (Recarga toda la página)</h3>

<form method="POST">
    <button type="submit">Enviar por POST</button>
</form>

<?php
if (isset($mensaje)) {
    echo "<p>$mensaje</p>";
}
?>

<hr>

<h3>2. Fetch (Solo actualiza una parte)</h3>

<button onclick="cargarHora()">Actualizar con Fetch</button>

<div id="resultado">
    Esperando...
</div>

<script>
function cargarHora() {
    fetch("hora.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("resultado").innerHTML = data;
        });
}
</script>

</body>
</html>