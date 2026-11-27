# 📝 Deuda Técnica y Backlog (Proyecto Zapatería)

Este archivo registra las funcionalidades, correcciones y refactorizaciones que se resolvieron durante el cierre del MVP o quedaron planificadas para futuras iteraciones más allá de la consigna del curso.

## 🚀 Funcionalidades del CRUD y Catálogo Pendientes
- [ ] **Buscador / filtro por nombre**: Implementar búsqueda por texto en el catálogo (o predictiva desde el header) usando `stripos()`.
- [ ] **Mostrar nombre de la marca en el detalle**: Resolver el nombre de la marca a partir de `marca_id` tanto en la vista de detalle como en el modal.
- [ ] **Filtro dedicado por marca (`/pages/marcas`)**: Dar lógica propia a `routerMarcas.php` para filtrar el catálogo por marca (ej: `/marcas/nike`) en lugar de derivar a `helpController.php`.
- [ ] **ABM de Marcas**: CRUD completo para gestionar las marcas en `marcas.json`.
- [ ] **ABM de Talles y Colores**: CRUD para gestionar estas entidades y habilitar múltiples talles/colores por zapatilla (hoy son valores simples).
- [ ] **Home Dinámica**: Mostrar un subconjunto (ej. 3 zapatillas aleatorias) por marca en la landing y dejar el catálogo completo en `/pages/zapatillas`.

## 🎨 Frontend, UX y Validación
- [X] **Restaurar validación nativa HTML**: `"required" => true` restaurado en `zapatillas_form_handler.php` para `nombre`, `marca_id`, `precio` y `stock`.
- [ ] **Validación individual por campo**: Los partials (`input.php`, `select.php`, `textarea.php`) ya soportan `is-invalid` e `invalid-feedback`; falta devolver errores por campo desde `ValidationServices.php` y el controlador en lugar de un único mensaje general.
- [ ] **Permitir precios con decimales**: Actualizar el `JSON`, el input del form y usar `normalizarDecimal()` del `SanitizationService`.
- [ ] **Validación numérica y referencial en backend**: Validar en `ValidationServices.php` que `precio` y `stock` sean numéricos `>= 0` y que `marca_id` exista en `marcas.json`.
- [X] **Unificación del JS (El fin del hardcodeo)**: Se eliminó el array hardcodeado en `carga_zapatillas.js` y ahora el modal consume el endpoint JSON mediante `fetch()`.
- [X] **Imágenes (Fallback)**: Implementado `fallback.webp` en PHP y `onerror` en JS *(pendiente quitar la línea duplicada en `carga_zapatillas.js` que pisa `src` cuando `data.imagen` viene vacío, y usar `BASE_PATH` en el link del modal)*.
- [X] **Refactorizar títulos del formulario**: El controlador ya envía `$titulo`, `$submit_text`, `$submit_class` y `$handler_path` hacia `form.php`, dejando la vista libre de lógica.
- [X] **Rutas de scripts en Home**: Reemplazar `./public/script/...` por `BASE_PATH` en `src/views/scripts/home.php` y eliminar la URL hardcodeada en `carga_zapatillas.js`.
- [ ] **Modularizar CSS**: Separar `public/css/styles.css` en archivos más pequeños si el proyecto sigue creciendo.

## 🏗️ Arquitectura, Seguridad y Refactorizaciones
- [X] **Refactorizar `CRUDServices.php` (Alta)**: `agregarEntrada()` ya recibe `$entidad` y `$DB` usando `modelHandler()` *(pendiente generalizar también `actualizarEntrada()` y unificar el orden de parámetros entre las funciones del servicio)*.
- [X] **Bloquear formulario en ID inexistente**: Evitar renderizar el formulario/botón en `datosEditarZapatilla` y `datosEliminarZapatilla` cuando `empty($zapatilla)`.
- [ ] **PRG completo en Eliminar y mensajes Flash**: Redirigir tras eliminar y migrar alertas de éxito/error a `$_SESSION` para no perderlas al recargar.
- [X] **Escape de salidas faltante**: Aplicar `escapar()` en `$titulo` dentro de `form.php` y en `$img_src` en tarjetas/detalle.
- [ ] **Migrar a Pretty URLs (Rutas amigables)**: Configurar `.htaccess` en Apache para evitar los stubs en `pages/` (ej: `/zapatillas/nike-dunk-low`).
- [ ] **Implementar Autenticación (Login/Sesiones)**: Usar `$_SESSION` en PHP para proteger las rutas de administración (`/crear`, `/editar`, `/eliminar`).
- [ ] **Method Override**: Simular métodos `PUT` y `DELETE` en formularios HTML mediante un `<input type="hidden" name="_method">`.
