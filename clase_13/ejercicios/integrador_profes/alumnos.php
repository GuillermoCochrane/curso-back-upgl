<?php
  /*
    👨‍🎓 *1. Crear un array de alumnos*

      En `alumnos.php` deberán crear un array que contenga varios alumnos.

      Cada alumno debe tener:

      * Nombre
      * Nota 1
      * Nota 2
      * Asistencia

      Ejemplo de datos:

      Lucio → Nota 1: 8 | Nota 2: 9 | Asistencia: 90%
      Juan → Nota 1: 6 | Nota 2: 5 | Asistencia: 75%
      Ana → Nota 1: 3 | Nota 2: 4 | Asistencia: 85%
      Martina → Nota 1: 9 | Nota 2: 8 | Asistencia: 60%
  */
  $alumnos = [
    [
      'id' => 1,
      'nombre' => 'Lucio',
      'nota1' => 8,
      'nota2' => 9,
      'asistencia' => 90
    ],
    [
      'id' => 2,
      'nombre' => 'Juan',
      'nota1' => 6,
      'nota2' => 5,
      'asistencia' => 75
    ],
    [
      'id' => 3,
      'nombre' => 'Ana',
      'nota1' => 3,
      'nota2' => 4,
      'asistencia' => 85
    ],
    [
      'id' => 4,
      'nombre' => 'Martina',
      'nota1' => 9,
      'nota2' => 8,
      'asistencia' => 60
    ]
  ];
  /*
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

   */
  /*
  🧩 *5. Utilizar archivos separados*

    Deberán reutilizar los archivos:

    `header.php`
    `footer.php`

    Y cargar también:

    `funciones.php`

    La página `alumnos.php` debe contener principalmente los datos y el recorrido de los alumnos.

   */
  require_once 'funciones.php';
  require_once 'header.php'; 
?>

  <main class="container my-4 flex-grow-1">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h2 class="h4 mb-3">📋 Listado de alumnos</h2>
        <p class="text-muted small">Notas y asistencia registradas para el período actual.</p>

        <div class="table-responsive">
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
              <?php 
                foreach ($alumnos as $alumno): 
                $promedio = calcularPromedio($alumno['nota1'], $alumno['nota2']);
              ?>
                <tr>
                  <td><?= $alumno['id'] ?></td>
                  <td><strong><?= $alumno['nombre'] ?></strong></td>
                  <td><?= $alumno['nota1'] ?></td>
                  <td><?= $alumno['nota2'] ?></td>
                  <td><?= $promedio ?></td>
                  <td><?= $alumno['asistencia'] ?>%</td>
                  <td><?= obtenerEstado($promedio, $alumno['asistencia']) ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </main>

<?php require_once 'footer.php'; ?>