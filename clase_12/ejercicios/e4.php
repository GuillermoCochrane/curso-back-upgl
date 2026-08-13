<?php
    // 1. Declara una función llamada 'calcularPromedio' que reciba dos parámetros: $nota1 y $nota2
    function calcularPromedio($nota1, $nota2) {
        
        $promedio = ($nota1 + $nota2) / 2;
        
        // 2. Devuelve el resultado calculado
        return $promedio;
    }

    // 3. Llama a la función pasando las notas 8 y 6, y guarda el resultado en una variable
    $resultado_final = calcularPromedio(8, 6);
    
    echo "El promedio final es: " . $resultado_final;
?>