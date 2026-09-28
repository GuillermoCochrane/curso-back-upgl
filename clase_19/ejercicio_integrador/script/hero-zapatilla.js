(() => {
    const modelo = document.getElementById('hero-zapatilla-3d');
    const boton = document.getElementById('hero-zapatilla-giro');
    const estado = document.getElementById('hero-zapatilla-estado');
    if (!modelo || !boton) return;

    const movimientoReducido = window.matchMedia('(prefers-reduced-motion: reduce)');
    const actualizarGiro = (activo) => {
        modelo.toggleAttribute('auto-rotate', activo);
        boton.textContent = activo ? 'Pausar giro' : 'Iniciar giro';
    };
    actualizarGiro(!movimientoReducido.matches);
    movimientoReducido.addEventListener('change', (evento) => actualizarGiro(!evento.matches));
    boton.addEventListener('click', () => actualizarGiro(!modelo.hasAttribute('auto-rotate')));
    modelo.addEventListener('load', () => { boton.disabled = false; });
    const mostrarError = () => {
        estado.textContent = 'No se pudo cargar la vista 3D.';
        boton.disabled = true;
    };
    modelo.addEventListener('error', mostrarError);
    // Also leave a useful fallback if the external viewer cannot be downloaded.
    window.addEventListener('load', () => {
        if (!customElements.get('model-viewer')) mostrarError();
    });
})();
