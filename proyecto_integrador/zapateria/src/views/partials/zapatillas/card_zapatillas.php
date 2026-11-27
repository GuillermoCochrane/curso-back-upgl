<article class="col">
	<div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
		<?php 
			$fallback_path = BASE_PATH . "/public/img/fallback.webp";
			$img_src = !empty($imagen) ? $imagen : $fallback_path; 
		?>
		<img
			src="<?= escapar($img_src) ?>"
			class="card-img-top p-3 bg-white"
			alt="Zapatilla <?= escapar($nombre ?? 'Generica') ?>"
			onerror="this.onerror=null; this.src='<?= escapar($fallback_path) ?>';"
		>
		<div class="card-body p-4 d-flex flex-column">
			<h5 class="card-title fw-bold">
				<?= isset($nombre) ? escapar($nombre) : "Zapatilla Generica" ?>
			</h5>
			<p class="card-text text-body-secondary small">
				<?= isset($descripcion) ? escapar($descripcion) : "" ?>
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