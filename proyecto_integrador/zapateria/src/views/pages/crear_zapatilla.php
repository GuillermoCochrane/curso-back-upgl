<?php
  // MVP: Procesamos el POST acá mismo para no dar más vueltas
  $mensaje = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (empty($_POST['nombre']) || empty($_POST['marcaID']) || empty($_POST['precio'])) {
          $mensaje = '<div class="alert alert-danger">Por favor, completá los campos obligatorios.</div>';
      } else {
          // Llamamos a tu orquestador
          agregarEntrada(DB_ZAPATILLAS, cargarDatos(DB_ZAPATILLAS), $_POST, 'zapatillas');
          
          // Redirigimos al catálogo (usando header y exit)
          header('Location: ' . BASE_PATH . '/pages/zapatillas');
          exit;
      }
  }
?>

<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
      
      <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4 p-md-5">
          
          <h2 class="mb-4 fw-bold text-primary">Agregar Zapatilla</h2>
          
          <?= $mensaje ?>

          <form method="POST" action="">
            <div class="row g-3">
              
              <div class="col-6">
                <label class="form-label">Modelo / Nombre *</label>
                <input type="text" name="nombre" class="form-control" required>
              </div>
              
              <div class="col-6">
                <label class="form-label">Marca *</label>
                <select name="marcaID" class="form-select" required>
                  <option value="">Seleccione una marca...</option>
                  <?php foreach ($marcas ?? [] as $m): ?>
                    <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Precio ($) *</label>
                <input type="number" name="precio" class="form-control" min="0" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Stock *</label>
                <input type="number" name="stock" class="form-control" min="0" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Talles</label>
                <input type="text" name="talles" class="form-control" placeholder="Ej: 36, 37, 38">
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Colores</label>
                <input type="text" name="colores" class="form-control" placeholder="Ej: Blanco, Negro">
              </div>

              <div class="col-12">
                <label class="form-label">URL de la Imagen</label>
                <input type="url" name="imagen" class="form-control" placeholder="https://...">
              </div>

              <div class="col-12">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3"></textarea>
              </div>

              <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary px-4 rounded-pill">Guardar Zapatilla</button>
                <a href="<?= BASE_PATH ?>/pages/zapatillas" class="btn btn-outline-secondary px-4 rounded-pill ms-2">Cancelar</a>
              </div>
              
            </div>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
</main>