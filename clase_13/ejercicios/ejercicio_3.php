
<?php
    /*EJERCICIO 3: Condicionales Complejos (Operadores Lógicos)
    Objetivo: Evaluar múltiples condiciones utilizando if / elseif / else y operadores lógicos (AND).
    $nota_final = 7;
    $asistencia = 85;
    
    // 1. Evalúa si la nota es mayor o igual a 7 Y la asistencia es mayor o igual a 80
    if ($nota_final ________ 7 ________ $asistencia >= 80) {
        
        echo "Aprobado y promocionado";
        
    // 2. Evalúa si la nota es mayor o igual a 4 (condición alternativa)
    } ________ ($nota_final >= 4) {
        
        echo "Aprobado, rinde final";
        
    } ________ {
        
        echo "Recursa la materia";
        
    }
        */
    $nota_final = 7;
    $asistencia = 79;
    
    // 1. Evalúa si la nota es mayor o igual a 7 Y la asistencia es mayor o igual a 80
    if ($nota_final >=7 & $asistencia >= 80) {
        
        echo "Aprobado y promocionado";
        
    // 2. Evalúa si la nota es mayor o igual a 4 (condición alternativa)
    } elseif($nota_final >= 4) {
        
        echo "Aprobado, rinde final";
        
    } else{
        
        echo "Recursa la materia";
        
    }

?>