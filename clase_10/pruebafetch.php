<?php
  // Esto es PHP
  // Puedo desde aca llmaar un funcion de Javascript del documento? (Si, ioyectando un script llamando a la funcion, pero luego del la script donde esta la funcion)
  // de esta forma
  $horaCargaPagina = date("H:i:s");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $mensaje = "Respuesta por POST: " . date("H:i:s");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Esto es HTML -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST VS fETCH</title>
</head>
<body>
  <h1>Diferncia entre POST y FETCH</h1>
  <p><strong>La página fue cargada a las:</strong> <?= $horaCargaPagina ?></p>
  <hr>
  <h3>1. POST (recarga la pagina completa)</h3>
  <form method="POST" >
    <button type="submit">Enviar por POST</button>
  </form>
  <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
  ?>
  <hr>
  <h3>2. FETCH (recarga solo el una parte de la pagina)</h3>
  <button type="button" onclick="cargarHora()">Enviar por FETCH</button>
  <hr>
  <div id="resultado">
    Esperando...
  </div>
</body>
<script>
  // Esto es JavaScript
  function cargarHora() {
    fetch("hora.php")
      .then(response => response.text())
      .then(data => {
        document.getElementById("resultado").innerHTML = data;
      });
  }

</script>
</html>