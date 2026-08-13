<?php
    // 1. Traé el archivo 'header.php' que tiene el menú superior y el <head>
    include 'header.php';

    // Contenido principal de esta vista
    echo "<h1>Panel de Control Principal</h1>";
    echo "<p>Acá va toda la información central del sistema...</p>";

    // 2. Traé el archivo 'footer.php' para cerrar el <body> y poner los scripts
    include 'footer.php';
?>