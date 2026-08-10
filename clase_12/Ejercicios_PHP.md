# Práctica de PHP – Nivel Intermedio

**Profesores:** Diego Markiewicz // Gaspar Oddovero

---

## Ejercicio 1: Arrays Asociativos y Concatenación
**Objetivo:** Trabajar con estructuras de datos básicas y acceder a sus índices.

```php
<?php
    // 1. Crea un array asociativo llamado 'alumno' con las claves 'nombre', 'edad' y 'stack'
    $alumno = [
        'nombre' => 'Lucio',
        '________' => 20,
        'stack' => '________'
    ];
    
    // 2. Imprime "El alumno Lucio estudia PHP puro" accediendo a las claves del array
    echo "El alumno " . $alumno['________'] . " estudia " . $alumno['________'];
?>
```

---

## Ejercicio 2: Bucles (Foreach) y Generación de HTML
**Objetivo:** Recorrer una lista de elementos y generar etiquetas HTML dinámicamente.

```php
<?php
    // Lista de tecnologías a enseñar
    $tecnologias = ["PHP OOP", "Bootstrap", "SQL Server", "PWA"];
    
    echo "<ul>";
    // 1. Completa el bucle para recorrer el array
    ________ ($tecnologias ________ $tec) {
        
        // 2. Imprime cada tecnología dentro de un ítem de lista <li>
        echo "<________>$tec</________>";
        
    }
    echo "</ul>";
?>
```

---

## Ejercicio 3: Condicionales Complejos (Operadores Lógicos)
**Objetivo:** Evaluar múltiples condiciones utilizando `if / elseif / else` y operadores lógicos (`AND`).

```php
<?php
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
?>
```

---

## Ejercicio 4: Funciones y Retorno de Valores
**Objetivo:** Crear funciones reutilizables que reciban parámetros y devuelvan un resultado.

```php
<?php
    // 1. Declara una función llamada 'calcularPromedio' que reciba dos parámetros: $nota1 y $nota2
    ________ calcularPromedio($nota1, $nota2) {
        
        $promedio = ($nota1 + $nota2) / 2;
        
        // 2. Devuelve el resultado calculado
        ________ $promedio;
    }

    // 3. Llama a la función pasando las notas 8 y 6, y guarda el resultado en una variable
    $resultado_final = ________(8, 6);
    
    echo "El promedio final es: " . $resultado_final;
?>
```

---

## 📖 Breve Introducción: Inclusión de Archivos en PHP

### El problema:  
Imaginen que están desarrollando un sistema web que tiene 20 páginas distintas (Inicio, Perfil, Panel de Control, Contacto, etc.). Todas esas páginas comparten la misma barra de navegación arriba (el menú con Bootstrap) y el mismo pie de página abajo (el footer). Si un día el cliente les pide agregar un botón nuevo al menú, ¿van a abrir y editar los 20 archivos uno por uno? ¡Sería una locura!

### La solución:
PHP nos permite trabajar con "piezas de rompecabezas". Podemos escribir todo el código HTML del menú una sola vez y guardarlo en un archivo llamado `header.php`. Luego, en nuestras 20 páginas, simplemente le decimos a PHP: *"Che, traé el código que está en header.php y ponelo acá"*.

Si el día de mañana modifican el archivo `header.php`, el cambio se va a reflejar automáticamente en todo el sitio.

Para lograr esta magia, PHP nos da un comando principal llamado `include` (que significa "incluir").

---

### Archivo 1: `header.php`
Contiene el inicio del HTML, el `<head>` y la barra de navegación.  
Crea el archivo `header.php` con este código:

```php
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Mi Sistema</span>
        </div>
    </nav>
    
    <!-- Abrimos un contenedor para el contenido principal que vendrá después -->
    <div class="container mt-4">
```

---

### Archivo 2: `footer.php`
Contiene el pie de página, los scripts y el cierre del HTML.  
Crea el archivo `footer.php` con este código:

```php
</div> <!-- Cerramos el contenedor principal que abrimos en el header -->
    
    <footer class="text-center mt-5 p-3 bg-light text-muted">
        <p>&copy; 2026 - Práctica de Desarrollo Web</p>
    </footer>

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

---

**El resultado:**  
Ahora, en la página principal (`index.php`), no hace falta volver a escribir todo ese HTML. Solo tenemos que "llamar" a estos dos archivos y escribir nuestro contenido en el medio.

---

## Ejercicio 5: Inclusión de Archivos (El clásico Header y Footer)
**Objetivo:** Aprender a dividir una página web en partes para no repetir el código HTML en todos los archivos, utilizando los conceptos del ejemplo anterior.

```php
<?php
    // 1. Traé el archivo 'header.php' que tiene el menú superior y el <head>
    ________ 'header.php';

    // Contenido principal de esta vista
    echo "<h1>Panel de Control Principal</h1>";
    echo "<p>Acá va toda la información central del sistema...</p>";

    // 2. Traé el archivo 'footer.php' para cerrar el <body> y poner los scripts
    ________ 'footer.php';
?>
```

---
