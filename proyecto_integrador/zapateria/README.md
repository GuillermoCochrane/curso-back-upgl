# 👟 Zapatos El Cordón - Proyecto Integrador PHP

Este proyecto es un sistema de gestión (ABM/CRUD) y catálogo online para una tienda de zapatillas. Fue desarrollado como Trabajo Integrador Final para un curso de PHP Nivel Intermedio, aplicando buenas prácticas de arquitectura de software, separación de responsabilidades y seguridad.

## 🚀 Tecnologías Utilizadas
* **Backend:** PHP 8 (Vanilla, sin frameworks)
* **Base de Datos:** Archivos JSON (Persistencia plana)
* **Frontend:** HTML5, CSS3, Bootstrap 5, JavaScript (Vanilla + Fetch API)
* **Servidor Local:** Apache (XAMPP/Laragon)

---

## 🏗️ Arquitectura del Proyecto
A diferencia de un CRUD tradicional, el proyecto fue refactorizado para implementar un patrón **MVC (Modelo-Vista-Controlador)** con un **Front Controller** y **Enrutamiento Jerárquico**.

### Estructura de Carpetas Principal
* `public/`: Único punto de acceso público (CSS, JS, imágenes).
* `src/controllers/`: Orquestadores de la lógica (reciben peticiones, validan, sanitizan y llaman a los servicios).
* `src/services/`: El corazón del backend. Contiene la lógica de negocio, el mapeo de datos y la seguridad.
    * `CRUDServices.php`: Orquestación de altas, bajas y modificaciones.
    * `ValidationServices.php`: Reglas de validación (campos requeridos, URLs).
    * `SanitizationServices.php`: Normalización de entradas (trim, casteos) y escape de salidas (XSS).
    * `ModelService.php`: Mapeo (Data Mapper) de los datos del formulario a las entidades de la DB.
* `src/repositories/`: Acceso a datos (`JsonRepository.php` con bloqueo de archivos `LOCK_EX`).
* `src/router/`: Enrutamiento principal y sub-routers por entidades (`routerZapatillas.php`).
* `src/views/`: Sistema de plantillas modular.
    * `pages/`: Vistas principales (Home, Detalle, ABM).
    * `components/`: Componentes con lógica de presentación (*Smart Managers* / Handlers).
    * `partials/`: Componentes visuales "tontos" (Botones, Inputs, Tarjetas).

---

## ✨ Funcionalidades Destacadas
* **CRUD Completo**: Creación, lectura, edición y eliminación de zapatillas con persistencia en JSON.
* **Enrutamiento Dinámico**: Sistema de URLs amigables con sub-routers para mantener el código escalable.
* **Seguridad**:
  * Validación estricta de datos en el backend.
  * Sanitización de entradas para evitar inyecciones de código.
  * Escape de salidas (`htmlspecialchars`) en todas las vistas para prevenir ataques XSS.
* **Experiencia de Usuario (UX)**:
  * Formularios que conservan los datos del usuario si falla una validación.
  * Alertas dinámicas (Bootstrap) para notificar errores o éxitos.
  * Imagen de "fallback" automática para zapatillas sin foto o con enlaces rotos.
* **API Interna**: Endpoint JSON (`/api`) para poblar el modal de detalles mediante `Fetch API` sin recargar la página.

---

## ⚙️ Cómo ejecutar el proyecto localmente
1. Clonar el repositorio en la carpeta `htdocs` (XAMPP) o `www` (Laragon).
2. Asegurarse de tener habilitado el módulo de Apache y PHP 8+.
3. Iniciar el servidor Apache.
4. Acceder desde el navegador a: `http://localhost/proyecto_integrador/zapateria/` (o la ruta correspondiente a tu entorno).

---

## 📝 Deuda Técnica y Roadmap (Futuras Mejoras)
Este proyecto fue construido priorizando los requisitos del curso (YAGNI), dejando documentadas las siguientes mejoras arquitectónicas para futuras iteraciones:
- [ ] **Autenticación**: Implementar Login y Sesiones (`$_SESSION`) para proteger las rutas de administración (ABM).
- [ ] **Normalización de Entidades**: Crear el ABM de Marcas, Talles y Colores (actualmente gestionados como valores simples o IDs relacionados).
- [ ] **Soporte Multi-talle/color**: Refactorizar la base de datos y el formulario para permitir múltiples talles y colores por zapatilla (arrays).
- [ ] **Rutas Amigables (Pretty URLs)**: Implementar reglas de reescritura (`.htaccess`) para eliminar los parámetros GET (ej: `/zapatillas/nike-dunk-low`).
- [ ] **Mensajes Flash**: Migrar los mensajes de éxito/error a sesiones para evitar que se pierdan al recargar la página (Patrón PRG).

---
*Desarrollado aplicando principios de Responsabilidad Única (SRP), DRY y separación de conceptos.*
