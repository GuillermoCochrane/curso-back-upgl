<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>El que quieran</title>
</head>
<body>
  <h1>Cargar Articulos</h1>
  <form action="procesar.php" method="post">
    <div id="contenedor">
      <div id="articulo">
        <h3>articulo 1</h3>
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre"><br>
        <label for="descripcion">Descripcion:</label><br>
        <textarea name="descripcion" id="descripcion"></textarea><br><br>
        <div>
          <label> TALLES</label><br><br>
          <input type="radio" name="talle" id="talle_nino" value="talle_nino">
          <label for="talle_nino">Talle Nino</label>
          <input type="radio" name="talle" id="talle_hombre" value="talle_hombre">
          <label for="talle_hombre">Talle Hombre</label>
          <input type="radio" name="talle" id="talle_mujer" value="talle_mujer">
          <label for="talle_mujer">Talle Mujer</label>
        </div>
        <br>
        <div>
          <label>Colores</label><br><br>
          <input type="radio" name="color" id="color_rojo" value="rojo">
          <label for="color_rojo">Rojo</label>
          <input type="radio" name="color" id="color_verde" value="verde">
          <label for="color_verde">Verde</label>
          <input type="radio" name="color" id="color_amarillo" value="amarillo">
          <label for="color_amarillo">Amarillo</label>
        </div>
        <br>
        <br>
        <label for="precio">Precio:</label><br>
        <input type="number" name="precio" id="precio"><br><br>
        <button type="submit">Agregar</button>
    </div>
  </form>
</body>
</html>