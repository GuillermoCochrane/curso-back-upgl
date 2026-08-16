
<?php
/*
    EJERCICIO 2: Bucles (Foreach) y Generación de HTML
    Objetivo: Recorrer una lista de elementos y generar etiquetas HTML dinámicamente.
    // Lista de tecnologías a enseñar
    $tecnologias = ["PHP OOP", "Bootstrap", "SQL Server", "PWA"];
    
    echo "<ul>";
    // 1. Completa el bucle para recorrer el array
    ________ ($tecnologias ________ $tec) {
        
        // 2. Imprime cada tecnología dentro de un ítem de lista <li>
        echo "<________>$tec</________>";
        
    }
    echo "</ul>";
    */
 // Lista de tecnologías a enseñar
    $tecnologias = ["PHP OOP", "Bootstrap", "SQL Server", "PWA","java"];
    
    echo "<ul>";
    // 1. Completa el bucle para recorrer el array
 foreach($tecnologias as $tec) {
    
        // 2. Imprime cada tecnología dentro de un ítem de lista <li>
        echo "<li>$tec</li>";
        
    }
    echo "</ul>";



?>

