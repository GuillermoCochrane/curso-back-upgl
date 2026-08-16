<?php
/* === PRÁCTICA DE PHP: NIVEL INTERMEDIO ===
Profesores: Diego Markiewicz  y Gaspar Oddovero

EJERCICIO 1: Arrays Asociativos y Concatenación
Objetivo: Trabajar con estructuras de datos básicas y acceder a sus índices.

// 1. Crea un array asociativo llamado 'alumno' con las claves 'nombre', 'edad' y 'stack'
$alumno = [
    'nombre' => 'Lucio',
    '________' => 20,
    'stack' => '________'
];

// 2. Imprime "El alumno Lucio estudia PHP puro" accediendo a las claves del array
echo "El alumno " . $alumno['________'] . " estudia " . $alumno['________'];
?>
*/



// 1. Crea un array asociativo llamado 'alumno' con las claves 'nombre', 'edad' y 'stack'
$alumno = [
    [
        'nombre' => 'Lucio',
        'edad' => 20,
        'stack' => 'PHP puro'
    ],
    [
        'nombre' => 'Monica',
        'edad' => 40,
        'stack' => 'Java '
    ],
    [
        'nombre' => 'Gaspar',
        'edad' => 15,
        'stack' => 'Java Script '
    ]
];
$indice = 2;
// 2. Imprime "El alumno Lucio estudia PHP puro" accediendo a las claves del array
echo "El alumno " . $alumno[$indice]['nombre'] . " de " . $alumno[$indice]['edad'] . " años " . 
        " estudia " . $alumno[$indice]['stack'];
?>