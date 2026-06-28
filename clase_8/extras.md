Se animan a hacer que el precio por articulo deje de ser una variable vacia y el usuario pueda poner cuantos articulos llevo para calcular el total? Lo vemos la semana que viene... tambien el finde confirmamos de la clase del Lunes!

---

Comparto un link donde hay muchisima info de PHP https://www.w3schools.com/php/php_intro.asp

---

El método POST en PHP se utiliza para enviar datos de forma segura al servidor, ya que la información viaja en el cuerpo de la petición HTTP y no en la URL. Es ideal para enviar datos confidenciales (como contraseñas) y archivos adjuntos. ¿Cómo funciona?Para enviar datos con POST, debemos utilizar un formulario HTML con el atributo method="post". Para procesar esta información en PHP, se utiliza la variable superglobal $_POST 
1. El formulario HTML (index.html)Crea tu formulario y define a qué archivo PHP se enviarán los datos mediante el atributo action :
``` html
 <form action="procesar.php" method="POST">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    
    <button type="submit">Enviar</button>
</form> 
```
2. El archivo de procesamiento (procesar.php)En tu archivo PHP, debes verificar que el botón haya sido presionado usando isset() y luego acceder a los datos usando el atributo name del input como clave:
``` php
<?php
if (isset($_POST['nombre'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    echo "¡Hola, " . $nombre . "! Bienvenido.";
}
?>
```
---

