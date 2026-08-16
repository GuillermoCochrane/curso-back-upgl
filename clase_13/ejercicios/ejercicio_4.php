<?php
/*EJERCICIO 4: Funciones y Retorno de Valores
Objetivo: Crear funciones reutilizables que reciban parámetros y devuelvan un resultado.

    // 1. Declara una función llamada 'calcularPromedio' que reciba dos parámetros: $nota1 y $nota2
    ________ calcularPromedio($nota1, $nota2) {
        
        $promedio = ($nota1 + $nota2) / 2;
        
        // 2. Devuelve el resultado calculado
        ________ $promedio;
    }

    // 3. Llama a la función pasando las notas 8 y 6, y guarda el resultado en una variable
    $resultado_final = ________(8, 6);
    
    echo "El promedio final es: " . $resultado_final;
    */
       // 1. Declara una función llamada 'calcularPromedio' que reciba dos parámetros: $nota1 y $nota2
    function calcularPromedio($nota1, $nota2) {
        
        $promedio = ($nota1 + $nota2) / 2;
        
        // 2. Devuelve el resultado calculado
        return $promedio;
    }
$nota1 = 1;
$nota2 = 6;
    // 3. Llama a la función pasando las notas 8 y 6, y guarda el resultado en una variable
    $resultado_final = calcularPromedio($nota1, $nota2);
    
    echo "El promedio final es: " . $resultado_final;
    echo "<br>";
    echo $nota1;
    echo "<br>";
    echo $nota2;
    if ($resultado_final >= 7){
        echo "aprobado";
    }else{
        echo "desaprobado";
    }
    
?>

