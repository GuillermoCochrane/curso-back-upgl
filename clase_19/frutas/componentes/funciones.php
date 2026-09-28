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
// Este array contiene una lista de frutas de prueba.
// Se usa ÚNICAMENTE la primera vez que se abre la aplicación,
// antes de que el archivo JSON exista en el disco.
$frutasIniciales = [
    ['id' => 1, 'nombre' => 'Manzana', 'icono' => '🍎', 'imagen' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?auto=format&fit=crop&w=200&q=80'],
    ['id' => 2, 'nombre' => 'Banana', 'icono' => '🍌', 'imagen' => 'https://images.unsplash.com/photo-1571771894821-ce9b6c11b08e?auto=format&fit=crop&w=200&q=80'],
    ['id' => 3, 'nombre' => 'Naranja', 'icono' => '🍊', 'imagen' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=200&q=80'],
];

// ==============================================================================
// FUNCIÓN: cargarFrutas
// ==============================================================================
// Lee las frutas desde el archivo JSON guardado en el disco.
//
// Parámetros:
//   - string $archivo: La ruta del archivo donde se guardan los datos (ej: datos/frutas.json).
//   - array $frutasIniciales: La lista por defecto por si el archivo todavía no fue creado.
//
// Retorno:
//   - array: Devuelve una lista (array) con las frutas cargadas.
function cargarFrutas(string $archivo, array $frutasIniciales): array
{
    // file_exists() revisa si el archivo JSON ya existe físicamente en el disco.
    // El signo '!' significa 'NO'. Por lo tanto: "Si NO existe el archivo..."
    if (!file_exists($archivo)) {
        // Guardamos las frutas iniciales para que el archivo se cree con datos de muestra.
        guardarFrutas($archivo, $frutasIniciales);
        // Devolvemos directamente las frutas iniciales.
        return $frutasIniciales;
    }

    // file_get_contents() lee todo el archivo y lo devuelve como una cadena de texto (string).
    $contenido = file_get_contents($archivo);

    // json_decode() convierte texto en formato JSON a datos que PHP pueda entender.
    // El 'true' como segundo parámetro le dice a PHP que lo transforme en un ARRAY ASOCIATIVO (clave => valor).
    // Si $contenido estuviera vacío o diera error, usamos el operador '?:' para pasar '[]' (array vacío en texto).
    $frutas = json_decode($contenido ?: '[]', true);

    // Operador ternario (condición ? verdadero : falso):
    // Verificamos con is_array() si lo que se obtuvo es un array válido.
    // Si es un array, devolvemos $frutas. Si el JSON estaba roto o corrupto, devolvemos un array vacío [].
    return is_array($frutas) ? $frutas : [];
}

// ==============================================================================
// FUNCIÓN: guardarFrutas
// ==============================================================================
// Guarda la lista de frutas actualizada dentro del archivo JSON.
//
// Parámetros:
//   - string $archivo: La ruta del archivo donde se guardarán los datos.
//   - array $frutas: La lista completa de frutas que queremos escribir en el archivo.
//
// Retorno:
//   - void: Significa que la función hace una acción pero NO devuelve ningún valor.
function guardarFrutas(string $archivo, array $frutas): void
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
    $json = json_encode($frutas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // file_put_contents() escribe el texto $json dentro del archivo físico.
    // LOCK_EX: Bloquea el archivo mientras escribe para que dos usuarios no guarden al mismo tiempo y lo rompan.
    // Si falló json_encode ($json === false) o falló file_put_contents (... === false)...
    if ($json === false || file_put_contents($archivo, $json, LOCK_EX) === false) {
        // Lanzamos una excepción (error controlado) para avisar qué ocurrió y detener la ejecución.
        throw new RuntimeException('No se pudieron guardar las frutas. Revisá los permisos de la carpeta datos.');
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
// FUNCIÓN: agregarFruta
// ==============================================================================
// Valida los datos recibidos, genera un nuevo ID autoincremental, agrega la nueva fruta
// a la lista y guarda los cambios en el archivo JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$frutas: Lista de frutas pasada POR REFERENCIA (nota el símbolo '&').
//     Esto significa que cualquier cambio en $frutas afectará a la variable original fuera de la función.
//   - string $nombre: Nombre de la fruta ingresado por el usuario.
//   - string $icono: Emoji o ícono que representa la fruta.
//   - string $imagen: URL de la imagen (opcional).
//
// Retorno:
//   - string: Mensaje de resultado (éxito o error).
function agregarFruta(string $archivo, array &$frutas, string $nombre, string $icono, string $imagen): string
{
    // Verificamos que los campos obligatorios no estén vacíos.
    if ($nombre === '' || $icono === '') {
        return 'Completá el nombre y el icono.';
    }

    // array_column() extrae todos los valores de la columna 'id' de cada fruta.
    // Ejemplo: si las frutas tienen id 1, 2, 3, nos devuelve [1, 2, 3].
    $ids = array_column($frutas, 'id');

    // Generamos un ID autoincremental:
    // Si no hay frutas ($ids === []), el primer ID será 1.
    // Si ya hay frutas, buscamos el ID más alto con max() y le sumamos 1.
    $nuevoId = $ids === [] ? 1 : max($ids) + 1;

    // Agregamos la nueva fruta al final del array con los corchetes vacíos [].
    $frutas[] = ['id' => $nuevoId, 'nombre' => $nombre, 'icono' => $icono, 'imagen' => $imagen];

    // Guardamos la lista actualizada en el archivo JSON.
    guardarFrutas($archivo, $frutas);

    return 'Fruta agregada.';
}

// ==============================================================================
// FUNCIÓN: modificarFruta
// ==============================================================================
// Busca una fruta existente por su ID, actualiza sus campos y guarda los cambios en el JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$frutas: Lista de frutas pasada POR REFERENCIA ('&') para actualizarla directamente.
//   - int $id: El ID numérico de la fruta que se quiere editar.
//   - string $nombre: El nuevo nombre.
//   - string $icono: El nuevo emoji o icono.
//   - string $imagen: La nueva URL de la imagen.
//
// Retorno:
//   - string: Mensaje de confirmación o advertencia.
function modificarFruta(string $archivo, array &$frutas, int $id, string $nombre, string $icono, string $imagen): string
{
    // Verificamos que los campos requeridos tengan contenido.
    if ($nombre === '' || $icono === '') {
        return 'Completá el nombre y el icono para modificar.';
    }

    // Recorremos cada fruta del array.
    // Usamos '&$fruta' (con '&') para que al modificar $fruta se modifique el elemento real en el array $frutas.
    foreach ($frutas as &$fruta) {
        // Comparamos si el ID coincide con el que estamos buscando.
        if ((int) $fruta['id'] === $id) {
            $fruta['nombre'] = $nombre;
            $fruta['icono'] = $icono;
            $fruta['imagen'] = $imagen;
            break; // Detenemos el bucle porque ya encontramos y actualizamos la fruta.
        }
    }
    // unset() destruye la referencia a la última variable del foreach.
    // Esto es una buena práctica en PHP para evitar modificar accidentalmente el último elemento más adelante.
    unset($fruta);

    // Guardamos la lista con las modificaciones en el archivo JSON.
    guardarFrutas($archivo, $frutas);

    return 'Fruta modificada.';
}

// ==============================================================================
// FUNCIÓN: eliminarFruta
// ==============================================================================
// Elimina una fruta de la lista según su ID y guarda los cambios en el archivo JSON.
//
// Parámetros:
//   - string $archivo: Ruta del archivo JSON.
//   - array &$frutas: Lista de frutas pasada POR REFERENCIA ('&').
//   - int $id: El ID de la fruta que se desea eliminar.
//
// Retorno:
//   - string: Mensaje avisando si se eliminó o si no se encontró.
function eliminarFruta(string $archivo, array &$frutas, int $id): string
{
    // Contamos cuántas frutas había antes de intentar eliminar.
    $cantidadAntes = count($frutas);

    // array_filter() recorre el array y deja solo los elementos donde la función devuelve 'true'.
    // En este caso: nos quedamos con todas las frutas cuyo ID sea DISTINTO al que queremos borrar.
    // 'use ($id)' le permite a la función anónima acceder a la variable $id que está afuera.
    // array_values() reordena los índices numéricos (0, 1, 2...) para que no queden huecos.
    $frutas = array_values(array_filter($frutas, function ($fruta) use ($id) {
        return (int) $fruta['id'] !== $id;
    }));

    // Guardamos la nueva lista en el archivo JSON.
    guardarFrutas($archivo, $frutas);

    // Comparamos si la cantidad actual es menor a la anterior para saber si realmente se borró.
    return count($frutas) < $cantidadAntes ? 'Fruta eliminada.' : 'No se encontró esa fruta.';
}

// ==============================================================================
// FUNCIÓN: buscarFrutaPorId
// ==============================================================================
// Busca una fruta dentro de la lista comparando su ID.
//
// Parámetros:
//   - array $frutas: La lista completa de frutas.
//   - int $id: El ID numérico que queremos buscar (por ejemplo, el que viene de ?editar=2).
//
// Retorno:
//   - array|null: Retorna el array de la fruta si la encuentra, o 'null' si no existe.
//     El signo '?array' indica que puede devolver un array o null.
function buscarFrutaPorId(array $frutas, int $id): ?array
{
    // Si el ID es menor o igual a 0, no hay nada que buscar.
    if ($id <= 0) {
        return null;
    }

    // Recorremos la lista fruta por fruta.
    foreach ($frutas as $fruta) {
        // Si encontramos la fruta con el ID indicado...
        if ((int) $fruta['id'] === $id) {
            // La devolvemos inmediatamente y cortamos la ejecución de la función.
            return $fruta;
        }
    }

    // Si terminó el bucle y no encontró ninguna coincidencia, devuelve null.
    return null;
}

// ==============================================================================
// FUNCIÓN: filtrarFrutas
// ==============================================================================
// Filtra las frutas según el texto de búsqueda ingresado por el usuario en la URL (?buscar=...).
//
// Parámetros:
//   - array $frutas: Lista de todas las frutas.
//   - string $busqueda: Texto a buscar (ej: "manzana").
//
// Retorno:
//   - array: Lista con las frutas que coinciden con la búsqueda.
function filtrarFrutas(array $frutas, string $busqueda): array
{
    // Si no se escribió nada en la búsqueda, devolvemos todas las frutas sin filtrar.
    if ($busqueda === '') {
        return $frutas;
    }

    // array_filter() deja solo los elementos donde la función anónima devuelve true.
    // stripos() busca el texto sin importar si está en mayúsculas o minúsculas.
    return array_values(array_filter($frutas, function ($fruta) use ($busqueda) {
        return stripos($fruta['nombre'], $busqueda) !== false;
    }));
}

// ==============================================================================
// FUNCIÓN: obtenerResumenFrutas
// ==============================================================================
// Transforma el array de frutas usando array_map() para generar un resumen con formato:
// "🍎 Manzana", "🍌 Banana", etc.
//
// Parámetros:
//   - array $frutas: Lista completa de frutas.
//
// Retorno:
//   - array: Un array simple de textos (strings) con el icono y nombre combinados.
function obtenerResumenFrutas(array $frutas): array
{
    // array_map() aplica la función a cada elemento y devuelve un array con los resultados transformados.
    return array_map(function ($fruta) {
        return $fruta['icono'] . ' ' . $fruta['nombre'];
    }, $frutas);
}

// ==============================================================================
// FUNCIÓN / COMPONENTE: renderizarCardFruta
// ==============================================================================
// Componente reutilizable que recibe los datos de una fruta e imprime su tarjeta HTML.
// Al encapsularlo en una función, podemos reutilizarlo en cualquier lugar pasando los datos como parámetro:
// renderizarCardFruta($fruta);
//
// Parámetros:
//   - array $fruta: Array asociativo con los datos (id, nombre, icono, imagen).
//
// Retorno:
//   - void: Imprime directamente la plantilla HTML del componente.
function renderizarCardFruta(array $fruta): void
{
    // Cargamos la plantilla HTML del componente; las variables del ámbito actual (como $fruta)
    // estarán disponibles directamente dentro de card-fruta.php.
    include __DIR__ . '/card-fruta.php';
}
