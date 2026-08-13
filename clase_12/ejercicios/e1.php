<?php
    // 1. Crea un array asociativo llamado 'alumno' con las claves 'nombre', 'edad' y 'stack'
    $alumno = [
        'nombre' => 'Lucio',
        'edad' => 20,
        'stack' => 'PHP'
    ];
    
    // 2. Imprime "El alumno Lucio estudia PHP puro" accediendo a las claves del array
    echo "El alumno " . $alumno['nombre'] . " estudia " . $alumno['stack'];
?>