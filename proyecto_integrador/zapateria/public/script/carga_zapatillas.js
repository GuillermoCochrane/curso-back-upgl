async function obtenerZapatilla(id) {
    try {
        const response = await fetch(`/proyecto_integrador/zapateria/pages/zapatillas/endpointZapatilla?id=${id}`);
        if (!response.ok) throw new Error('No encontrada');
        return await response.json();
    } catch (error) {
        console.error('Error al buscar zapatilla:', error);
        return null;
    }
}

document.addEventListener("DOMContentLoaded", function () {
  document.addEventListener("click", async function (e) {
    const btn = e.target.closest && e.target.closest("[data-zapatilla]");
    if (!btn) return; 
    const id = btn.getAttribute("data-zapatilla");
    const data = await obtenerZapatilla(id);
    console.log(data);
    
    if (!data) return;

    const imagen = document.getElementById("modal-imagen");
    const errorImagen = document.getElementById("modal-imagen-error");
    imagen.classList.remove("d-none");
    errorImagen.classList.replace("d-flex", "d-none");
    imagen.onerror = () => {
      imagen.classList.add("d-none");
      errorImagen.classList.replace("d-none", "d-flex");
    };
    imagen.alt = "Zapatilla " + data.nombre;
    imagen.src = data.imagen;

    document.getElementById("modal-nombre").textContent = data.nombre;
    document.getElementById("modal-precio").textContent = "$" + data.precio;
    document.getElementById("modal-descripcion").textContent = data.descripcion;
    document.getElementById("modal-talles").textContent = data.talles;
    document.getElementById("modal-colores").textContent = data.colores;
  });
});