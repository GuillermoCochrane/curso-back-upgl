<?php
  date_default_timezone_set("America/Cordoba");
  $horaCargaPagina = date("H:i:s");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $mensaje = "Respuesta por POST: " . date("H:i:s");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST vs FETCH</title>
    <link rel="icon" type="image/png" href="icon.png" />
  <style>
    /* Estilos generales */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f7fa;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #333;
    }

    .container {
      background: white;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      padding: 2rem 2.5rem;
      max-width: 600px;
      width: 100%;
    }

    h1 {
      margin-top: 0;
      font-size: 1.8rem;
      color: #2c3e50;
      border-bottom: 2px solid #e9ecef;
      padding-bottom: 0.5rem;
    }

    hr {
      border: none;
      border-top: 1px solid #e9ecef;
      margin: 1.5rem 0;
    }

    /* Caja de información */
    .info-carga {
      background: #eef2f7;
      padding: 0.8rem 1rem;
      border-radius: 8px;
      font-size: 0.95rem;
      margin-bottom: 1.5rem;
    }

    /* Secciones */
    .seccion {
      background: #f8fafd;
      border: 1px solid #e1e8f0;
      border-radius: 12px;
      padding: 1.2rem;
      margin-bottom: 1.5rem;
    }

    .seccion h3 {
      margin-top: 0;
      font-size: 1.2rem;
    }

    /* Botones */
    button {
      padding: 0.6rem 1.2rem;
      border: none;
      border-radius: 8px;
      font-size: 0.95rem;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s, transform 0.1s;
      background: #4a6cf7;
      color: white;
    }

    button:hover {
      background: #3b5de7;
      transform: translateY(-1px);
    }

    button:active {
      transform: translateY(0);
    }

    /* Mensaje POST */
    .mensaje-post {
      margin-top: 1rem;
      background: #e8f5e9;
      padding: 0.7rem;
      border-radius: 8px;
      color: #256029;
      font-weight: 500;
    }

    /* Resultado fetch */
    #resultado {
      margin-top: 1rem;
      padding: 0.7rem;
      background: #fff3e0;
      border-radius: 8px;
      color: #a45d0c;
      font-weight: 500;
      min-height: 1.5rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Diferencia entre POST y FETCH</h1>
    <div class="info-carga">
      ⏱️ <strong>La página fue cargada a las:</strong> <?= $horaCargaPagina ?>
    </div>

    <div class="seccion">
      <h3>1. POST (recarga la página completa)</h3>
      <form method="POST">
        <button type="submit">Enviar por POST</button>
      </form>
      <?php if (isset($mensaje)): ?>
        <div class="mensaje-post"><?= $mensaje ?></div>
      <?php endif; ?>
    </div>

    <div class="seccion">
      <h3>2. FETCH (recarga solo una parte de la página)</h3>
      <button type="button" onclick="cargarHora()">Enviar por FETCH</button>
      <div id="resultado">
        Esperando...
      </div>
    </div>
  </div>

  <script>
    function cargarHora() {
      fetch("hora.php")
        .then(response => response.text())
        .then(data => {
          document.getElementById("resultado").innerHTML = data;
        });
    }
  </script>
</body>
</html>