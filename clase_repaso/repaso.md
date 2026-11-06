# Guía de repaso — HTML y PHP básico

**Examen:** 20 preguntas de opción múltiple, con una sola respuesta correcta.

Esta guía contiene los temas que vamos a evaluar, con explicaciones y ejemplos sencillos.

---

## 1. ¿Qué es HTML?

**HTML** es un lenguaje de marcado que permite definir la **estructura y el contenido** de una página web.

Con **HTML** podemos colocar títulos, párrafos, imágenes, enlaces, listas y formularios.

Utiliza **etiquetas**. Muchas tienen una apertura y un cierre:

```html
<p>Este es un párrafo.</p>
```

- `<p>` abre el párrafo.
- `</p>` lo cierra.
- Entre ambas etiquetas está el contenido.

---

## 2. Estructura básica de una página

```html
<!DOCTYPE html>
<html>
<head>
    <title>Mi primera página</title>
</head>
<body>
    <h1>Bienvenidos</h1>
    <p>Estoy aprendiendo HTML y PHP.</p>
</body>
</html>
```

*Cada parte cumple una función:*

- `<!DOCTYPE html>` indica que el documento utiliza **HTML** moderno.
- `<html>` contiene el documento.
- `<head>` contiene información sobre la página.
- `<title>` define el título que aparece en la pestaña del navegador.
- `<body>` contiene lo que vemos dentro de la página.

> **Recordá:** el título de la pestaña se escribe con `<title>`. Un título visible dentro de la página se puede escribir con `<h1>`.

---

## 3. Títulos y párrafosPHP

### Títulos

Los **títulos** se escriben con etiquetas desde `<h1>` hasta `<h6>`.

`<h1>` representa el título de mayor importancia.

```html
<h1>Mi escuela</h1>
<h2>Nuestro curso</h2>
```

### Párrafos

La etiqueta `<p>` permite escribir un **párrafo**.

```html
<p>Este año aprendimos a crear páginas web.</p>
```

---

## 4. Enlaces

Los **enlaces** permiten ir a otra página o dirección.

Se crean con la etiqueta `<a>`. El atributo `href` indica el destino.

```html
<a href="https://www.google.com">Ir a Google</a>
```

*En este ejemplo:*

- `<a>` crea el enlace.
- `href` indica a qué dirección lleva.
- `Ir a Google` es el texto que ve la persona.

Un **atributo** agrega información a una etiqueta.

---

## 5. Imágenes

La etiqueta `<img>` permite mostrar una **imagen**.

```html
<img src="foto.jpg" alt="Foto del curso">
```

- `src` indica la ubicación del archivo.
- `alt` proporciona un **texto alternativo** que describe la imagen, útil para lectores de pantalla y cuando la imagen no se carga.

La etiqueta `<img>` no necesita una etiqueta de cierre.

> **Recordá:** los enlaces usan `href`; las imágenes usan `src`.

---

## 6. Listas

### Lista numerada

Se utiliza `<ol>`. Cada elemento se escribe con `<li>`.

```html
<ol>
    <li>Abrir el editor.</li>
    <li>Escribir el código.</li>
    <li>Guardar el archivo.</li>
</ol>
```

El navegador muestra los elementos con números.

### Lista sin numeración

Se utiliza `<ul>`, también con elementos `<li>`.

```html
<ul>
    <li>Cuaderno</li>
    <li>Lápiz</li>
    <li>Computadora</li>
</ul>
```

El navegador muestra los elementos con viñetas.

---

## 7. Formularios

Un **formulario** permite ingresar y enviar datos, como un nombre o un correo electrónico.

```html
<form action="guardar.php" method="post">
    <input type="text" name="nombre">
    <button type="submit">Enviar</button>
</form>
```

*Sus partes son:*

- `<form>`: contiene el formulario.
- `action="guardar.php"`: indica a qué archivo se envían los datos.
- `method="post"`: indica el método de envío.
- `<input>`: crea un campo de entrada.
- `type="text"`: indica que el campo recibe texto.
- `name="nombre"`: identifica el dato que se enviará.
- `<button type="submit">`: crea el botón para enviar.

El atributo `name` es fundamental: **PHP** utiliza ese nombre para acceder al dato recibido.

---

## 8. ¿Qué es PHP?

**PHP** es un lenguaje de programación que se ejecuta en el **servidor**.

Permite procesar datos, realizar cálculos, evaluar condiciones y generar contenido para una página.

*Cuando se solicita una página **PHP**:*

1. El servidor ejecuta el código **PHP**.
2. Envía el resultado al navegador.
3. El navegador muestra el contenido recibido.

