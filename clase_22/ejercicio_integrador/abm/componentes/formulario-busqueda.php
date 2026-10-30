<section class="tarjeta">
        <h2>Buscar una zapatilla</h2>
        <form method="get">
            <input type="text" name="buscar" placeholder="Escribí parte del nombre" value="<?= escapar($busqueda) ?>">
            <button type="submit">Buscar</button>
            <a class="boton secundario" href="index.php">Mostrar todas</a>
        </form>
    </section>