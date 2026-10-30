<?php

// ==============================================================================
// MODO ESTRICTO DE TIPOS
// ==============================================================================
// Activa el modo estricto de tipos en PHP para este archivo.
// Obliga a que los datos enviados a las funciones y los devueltos coincidan
// exactamente con el tipo definido (por ejemplo: int, string, array, etc.).
declare(strict_types=1);

// Verificamos si existe la variable con la ruta de la carpeta y si la carpeta física NO existe (!is_dir).
// Si no existe, usamos mkdir() para crear la carpeta automáticamente con permisos de lectura y escritura.
if (isset($carpetaDatos) && !is_dir($carpetaDatos)) {
    mkdir($carpetaDatos, 0775, true);
}

// ==============================================================================
// DATOS INICIALES (SEMILLA / SEED)
// ==============================================================================
// Este array contiene una lista de zapatillas de prueba.
// Se usa ÚNICAMENTE la primera vez que se abre la aplicación,
// antes de que el archivo JSON exista en el disco.
$zapatillasIniciales = [
    ['id' => 1, 'nombre' => 'Manzana', 'icono' => '🍎', 'imagen' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=200&q=80'],
    ['id' => 2, 'nombre' => 'Banana', 'icono' => '🍌', 'imagen' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=200&q=80'],
    ['id' => 3, 'nombre' => 'Naranja', 'icono' => '🍊', 'imagen' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=200&q=80'],
];

// ==============================================================================
// FUNCIÓN: cargarzapatillas
// ==============================================================================
// Lee las zapatillas desde el archivo JSON guardado en el disco.
//
// Parámetros:
//   - string $archivo: La ruta del archivo donde se guardan los datos (ej: datos/zapatillas.json).
//   - array $zapatillasIniciales: La lista por defecto por si el archivo todavía no fue creado.
//
// Retorno:
//   - array: Devuelve una lista (array) con las zapatillas cargadas.
function cargarzapatillas(string $archivo, array $zapatillasIniciales): array
{
    // file_exists() revisa si el archivo JSON ya existe físicamente en el disco.
    // El signo '!' significa 'NO'. Por lo tanto: "Si NO existe el archivo..."
    if (!file_exists($archivo)) {
        // Guardamos las zapatillas iniciales para que el archivo se cree con datos de muestra.
        guardarzapatillas($archivo, $zapatillasIniciales);
        // Devolvemos directamente las zapatillas iniciales.
        return $zapatillasIniciales;
    }

    // file_get_contents() lee todo el archivo y lo devuelve como una cadena de texto (string).
    $contenido = file_get_contents($archivo);

    // json_decode() convierte texto en formato JSON a datos que PHP pueda entender.
    // El 'true' como segundo parámetro le dice a PHP que lo transforme en un ARRAY ASOCIATIVO (clave => valor).
    // Si $contenido estuviera vacío o diera error, usamos el operador '?:' para pasar '[]' (array vacío en texto).
    $zapatillas = json_decode($contenido ?: '[]', true);

    // Operador ternario (condición ? verdadero : falso):
    // Verificamos con is_array() si lo que se obtuvo es un array válido.
    // Si es un array, devolvemos $zapatillas. Si el JSON estaba roto o corrupto, devolvemos un array vacío [].
    return is_array($zapatillas) ? $zapatillas : [];
}

// ==============================================================================
// FUNCIÓN: guardarzapatillas
// ==============================================================================
// Guarda la lista de zapatillas actualizada dentro del archivo JSON.
//
// Parámetros:
//   - string $archivo: La ruta del archivo donde se guardarán los datos.
//   - array $zapatillas: La lista completa de zapatillas que queremos escribir en el archivo.
//
// Retorno:
//   - void: Significa que la función hace una acción pero NO devuelve ningún valor.
function guardarzapatillas(string $archivo, array $zapatillas): void
{
    // Obtenemos el nombre de la carpeta contenedora (por ejemplo: 'datos').
    $carpeta = dirname($archivo);

    // Si la carpeta todavía no existe en el disco, la creamos con permisos de lectura/escritura (0775).
    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0775, true);
    }

    // json_encode() convierte un array de PHP a formato texto JSON.
    // Opciones especiales:
    //   - JSON_PRETTY_PRINT: Ordena el texto con sangrías y saltos de línea para que sea fácil de leer por humanos.
    //   - JSON_UNESCAPED_UNICODE: Permite guardar tildes y emojis (🍎, 🍌, 🍊) tal cual son, sin cambiarlos por códigos raros.
    $json = json_encode($zapatillas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // file_put_contents() escribe el texto $json dentro del archivo físico.
    // LOCK_EX: Bloquea el archivo mientras escribe para que dos usuarios no guarden al mismo tiempo y lo rompan.
    // Si falló json_encode ($json === false) o falló file_put_contents (... === false)...
    if ($json === false || file_put_contents($archivo, $json, LOCK_EX) === false) {
        // Lanzamos una excepción (error controlado) para avisar qué ocurrió y detener la ejecución.
        throw new RuntimeException('No se pudieron guardar las zapatillas. Revisá los permisos de la carpeta datos.');
    }
}

// ==============================================================================
// FUNCIÓN: escapar
// ==============================================================================
// Función de seguridad esencial contra ataques XSS (Cross-Site Scripting).
// Limpia cualquier texto ingresado por el usuario antes de mostrarlo en pantalla.
//
// ¿Por qué es importante?
// Si un usuario escribe código malicioso como: <script>alert("hackeado")</script>
// htmlspecialchars lo convierte en: &lt;script&gt;alert(&quot;hackeado&quot;)&lt;/script&gt;
// El navegador lo mostrará como texto plano inofensivo y NO ejecutará el script.
//
// Parámetros:
//   - string $texto: El texto que el usuario ingresó en un formulario.
//
// Retorno:
//   - string: El texto sanitizado y seguro para imprimir en el HTML.
function escapar(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

// ==============================================================================
// FUNCIÓN: agregarzapatilla
// ==============================================================================
// Valida los datos recibidos, genera un nuevo ID autoincremental, agrega la nueva zapatilla
// a la lista y guarda los cambios en el archivo JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$zapatillas: Lista de zapatillas pasada POR REFERENCIA (nota el símbolo '&').
//     Esto significa que cualquier cambio en $zapatillas afectará a la variable original fuera de la función.
//   - string $nombre: Nombre de la zapatilla ingresado por el usuario.
//   - string $icono: Emoji o ícono que representa la zapatilla.
//   - string $imagen: URL de la imagen (opcional).
//
// Retorno:
//   - string: Mensaje de resultado (éxito o error).
function agregarzapatilla(string $archivo, array &$zapatillas, string $nombre, string $icono, string $imagen): string
{
    // Verificamos que los campos obligatorios no estén vacíos.
    if ($nombre === '' || $icono === '') {
        return 'Completá el nombre y el icono.';
    }

    // array_column() extrae todos los valores de la columna 'id' de cada zapatilla.
    // Ejemplo: si las zapatillas tienen id 1, 2, 3, nos devuelve [1, 2, 3].
    $ids = array_column($zapatillas, 'id');

    // Generamos un ID autoincremental:
    // Si no hay zapatillas ($ids === []), el primer ID será 1.
    // Si ya hay zapatillas, buscamos el ID más alto con max() y le sumamos 1.
    $nuevoId = $ids === [] ? 1 : max($ids) + 1;

    // Agregamos la nueva zapatilla al final del array con los corchetes vacíos [].
    $zapatillas[] = ['id' => $nuevoId, 'nombre' => $nombre, 'icono' => $icono, 'imagen' => $imagen];

    // Guardamos la lista actualizada en el archivo JSON.
    guardarzapatillas($archivo, $zapatillas);

    return 'zapatilla agregada.';
}

// ==============================================================================
// FUNCIÓN: modificarzapatilla
// ==============================================================================
// Busca una zapatilla existente por su ID, actualiza sus campos y guarda los cambios en el JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$zapatillas: Lista de zapatillas pasada POR REFERENCIA ('&') para actualizarla directamente.
//   - int $id: El ID numérico de la zapatilla que se quiere editar.
//   - string $nombre: El nuevo nombre.
//   - string $icono: El nuevo emoji o icono.
//   - string $imagen: La nueva URL de la imagen.
//
// Retorno:
//   - string: Mensaje de confirmación o advertencia.
function modificarzapatilla(string $archivo, array &$zapatillas, int $id, string $nombre, string $icono, string $imagen): string
{
    // Verificamos que los campos requeridos tengan contenido.
    if ($nombre === '' || $icono === '') {
        return 'Completá el nombre y el icono para modificar.';
    }

    // Recorremos cada zapatilla del array.
    // Usamos '&$zapatilla' (con '&') para que al modificar $zapatilla se modifique el elemento real en el array $zapatillas.
    foreach ($zapatillas as &$zapatilla) {
        // Comparamos si el ID coincide con el que estamos buscando.
        if ((int) $zapatilla['id'] === $id) {
            $zapatilla['nombre'] = $nombre;
            $zapatilla['icono'] = $icono;
            $zapatilla['imagen'] = $imagen;
            break; // Detenemos el bucle porque ya encontramos y actualizamos la zapatilla.
        }
    }
    // unset() destruye la referencia a la última variable del foreach.
    // Esto es una buena práctica en PHP para evitar modificar accidentalmente el último elemento más adelante.
    unset($zapatilla);

    // Guardamos la lista con las modificaciones en el archivo JSON.
    guardarzapatillas($archivo, $zapatillas);

    return 'zapatilla modificada.';
}

// ==============================================================================
// FUNCIÓN: eliminarzapatilla
// ==============================================================================
// Elimina una zapatilla de la lista según su ID y guarda los cambios en el archivo JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$zapatillas: Lista de zapatillas pasada POR REFERENCIA ('&').
//   - int $id: El ID de la zapatilla que se desea eliminar.
//
// Retorno:
//   - string: Mensaje avisando si se eliminó o si no se encontró.
function eliminarzapatilla(string $archivo, array &$zapatillas, int $id): string
{
    // Contamos cuántas zapatillas había antes de intentar eliminar.
    $cantidadAntes = count($zapatillas);

    // array_filter() recorre el array y deja solo los elementos donde la función devuelve 'true'.
    // En este caso: nos quedamos con todas las zapatillas cuyo ID sea DISTINTO al que queremos borrar.
    // 'use ($id)' le permite a la función anónima acceder a la variable $id que está afuera.
    // array_values() reordena los índices numéricos (0, 1, 2...) para que no queden huecos.
    $zapatillas = array_values(array_filter($zapatillas, function ($zapatilla) use ($id) {
        return (int) $zapatilla['id'] !== $id;
    }));

    // Guardamos la nueva lista en el archivo JSON.
    guardarzapatillas($archivo, $zapatillas);

    // Comparamos si la cantidad actual es menor a la anterior para saber si realmente se borró.
    return count($zapatillas) < $cantidadAntes ? 'zapatilla eliminada.' : 'No se encontró esa zapatilla.';
}

// ==============================================================================
// FUNCIÓN: buscarzapatillaPorId
// ==============================================================================
// Busca una zapatilla dentro de la lista comparando su ID.
//
// Parámetros:
//   - array $zapatillas: La lista completa de zapatillas.
//   - int $id: El ID numérico que queremos buscar (por ejemplo, el que viene de ?editar=2).
//
// Retorno:
//   - array|null: Retorna el array de la zapatilla si la encuentra, o 'null' si no existe.
//     El signo '?array' indica que puede devolver un array o null.
function buscarzapatillaPorId(array $zapatillas, int $id): ?array
{
    // Si el ID es menor o igual a 0, no hay nada que buscar.
    if ($id <= 0) {
        return null;
    }

    // Recorremos la lista zapatilla por zapatilla.
    foreach ($zapatillas as $zapatilla) {
        // Si encontramos la zapatilla con el ID indicado...
        if ((int) $zapatilla['id'] === $id) {
            // La devolvemos inmediatamente y cortamos la ejecución de la función.
            return $zapatilla;
        }
    }

    // Si terminó el bucle y no encontró ninguna coincidencia, devuelve null.
    return null;
}

// ==============================================================================
// FUNCIÓN: filtrarzapatillas
// ==============================================================================
// Filtra las zapatillas según el texto de búsqueda ingresado por el usuario en la URL (?buscar=...).
//
// Parámetros:
//   - array $zapatillas: Lista de todas las zapatillas.
//   - string $busqueda: Texto a buscar (ej: "manzana").
//
// Retorno:
//   - array: Lista con las zapatillas que coinciden con la búsqueda.
function filtrarzapatillas(array $zapatillas, string $busqueda): array
{
    // Si no se escribió nada en la búsqueda, devolvemos todas las zapatillas sin filtrar.
    if ($busqueda === '') {
        return $zapatillas;
    }

    // array_filter() deja solo los elementos donde la función anónima devuelve true.
    // stripos() busca el texto sin importar si está en mayúsculas o minúsculas.
    return array_values(array_filter($zapatillas, function ($zapatilla) use ($busqueda) {
        return stripos($zapatilla['nombre'], $busqueda) !== false;
    }));
}

// ==============================================================================
// FUNCIÓN: obtenerResumenzapatillas
// ==============================================================================
// Transforma el array de zapatillas usando array_map() para generar un resumen con formato:
// "🍎 Manzana", "🍌 Banana", etc.
//
// Parámetros:
//   - array $zapatillas: Lista completa de zapatillas.
//
// Retorno:
//   - array: Un array simple de textos (strings) con el icono y nombre combinados.
function obtenerResumenzapatillas(array $zapatillas): array
{
    // array_map() aplica la función a cada elemento y devuelve un array con los resultados transformados.
    return array_map(function ($zapatilla) {
        return $zapatilla['icono'] . ' ' . $zapatilla['nombre'];
    }, $zapatillas);
}

// ==============================================================================
// FUNCIÓN / COMPONENTE: renderizarCardzapatilla
// ==============================================================================
// Componente reutilizable que recibe los datos de una zapatilla e imprime su tarjeta HTML.
// Al encapsularlo en una función, podemos reutilizarlo en cualquier lugar pasando los datos como parámetro:
// renderizarCardzapatilla($zapatilla);
//
// Parámetros:
//   - array $zapatilla: Array asociativo con los datos (id, nombre, icono, imagen).
//
// Retorno:
//   - void: Imprime directamente la plantilla HTML del componente.
function renderizarCardzapatilla(array $zapatilla): void
{
    // Cargamos la plantilla HTML del componente; las variables del ámbito actual (como $zapatilla)
    // estarán disponibles directamente dentro de card-zapatilla.php.
    include __DIR__ . '/card-zapatilla.php';
}
