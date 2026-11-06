# Resumen para el examen

---

## HTML
- `HTML` se **interpreta/renderiza** en el **cliente (navegador)**.
- `<html>` define la **estructura y el contenido** de una página.
- `<head>` define los **metadatos** de la página (no se muestran en el cuerpo).
- `<title>` define el **título** de la pestaña. Va dentro de `<head>`.
- `<body>` contiene lo que **se ve** dentro de la página.
- `<h1>` representa el **título principal**.
- `<p>` crea un **párrafo**.
- `<a href="...">` crea un **enlace**.
- `<img src="..." alt="...">` muestra una **imagen** con **texto alternativo**.
- `<ol>` crea una **lista numerada** y `<ul>` una **lista con viñetas**.
- `<li>` representa un **elemento** de una lista.
- `<form>` crea un **formulario**. Puede llevar `action="..."` y `method="get|post"`.
- `<input>` son los **campos de entrada** de un formulario.
- `name="..."` es un **atributo** de los campos que permite identificarlos en el backend al enviar el formulario.

---

## PHP
- `PHP` se ejecuta en el **servidor**.
- `<?php` inicia un bloque de **PHP**.
- `echo` muestra contenido.
- Las **variables** comienzan con `$`.
- Los **textos** se escriben entre comillas `" "` o `' '`.
- `+`, `-`, `*` y `/` permiten realizar cálculos.
- El punto `.` permite unir textos.
- `if` y `else` permiten tomar decisiones.
- `=` **asigna**, `==` **compara** y `===` **compara de forma estricta**.
- `$_GET` recibe datos enviados mediante **GET**. Es un array superglobal: `$_GET['campo']`.
- `$_POST` recibe datos enviados mediante **POST**. Es un array superglobal: `$_POST['campo']`.
- `require_once` incluye un archivo **una sola vez** por solicitud. Si no lo encuentra, produce error fatal.
- `include_once` incluye un archivo **una sola vez** por solicitud. Si no lo encuentra, produce una advertencia y el script continúa.
- `require` es como `include`, pero si falla **detiene la ejecución** con error fatal.

---

[procesar Forms en el backend con php](https://youtu.be/Z9aePaXve6s?si=7VTS5UVkY2752529)

---
