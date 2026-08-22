<?php require_once 'alumnos.php'; ?>
<?php require_once 'funciones.php'; ?>
<?php include 'head.php'; ?>
<body class="d-flex flex-column min-vh-100">
  <!--

    🧩 *5. Utilizar archivos separados*

    Deberán reutilizar los archivos:

    `header.php`
    `footer.php`

    Y cargar también:

    `funciones.php`

  -->
  
<?php include 'header.php'; ?>

  <main class="container my-4 flex-grow-1">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h2 class="h4 mb-3">📋 Listado de alumnos</h2>
        <p class="text-muted small">Notas y asistencia registradas para el período actual.</p>

        <section class="table-responsive">
          <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-primary">
              <tr>
                <th>#</th>
                <th>Alumno</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Promedio</th>
                <th>Asistencia</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <!--
                🔁 *3. Recorrer los alumnos*

                Utilizando un `foreach`, deberán recorrer todos los alumnos.
                Por cada alumno deberán:

                1️⃣ Obtener sus datos.
                2️⃣ Calcular el promedio llamando a `calcularPromedio()`.
                3️⃣ Obtener su estado llamando a `obtenerEstado()`.
                4️⃣ Mostrar el resultado.

                ---

                📊 *4. Mostrar una tabla con Bootstrap*

                La página deberá mostrar una tabla similar a esta:

                *Alumno | Nota 1 | Nota 2 | Promedio | Asistencia | Estado*

                Cada fila deberá generarse automáticamente desde el `foreach`.
                ⚠️ No vale escribir cada alumno manualmente en HTML.

              -->
                <?php 
                  foreach ($alumnos as $alumno): 
                  $promedio = calcularPromedio($alumno['nota1'], $alumno['nota2']);
                  $estado = obtenerEstado($promedio, $alumno['asistencia']);
                ?>
                  <tr>
                    <td><?= $alumno['id'] ?></td>
                    <td>
                      <strong>
                        <?= $alumno['nombre'] ?>
                      </strong>
                    </td>
                    <td>
                      <span class="badge bg-info text-muted">
                        <?= $alumno['nota1'] ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge bg-secondary">
                        <?= $alumno['nota2'] ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge <?= estiloPromedio($promedio) ?>">
                        <?= $promedio ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge <?= estiloAsistencia($alumno['asistencia']) ?>">
                        <?= $alumno['asistencia'] ?>%
                      </span>
                    </td>
                    <td>
                      <span class="badge <?= $estilosEstados[$estado] ?>">
                        <?= $estado ?>
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </section>

        <section class="mt-3 d-flex gap-2 flex-wrap">
          <span class="badge bg-success">Promocionado</span>
          <span class="badge bg-warning text-dark">Rinde final</span>
          <span class="badge bg-danger">Recursa</span>
          <small class="text-muted ms-2">* Promedio ≥ 7 y asistencia ≥ 80% → Promocionado</small>
        </section>
      </div>
    </div>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