**HTML** define la estructura de la página. **PHP** permite procesar información en el servidor.

Los archivos con código **PHP** normalmente usan la extensión `.php`.

---

## 9. Cómo escribir código PHP

Un bloque de **PHP** comienza con `<?php` y puede terminar con `?>`.

```php
<?php
echo "Hola";
?>
```

Las instrucciones simples, como una asignación o un `echo`, terminan con punto y coma (`;`).

```php
<?php
$nombre = "Ana";
echo $nombre;
?>
```

En archivos que contienen únicamente **PHP**, es habitual omitir la etiqueta de cierre `?>`.

---

## 10. Mostrar contenido con `echo`

`echo` permite mostrar textos o valores.

```php
echo "Hola, mundo";
```

*Resultado:*

```text
Hola, mundo
```

*También podemos mostrar números:*

```php
echo 25;
```

*Resultado:*

```text
25
```

Los **textos** se escriben entre comillas. Los **números** pueden escribirse sin comillas.

---

## 11. Variables

Una **variable** permite guardar un valor para utilizarlo después.

En **PHP**, las variables comienzan con el signo `$`.

```php
$nombre = "Ana";
$edad = 15;
```

- `$nombre` guarda el texto `"Ana"`.
- `$edad` guarda el número `15`.
- `=` **asigna** un valor a una variable.

*Para mostrar el valor de una variable:*

```php
$nombre = "Ana";
echo $nombre;
```

*Resultado:*

```text
Ana
```

Los nombres de las variables distinguen mayúsculas y minúsculas: `$nombre` y `$Nombre` son variables diferentes.

---

## 12. Textos y números

En **PHP** podemos trabajar con distintos tipos de valores.

### Texto

Un **texto**, también llamado **cadena**, se escribe entre comillas.

```php
$curso = "Programación";
```

*Para textos sencillos podemos usar comillas dobles o simples:*

```php
$nombre = "Ana";
$apellido = 'Pérez';
```

### Números

Los **números** se pueden utilizar para realizar cálculos.

```php
$edad = 16;
$precio = 150.50;
```

En el código, los números decimales se escriben con punto.

---

## 13. Operaciones básicas

**PHP** permite realizar **operaciones matemáticas**.

| Operación | Símbolo | Ejemplo | Resultado |
|-----------|---------|---------|-----------|
| Suma | `+` | `4 + 3` | `7` |
| Resta | `-` | `8 - 2` | `6` |
| Multiplicación | `*` | `3 * 2` | `6` |
| División | `/` | `10 / 2` | `5` |

*Ejemplo con variables:*

```php
$a = 4;
$b = 3;

echo $a + $b;
```

*Resultado:*

```text
7
```

*También podemos guardar el resultado:*

```php
$total = 4 + 3;
echo $total;
```

---

## 14. Unir textos: concatenación

**Concatenar** significa unir textos.

En **PHP** se utiliza el punto (`.`).

```php
$nombre = "Ana";
echo "Hola, " . $nombre;
```

*Resultado:*

```text
Hola, Ana
```

*También se pueden unir textos con números:*

```php
$edad = 15;
echo "Tengo " . $edad . " años";
```

*Resultado:*

```text
Tengo 15 años
```

> **Recordá:** el punto (`.`) une textos. El signo `+` se utiliza para sumar.

---

## 15. Condiciones: `if` y `else`

Una **condición** permite decidir qué instrucciones ejecutar.

- `if` ejecuta un bloque cuando la condición se cumple.
- `else` ejecuta otro bloque cuando no se cumple.

```php
$edad = 18;

if ($edad >= 18) {
    echo "Mayor de edad";
} else {
    echo "Menor de edad";
}
```

*Resultado:*

```text
Mayor de edad
```

`>=` significa “mayor o igual que”. Como la edad es 18, la condición se cumple.

*Si cambiamos la edad:*

```php
$edad = 15;
```

*El resultado será:*

```text
Menor de edad
```

Las llaves `{ }` agrupan las instrucciones de cada bloque.

---

## 16. Asignar y comparar

`=` y `==` tienen funciones diferentes.

### Asignar con `=`

Guarda un valor en una variable.

```php
$numero = 10;
```

### Comparar con `==`

Comprueba si dos valores son iguales.

```php
if ($numero == 10) {
    echo "El número es diez";
}
```

Otros **operadores de comparación** sencillos:

| Operador | Significado |
|----------|-------------|
| `==` | Igual a |
| `!=` | Distinto de |
| `>` | Mayor que |
| `<` | Menor que |
| `>=` | Mayor o igual que |
| `<=` | Menor o igual que |

