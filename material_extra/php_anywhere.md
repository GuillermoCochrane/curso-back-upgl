# Configuración del Entorno de Desarrollo (Trabajando sin `htdocs`)

**Objetivo** Aprender a ejecutar proyectos PHP alojados en cualquier unidad o carpeta de tu sistema, sin necesidad de copiarlos manualmente a la carpeta `C:\xampp\htdocs` de XAMPP.


---

## Introducción

Por defecto, **XAMPP** (Apache) tiene configurada la carpeta `C:\xampp\htdocs` como su "raíz" (DocumentRoot). Esto significa que para probar un proyecto, tradicionalmente tenemos que moverlo allí. Sin embargo, trabajar copiando y pegando archivos es tedioso, propenso a errores y duplica innecesariamente el espacio en disco.

A continuación, te presentamos **4 métodos** para ejecutar tu código PHP directamente desde tu carpeta de trabajo (por ejemplo, `D:\programacion\cursos`), ordenados de menor a mayor complejidad técnica.

---

## Requisitos Previos
- Tener instalado **XAMPP** o **Laragon** (según el caso).
- Tener acceso de **Administrador** en Windows (necesario para modificar archivos del sistema en las Opciones 2 y 3).
- Conocer la ruta exacta de tu proyecto (ej. `D:\programacion\cursos\mi-proyecto`).

---

## Opción 1: El Servidor Web Integrado de PHP (Para pruebas rápidas)

Si solo necesitas probar un script suelto o una clase específica, **no es necesario abrir XAMPP**. PHP incluye su propio servidor web minimalista, ideal para desarrollo local.

**Pasos:**
1. Abre la terminal (CMD) o PowerShell.
2. Navega hasta la carpeta que contiene tu archivo `index.php` principal. Por ejemplo:
   ```cmd
   cd D:\programacion\cursos\curso-back-upgl\clase_1
   ```
3. Ejecuta el siguiente comando:
   ```cmd
   php -S localhost:8000
   ```
4. Abre tu navegador y visita: `http://localhost:8000`

**Advertencia:** Este servidor está diseñado para desarrollo y pruebas, no para producción. Al cerrar la terminal, el servidor se detiene. No soporta `.htaccess` complejos, pero es perfecto para el backend básico que estás viendo en el curso.

---

## Opción 2: Modificar la Raíz Global de XAMPP (Cambio directo)

Esta opción modifica la configuración principal de Apache para que `localhost` apunte directamente a tu carpeta de proyectos general (ej. `D:\programacion\cursos`).

**Pasos:**
1. Abre el archivo de configuración de Apache:
   `C:\xampp\apache\conf\httpd.conf`
   *(Asegúrate de abrirlo con el Bloc de notas o editor de código en modo **Administrador**)*.

2. Busca la línea que dice:
   ```apache
   DocumentRoot "C:/xampp/htdocs"
   ```
   Y cámbiala por tu ruta deseada:
   ```apache
   DocumentRoot "D:/programacion/cursos"
   ```

3. Unas líneas más abajo, busca la directiva `<Directory>` que acompaña al DocumentRoot. Cambia:
   ```apache
   <Directory "C:/xampp/htdocs">
   ```
   Por:
   ```apache
   <Directory "D:/programacion/cursos">
   ```

4. Guarda el archivo y **reinicia Apache** desde el panel de control de XAMPP.

**Resultado:** Al escribir `http://localhost` verás el listado de todas tus subcarpetas (`curso-back`, `curso-front`, etc.).

**Inconveniente:** Verás muchas carpetas mezcladas. Si tu objetivo es tener un entorno limpio y separar varios cursos, esta opción se vuelve caótica a largo plazo.

---

## Opción 3: Hosts Virtuales (La solución PROFESIONAL y RECOMENDADA) ⭐

Esta es la mejor práctica utilizada en entornos de desarrollo profesional. Creamos "dominios personalizados" (como `back.test`) que apuntan exactamente a la subcarpeta que deseamos, sin tocar la raíz general de Apache.

**Paso 1: Configurar Apache (Virtual Hosts)**
1. Abre el archivo (con permisos de Administrador):
   `C:\xampp\apache\conf\extra\httpd-vhosts.conf`

2. Al final del archivo, agrega el siguiente bloque de código. Reemplaza la ruta con la ubicación de tu proyecto:
   ```apache
   <VirtualHost *:80>
       DocumentRoot "D:/programacion/cursos/curso-back-upgl"
       ServerName back.test
       <Directory "D:/programacion/cursos/curso-back-upgl">
           Options All
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

**Paso 2: Configurar el archivo `hosts` de Windows**
1. Abre el archivo de sistema (como Administrador):
   `C:\Windows\System32\drivers\etc\hosts`

2. Al final del documento, añade esta línea para mapear el dominio local:
   ```
   127.0.0.1 back.test
   ```

**Paso 3: Aplicar los cambios**
- Reinicia Apache desde el panel de XAMPP.

**Paso 4: ¡Probarlo!**
- Abre tu navegador y escribe: `http://back.test`
- Verás tu proyecto corriendo directamente desde `D:\programacion\cursos\curso-back-upgl`.

**Beneficio extra:** ¿Tienes un curso de Frontend? Solo repite los pasos y crea otro Virtual Host con `ServerName front.test` apuntando a la carpeta correspondiente. Así mantienes tus proyectos completamente aislados y con URLs amigables.

---

## Opción 4: Laragon (La alternativa moderna)

Si estás dispuesto a cambiar de entorno, **Laragon** es un reemplazo moderno de XAMPP que simplifica enormemente esta tarea.

1. Abre Laragon y ve a `Menú > Preferencias > General`.
2. En el campo "Document Root", cambia la ruta a `D:/programacion/cursos`.
3. Guarda los cambios y reinicia Laragon.

Además, Laragon cuenta con un sistema de "Virtual Hosts automático": solo arrastra tus carpetas a la raíz y él genera los dominios automáticamente (ej. `curso-back-upgl.test`).

---

## Conclusión y Recomendación Final

Para estudiantes y profesionales, **la Opción 3 (Virtual Hosts)** es la más equilibrada. Te permite:

- No depender de la carpeta `htdocs`.
- Tener URLs limpias (`back.test`, `front.test`).
- Aislar proyectos sin importar su ubicación física.
- Utilizar `.htaccess` y todas las funcionalidades completas de Apache.

**Resumen rápido según tu necesidad:**
- **Prueba rápida de 5 minutos:** Usa la Opción 1 (`php -S`).
- **Un solo proyecto principal:** Usa la Opción 2 (cambiar raíz).
- **Múltiples proyectos / Cursos completos:** Usa la Opción 3 (Virtual Hosts).
- **Quieres modernizar tu stack:** Prueba la Opción 4 (Laragon).

---

**Ejercicio práctico para el alumno:** Configura un Virtual Host para la carpeta `clase_2` de tu curso, asígnale el dominio `clase2.test` y verifica que el archivo `index.php` se ejecute correctamente.