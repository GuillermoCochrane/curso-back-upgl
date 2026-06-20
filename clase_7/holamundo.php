<?php
  // Este es un comentario de una sola línea
  /* 
    Este es un comentario de varias líneas
  */
  # Otra forma de escribir un comentario de una sola línea
  echo "Puto el que lee";
  echo "<h1>Hola Mundo</h1>";
  echo "<div id='holamundo'>";
  echo "  <p>Hola Mundo dentro del div</p>";
  echo "</div>";
  echo "<div id='holamundo2'> 
          <p>Hola Mundo de otra forma dentro del div</p>
        </div>";
  $holamundo = "<div id='holamundo3'>
    <p>Hola Mundo de otra forma dentro del div</p>
  </div>";
  echo $holamundo;
  $nombre = "Juan";
  $saludo = "<p>Hola $nombre</p>";
  echo $saludo;
  $msjConsola = "console.log('Hola Mundo desde la consola');";
  $consola = "<script>$msjConsola</script>";
  echo $consola;
?>
<script>
  console.log('Esto es javascript dentro de un script');
  <?php echo $msjConsola; ?>
  alert("<?php echo "tu nombre es $nombre";?>")
  alert("Bienvenido,  <?php echo $nombre;?>")
</script>