> **Recordá:** `=` asigna; `==` compara.

---

## 17. Recibir datos con `$_GET`

Cuando un formulario utiliza el método `get`, **PHP** puede acceder a los datos mediante `$_GET`.

```html
<form action="buscar.php" method="get">
    <input type="text" name="nombre">
    <button type="submit">Buscar</button>
</form>
```

En `buscar.php`, el dato enviado se puede recibir así:

```php
$nombre = $_GET["nombre"];
```

La palabra `"nombre"` coincide con el atributo `name` del campo.

Los datos enviados mediante **GET** aparecen en la dirección de la página. Por ejemplo:

```text
buscar.php?nombre=Ana
```

---

## 18. Recibir datos con `$_POST`

Cuando un formulario utiliza el método `post`, **PHP** puede acceder a los datos mediante `$_POST`.

```html
<form action="guardar.php" method="post">
    <input type="text" name="nombre">
    <button type="submit">Enviar</button>
</form>
```

En `guardar.php`:

```php
$nombre = $_POST["nombre"];
```

Si la persona escribe `Ana` y envía el formulario, la variable `$nombre` recibe ese texto.

*Otro ejemplo:*

```html
<input type="email" name="email">
```

*Si ese campo pertenece a un formulario enviado por **POST**, se recibe con:*

```php
$email = $_POST["email"];
```

*El nombre debe coincidir:*

- `name="nombre"` → `$_POST["nombre"]`
- `name="email"` → `$_POST["email"]`

Estos ejemplos suponen que el formulario fue enviado con esos campos.

### Diferencia básica entre GET y POST

| Método | Cómo se recibe en **PHP** | Dónde viajan los datos |
|--------|----------------------|------------------------|
| GET | `$_GET["campo"]` | En la dirección de la solicitud |
| POST | `$_POST["campo"]` | En el cuerpo de la solicitud |

**POST** no muestra esos datos en la dirección, pero no los cifra por sí mismo. Para proteger la comunicación se utiliza **HTTPS**.

---

## 19. Incluir archivos con `require_once`

`require_once` permite incluir y ejecutar el contenido de otro archivo PHP **una sola vez** durante la ejecución de la solicitud.

```php
require_once "funciones.php";
```

Esto permite **reutilizar código** guardado en otro archivo.

*Por ejemplo,* si `saludo.php` contiene:

```php
<?php
echo "Hola";
```

*Y otro archivo contiene:*

```php
<?php
require_once "saludo.php";
require_once "saludo.php";
```

*El resultado será:*

```text
Hola
```

Aunque aparece dos veces, el archivo se incluye una sola vez.

Si el archivo requerido no existe, se produce un **error fatal** y, si no se maneja, la ejecución se detiene.

> **Recordá:** se escribe `require_once`, con un guion bajo entre ambas palabras.

---

## 20. Resumen para el examen

- **HTML** define la estructura y el contenido de una página.
- `<body>` contiene lo que se ve dentro de la página.
- `<title>` define el título de la pestaña.
- `<h1>` representa el título principal.
- `<p>` crea un párrafo.
- `<a href="...">` crea un enlace.
- `<img src="..." alt="...">` muestra una imagen con texto alternativo.
- `<ol>` crea una lista numerada y `<ul>` una lista con viñetas.
- `<li>` representa un elemento de una lista.
- `<form>` crea un formulario.
- `name` identifica un campo al enviarlo.
- **PHP** se ejecuta en el servidor.
- `<?php` inicia un bloque de **PHP**.
- `echo` muestra contenido.
- Las variables comienzan con `$`.
- Los textos se escriben entre comillas.
- `+`, `-`, `*` y `/` permiten realizar cálculos.
- El punto (`.`) permite unir textos.
- `if` y `else` permiten tomar decisiones.
- `=` asigna y `==` compara.
- `$_GET` recibe datos enviados mediante GET.
- `$_POST` recibe datos enviados mediante POST.
- `require_once` incluye un archivo una sola vez por solicitud.

---

## Práctica sugerida

Antes del examen, intentá:

- Escribir una página con un título y un párrafo.
- Agregar un enlace, una imagen y una lista.
- Crear una variable con tu nombre.
- Mostrar un saludo uniendo un texto con esa variable.
- Sumar dos números y mostrar el resultado.
- Leer un `if` y explicar qué mensaje mostrará.
- Reconocer cómo se recibe un campo de formulario con `$_POST`.
- Explicar qué sucede si se incluye el mismo archivo dos veces con `require_once`.

---

## No se evaluarán

- Bases de datos
- programación orientada a objetos
- sesiones
- cookies
- frameworks 
- ejercicios extensos.

---