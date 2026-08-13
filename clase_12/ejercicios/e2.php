<?php
    // Lista de tecnologías a enseñar
    $tecnologias = ["PHP OOP", "Bootstrap", "SQL Server", "PWA"];
    
    echo "<ul>";
    // 1. Completa el bucle para recorrer el array
    foreach ($tecnologias as $tec) {
        
        // 2. Imprime cada tecnología dentro de un ítem de lista <li>
        echo "<li>$tec</li>";
        
    }
    echo "</ul>";
?>