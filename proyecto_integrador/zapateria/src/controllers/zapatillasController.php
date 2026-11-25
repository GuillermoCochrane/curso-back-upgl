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
      "marcas"    =>  cargarDatos(DB_MARCAS),
      "template"  =>  "crear_zapatilla",
      "scripts"   =>  "bootstrap",
      "form_path" =>  BASE_PATH. "/pages/zapatillas/crear/",
      "alerta"    =>  [
                        'type'    => $alerta,
                        'message' => $mensaje,
                      ],
      "datos"     =>  $datos,
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
    $datos_vista = datosCrearZapatilla($mensaje, $zapatilla, $alerta);
    $datos_vista['form_path'] = BASE_PATH . "/pages/zapatillas/editar/?id=" . $id;
    return $datos_vista;
  }

  function actualizarZapatilla(string $id): array {
    $mensaje = validarCreacionZapatillas($_POST);
    if ($mensaje !== "") {
      return datosEditarZapatilla($id, $mensaje, $_POST); 
    }

    actualizarEntrada((int)$id, $_POST, DB_ZAPATILLAS);
    header('Location: ' . BASE_PATH . '/pages/zapatillas/detalle?id=' . $id);
    exit;
  }