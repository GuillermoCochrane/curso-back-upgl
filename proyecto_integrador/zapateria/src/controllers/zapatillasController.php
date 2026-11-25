<?php
  declare(strict_types=1);

  require_once __DIR__ . "/../services/CRUDServices.php";
  require_once __DIR__ . "/../services/SanitizationServices.php";
  require_once __DIR__ . "/../services/ValidationServices.php";

  function datosZapatillas(): array {
    return [
      "zapatillas" => cargarDatos(DB_ZAPATILLAS),
      "marcas"     => cargarDatos(DB_MARCAS),
      "template"   => "zapatillas",
      "scripts"    => "zapatillas"
    ];
  }

  function datosZapatilla(string $id): array {
    $zapatillas = cargarDatos(DB_ZAPATILLAS);
    $zapatilla = buscarPorId($zapatillas, (int)$id);

    return [
      "zapatilla" =>  $zapatilla,
      "marcas"    =>  cargarDatos(DB_MARCAS),
      "template"  =>  "detalle_zapatilla",
      "scripts"   =>  "zapatillas",
      "alerta"    =>  [
                        'type'    => "warning",
                        'message' => empty($zapatilla) ? "Zapatilla no encontrada" : "",
                      ],
    ];
  }

  function datosCrearZapatilla(string $mensaje = "", array $datos = [], string $alerta = "danger"): array {
    return [
      "marcas"        =>  cargarDatos(DB_MARCAS),
      "template"      =>  "crear_zapatilla",
      "scripts"       =>  "bootstrap",
      "form_path"     =>  BASE_PATH. "/pages/zapatillas/crear/",
      "alerta"        =>  [
                            'type'    => $alerta,
                            'message' => $mensaje,
                          ],
      "datos"         =>  $datos,
      "titulo"        =>  "Agregar Zapatilla",
      "handler_path"  => "/../../zapatillas/handlers/zapatillas_form_handler.php",
      "submit_text"   => "Guardar Zapatilla",
      "cancel_url"    => BASE_PATH . "/pages/zapatillas",
      "submit_class"  => "btn-primary"
    ];
  }

  function crearZapatilla(): array {
    $mensaje = validarCreacionZapatillas($_POST);
    if ($mensaje !== ""){
      return datosCrearZapatilla($mensaje, $_POST);
    }
    $datos = sanitizarZapatilla($_POST);
    $nuevoId = agregarEntrada($datos, 'zapatillas', DB_ZAPATILLAS);
    header('Location: ' . BASE_PATH . '/pages/zapatillas/detalle?id=' . $nuevoId);
    exit;
  }

  function datosEditarZapatilla(string $id, string $mensaje = "", array $datos = []): array {
    if (empty($datos)) {
      $zapatillas = cargarDatos(DB_ZAPATILLAS);
      $zapatilla = buscarPorId($zapatillas, (int)$id);
      $mensaje = empty($zapatilla) ? "Zapatilla no encontrada" : "";
    } else {
        $zapatilla = $datos; 
        $zapatilla['id'] = $id; 
    }

    $alerta = !empty($mensaje) ? "danger" : "warning";
    $datos_vista                  = datosCrearZapatilla($mensaje, $zapatilla, $alerta);
    $datos_vista['form_path']     = BASE_PATH . "/pages/zapatillas/editar/?id=" . $id;
    $datos_vista['submit_text']   = "Editar Zapatilla";
    $datos_vista['cancel_url']    = BASE_PATH . "/pages/zapatillas/detalle?id=" . $id; 
    $datos_vista['titulo']        = "Editar Zapatilla: " . ($zapatilla['nombre'] ?? '');
    $datos_vista["handler_path"]  = "/../../zapatillas/handlers/zapatillas_form_handler.php";
    $datos_vista["submit_class"]  = "btn-warning";
    return $datos_vista;
  }

  function actualizarZapatilla(string $id): array {
    $mensaje = validarCreacionZapatillas($_POST);
    if ($mensaje !== "") {
      return datosEditarZapatilla($id, $mensaje, $_POST); 
    }
    $datosLimpios = sanitizarZapatilla($_POST);
    actualizarEntrada((int)$id, $datosLimpios, DB_ZAPATILLAS);
    header('Location: ' . BASE_PATH . '/pages/zapatillas/detalle?id=' . $id);
    exit;
  }