# 👟 Zapatos El Cordón — Proyecto Integrador PHP

Catálogo online y sistema de gestión (**ABM / CRUD**) para una tienda de zapatillas, desarrollado como **Trabajo Integrador Final** para el curso de Back End PHP (UPGL).  
El proyecto toma la consigna base ([`OBJETIVOS.md`](OBJETIVOS.md)) y la implementa con una arquitectura modular inspirada en **MVC**, separación por capas, base de datos relacional en JSON y una API interna consumida desde JavaScript.

---

## 🚀 Tecnologías Utilizadas

| Capa | Tecnología |
| :--- | :--- |
| **Backend** | PHP 8+ (Vanilla, `declare(strict_types=1)`, expresiones `match`) |
| **Persistencia** | Archivos JSON (`zapatillas.json` y `marcas.json`) con bloqueo `LOCK_EX` |
| **Frontend** | HTML5, CSS3, Bootstrap 5.3, Bootstrap Icons, Font Awesome 5 |
| **Interactividad** | JavaScript (Vanilla + `Fetch API`) |
| **Visor 3D** | Google `<model-viewer>` 4.1.0 (`zapatilla.glb` en el hero) |
| **Servidor Local** | Apache (XAMPP / Laragon) |

---

## 🏗️ Arquitectura del Proyecto

En lugar de mezclar HTML, lógica de negocio y acceso a datos en un único archivo, el proyecto aplica un enfoque **Front Controller + Enrutamiento Jerárquico + Capas** (`Router → Controller → Services → Repository → Views`).

Para lograr **URLs limpias sin depender de `.htaccess`**, cada ruta en `pages/` contiene un pequeño *stub* (`index.php`) de 2 líneas que re-incluye al `index.php` de la raíz. Luego el router analiza `REQUEST_URI` y despacha la petición al sub-router y controlador correspondiente.

### Estructura de Carpetas

```text
zapateria/
├── index.php                          # Front Controller: define BASE_PATH y DBs, ejecuta el router y renderiza
├── OBJETIVOS.md                       # Consigna original del trabajo integrador
├── DEUDA_TECNICA.md                   # Backlog de mejoras y deuda técnica registrada
├── README.md
│
├── pages/                             # Puntos de entrada para URLs limpias sin mod_rewrite
│   ├── index.php
│   ├── marcas/index.php
│   └── zapatillas/
│       ├── index.php                  # Catálogo completo (/pages/zapatillas)
│       ├── crear/index.php            # Alta de zapatilla
│       ├── detalle/index.php          # Ficha individual (?id=N)
│       ├── editar/index.php           # Modificación (?id=N)
│       ├── eliminar/index.php         # Confirmación de baja (?id=N)
│       └── endpointZapatilla/index.php# API JSON (?id=N)
│
├── src/
│   ├── router/                        # Enrutador principal y sub-routers por sección
│   │   ├── router.php
│   │   ├── routerHome.php
│   │   ├── routerZapatillas.php
│   │   ├── routerMarcas.php
│   │   └── routerHelp.php
│   │
│   ├── controllers/                   # Orquestan peticiones GET/POST y arman los datos de la vista
│   │   ├── mainController.php
│   │   ├── zapatillasController.php
│   │   └── helpController.php
│   │
│   ├── services/                      # Reglas de negocio, mapeo y seguridad
│   │   ├── CRUDServices.php           # Altas, bajas, modificaciones y búsqueda por ID
│   │   ├── ModelService.php           # Data Mapper del formulario hacia la estructura de la entidad
│   │   ├── ValidationServices.php     # Validación de campos obligatorios y formato de URL
│   │   └── SanitizationServices.php   # Normalización de entradas, URI y escape XSS (escapar)
│   │
│   ├── repositories/
│   │   └── JsonRepository.php         # Lectura y escritura segura de JSON (LOCK_EX)
│   │
│   ├── utilities/
│   │   ├── render.php                 # Motor simple de plantillas basado en extract() + require
│   │   └── utilities.php              # Helpers generales (generarID, generarSlug, esPost, etc.)
│   │
│   ├── data/                          # Persistencia plana relacional
│   │   ├── marcas.json                # 5 marcas (id, nombre, slug)
│   │   └── zapatillas.json            # 27 zapatillas vinculadas por marca_id
│   │
│   └── views/                         # Vistas modulares inspiradas en Atomic Design
│       ├── templates/main.php         # Layout base (head + header + page + footer + scripts)
│       ├── pages/                     # Vistas de página (home, zapatillas, detalle, crear, help)
│       ├── components/                # Bloques compuestos con lógica de presentación (handlers/)
│       │   ├── home/                  # Hero 3D, navbar de marcas, grillas por marca
│       │   ├── shared/                # Head, header, footer, modal, detalle, form, select
│       │   └── zapatillas/            # Catálogo, detalle con acciones, handlers de formulario/borrado
│       ├── partials/                  # Piezas visuales reutilizables (input, select option, card, alert, botones)
│       └── scripts/                   # Carga condicional de scripts por vista (bootstrap, home, zapatillas)
│
└── public/                            # Assets estáticos (CSS, JS e imágenes)
    ├── css/styles.css
    ├── script/
    │   ├── carga_zapatillas.js        # Fetch al endpoint JSON para poblar el modal de detalles
    │   └── hero-zapatilla.js          # Control de giro, accesibilidad y fallback del modelo 3D
    └── img/
        ├── logo.png
        ├── fallback.webp               # Imagen por defecto ante URLs vacías o rotas
        ├── generica.jpg
        └── models/
            ├── zapatilla.glb          # Modelo 3D del hero
            └── ATTRIBUTION.md         # Licencia CC BY 4.0 (Shopify)
```

