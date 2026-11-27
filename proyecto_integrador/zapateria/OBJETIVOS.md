# 📌 TRABAJO INTEGRADOR – PHP NIVEL INTERMEDIO

## **Objetivo Principal**:
> Crear un ABM (Alta, Baja y Modificación) que permita gestionar zapatillas y mostrarlas en una página web.

---

### 📂 Estructura Mínima Requerida (Consigna Original)
- [x] `header.php`
- [x] `footer.php`
- [x] `funciones.php`
- [x] `ABM_zapatillas.php`
- [x] `home.php`
- [x] `index.php`

*(Nota: La estructura real del proyecto evolucionó hacia una arquitectura modular con Front Controller, sub-routers, controladores, servicios de validación/sanitización y persistencia en JSON. Ver [`README.md`](README.md) para el mapa completo).*

---

### 👟 Entidad: Zapatilla (Campos Requeridos)
Cada zapatilla debe contar con los siguientes datos:
- [x] **Marca**: (Ej. Nike, Adidas — implementada como entidad relacionada en `marcas.json` mediante `marca_id`)
- [x] **Modelo**: (Ej. Dunk Low — guardado en `nombre`)
- [x] **Color**: (Ej. Blanco, Negro)
- [x] **Talle**: (Ej. 36, 37, 38...)
- [x] **Precio**: (Numérico)
- [x] **Stock**: (Cantidad disponible)

---

> Documento generado para mantener la consigna a mano sin ensuciar el código fuente.
