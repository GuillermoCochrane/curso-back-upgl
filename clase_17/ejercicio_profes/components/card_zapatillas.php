<article class="col">
	<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
		<img
			src=<?= isset($imagen) ? $imagen : "./img/generica.jpg" ?>
			class="card-img-top p-3 bg-white"
			alt="Zapatilla <?= isset($marca) ? $marca : "Generica" ?>"
			styñe="max-width: 350px"
		>
		<div class="card-body p-4 d-flex flex-column">
			<h5 class="card-title fw-bold">
				<?= isset($nombre) ? $nombre : "Zapatilla Generica" ?>
			</h5>
			<p class="card-text text-body-secondary small">
				<?= isset($descripcion) ? $descripcion : "" ?>
			</p>
			<button
				class="btn btn-outline-dark rounded-pill mt-auto"
				data-bs-toggle="modal"
				data-bs-target="#detallesModal"
				data-zapatilla="<?= isset($id) ? $id : "" ?>"
			>
				Ver Detalles
			</button>
		</div>
	</div>
</article>