### Flujo de una petición (Ejemplo: Editar Zapatilla)

```text
Navegador → pages/zapatillas/editar/index.php?id=1
                 │ (include index.php raíz)
                 ▼
            index.php (Front Controller)
                 │
                 ▼
      router.php → routerZapatillas.php (evalúa URI y GET/POST)
                 │
                 ▼
    zapatillasController.php
      ├── GET  → datosEditarZapatilla($id) → JsonRepository / CRUDServices
      └── POST → actualizarZapatilla($id)  → Validation + Sanitization + CRUDServices → Redirect (PRG)
                 │
                 ▼
    render('src/views/templates/main', $datos)
      └── pages/crear_zapatilla.php → shared/form/form.php → handlers + partials
```

---

## 🛣️ Rutas Disponibles

| Ruta | Métodos | Descripción |
| :--- | :--- | :--- |
| `/` | `GET` | Landing page con hero 3D, barra de marcas y catálogo agrupado por marca |
| `/pages/zapatillas` | `GET` | Catálogo completo de zapatillas |
| `/pages/zapatillas/detalle?id=N` | `GET` | Ficha detallada de una zapatilla con accesos a **Editar** y **Eliminar** |
| `/pages/zapatillas/crear` | `GET` / `POST` | Formulario de alta de nueva zapatilla |
| `/pages/zapatillas/editar?id=N` | `GET` / `POST` | Formulario precargado para modificar una zapatilla existente |
| `/pages/zapatillas/eliminar?id=N` | `GET` / `POST` | Pantalla de confirmación y baja de registro |
| `/pages/zapatillas/endpointZapatilla?id=N` | `GET` | **API JSON** interna consumida por el modal vía `fetch()` (`200` o `404`) |
| `/pages/marcas` | `GET` | Ruta reservada para vista dedicada de marcas (actualmente derivada a `helpController`) |

---

## ✨ Funcionalidades y Decisiones Técnicas

* **ABM Completo de Zapatillas:** Creación, lectura (catálogo general, por marcas en Home y ficha individual), edición y eliminación con confirmación previa.
* **Relación Zapatillas ↔ Marcas:** `zapatillas.json` referencia a `marcas.json` mediante `marca_id`. El menú desplegable del header, la barra secundaria del Home, el footer y el `<select>` del formulario se alimentan dinámicamente desde `marcas.json`.
* **Modal Dinámico con API JSON + `fetch()`:** Al abrir los detalles desde una tarjeta, `carga_zapatillas.js` consulta `/pages/zapatillas/endpointZapatilla?id=N` sin recargar la página ni hardcodear datos en el frontend.
* **Patrón PRG (Post/Redirect/Get):** Tras crear o editar con éxito, el controlador redirige con `header('Location: ...')` hacia la ficha del producto para evitar el reenvío del formulario al refrescar (F5).
* **Reutilización de Formularios y Partials:** El mismo componente `form.php` y los mismos partials (`input.php`, `select.php`, `textarea.php`, `buttons.php`) resuelven **Crear**, **Editar** y **Eliminar** cambiando únicamente la configuración enviada desde el controlador.
* **Retención de Datos y Alertas:** Si falla la validación en backend, el formulario vuelve a renderizarse conservando los valores de `$_POST` y mostrando una alerta Bootstrap.
* **Validación, Sanitización y XSS:**
  * `ValidationServices.php` verifica campos obligatorios y formato de URL de imagen.
  * `SanitizationServices.php` limpia strings/enteros con `trim()` y `filter_var()`, y expone `escapar()` (`htmlspecialchars` UTF-8) para las vistas.
* **Resiliencia Visual:**
  * Si una zapatilla no tiene imagen o el enlace externo falla, las vistas aplican `public/img/fallback.webp` (y manejador `onerror` en navegador).
  * El hero 3D (`hero-zapatilla.js`) respeta `prefers-reduced-motion`, permite pausar el giro y muestra un estado alternativo si no carga `<model-viewer>`.

---

## ⚙️ Cómo Ejecutar el Proyecto Localmente

1. Clonar o copiar la carpeta del repositorio dentro de `htdocs` (XAMPP) o `www` (Laragon) respetando la ruta relativa `/proyecto_integrador/zapateria` (o ajustando `BASE_PATH`).
2. Verificar que estén activos **Apache** y **PHP 8.0 o superior**.
3. Asegurar permisos de lectura/escritura sobre la carpeta `src/data/` para que `JsonRepository.php` pueda actualizar `zapatillas.json`.
4. Abrir en el navegador:
   ```text
   http://localhost/proyecto_integrador/zapateria/
   ```

> **Nota de configuración:** Si movés el proyecto a otra ruta del servidor (por ejemplo `http://localhost/zapateria/`), actualizá la constante `BASE_PATH` en [`index.php`](index.php) y la URL del botón de detalles en [`public/script/carga_zapatillas.js`](public/script/carga_zapatillas.js).

---

## 📚 Documentación Complementaria y Créditos

* [`OBJETIVOS.md`](OBJETIVOS.md) — Consigna base del Trabajo Integrador y campos requeridos.
* [`DEUDA_TECNICA.md`](DEUDA_TECNICA.md) — Registro de mejoras pendientes, backlog funcional y próximas refactorizaciones (como buscador, filtro por marca y sesiones).
* [`public/img/models/ATTRIBUTION.md`](public/img/models/ATTRIBUTION.md) — Atribución del modelo 3D *Materials Variants Shoe* (Shopify, licencia CC BY 4.0).

---
*Desarrollado aplicando separación de responsabilidades, modularidad y criterio YAGNI sobre PHP Vanilla.*
