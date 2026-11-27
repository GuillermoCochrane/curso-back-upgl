# 📝 Deuda Técnica y Backlog (Proyecto Zapatería)

Este archivo registra todas las funcionalidades, mejoras y refactorizaciones que decidimos postergar para mantener el enfoque en el MVP actual (ABM de Zapatillas) y cumplir con la consigna del curso.

## 🚀 Funcionalidades del CRUD Faltantes
- [ ] **ABM de Marcas**: CRUD completo para gestionar las marcas.
- [ ] **ABM de Talles y Colores**: CRUD para gestionar estas entidades (actualmente son strings/arrays manuales).

## 🎨 Frontend y UX (Experiencia de Usuario)
- [ ] **Restaurar validación nativa HTML**: Volver a poner `"required" => true` en el `zapatillas_form_handler.php` (se dejó en `false` para testear las validaciones de backend).
- [ ] **Validación individual por campo**: Mostrar los mensajes de error debajo de cada input (usando la clase `invalid-feedback` de Bootstrap) en lugar de un cartel genérico.
- [ ] **Unificación del JS (El fin del hardcodeo)**: Eliminar el array gigante de `carga_zapatillas.js` y hacer que los datos del modal se consuman mediante un `fetch()` a una API en PHP o mediante `json_encode()`.
- [ ] **Home Dinámica**: Modificar la lógica para que la página de inicio solo muestre 3 zapatillas aleatorias de cada marca.
- [ ] **Filtro por marca**: Hacer que al hacer clic en una marca (ej: `/marcas/nike`), el catálogo se filtre mostrando solo esa marca.
- [ ] **Modularizar CSS**: Separar el `estilos.css` en archivos más pequeños por responsabilidad (si el proyecto sigue creciendo).
- [ ] **Buscador**: implemnetar un buscador predictivo en el header, disponible en todas las paginas
- [ ] **Imagenes**: crear un fallback por defecto para cuando los productos / marcas, no tienen imagen
- [ ] **Refactorizar títulos del formulario**: Mover la lógica de `if ($editar)` de la vista `zapatilla_form.php` a un ViewModel o al controlador para mantener el template 100% "tonto".

## 🏗️ Arquitectura y Refactorizaciones
- [X] **Refactorizar `CRUDServices.php`**: Quitar el hardcodeo de `DB_ZAPATILLAS` en `agregarEntrada` para que el servicio sea 100% genérico y sirva para guardar Marcas o Talles.
- [ ] **Migrar a Pretty URLs (Rutas amigables)**: Pasar de `/pages/zapatillas/detalle?id=1` a `/zapatillas/nike-dunk-low` (requeriría configurar `.htaccess` en Apache).
- [ ] **Implementar Autenticación (Login/Sesiones)**: Usar `$_SESSION` en PHP para proteger la ruta `/crear` y que solo los administradores logueados puedan agregar, modificar o borrar zapatillas.
- [ ] **Method Override**: Implementar la lógica para simular métodos `PUT` y `DELETE` en formularios HTML (usando un `<input type="hidden" name="_method">`).
- [ ] Habilitar talles y colores muLtiples al agregar las entidades correspondientes

---