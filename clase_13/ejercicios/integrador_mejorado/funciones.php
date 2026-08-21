<?php
  /*  
    ⚙️ *2. Crear las funciones*

    En `funciones.php` deberán crear:

    🔹 `calcularPromedio($nota1, $nota2)`
    Debe calcular el promedio de las dos notas y devolverlo utilizando `return`.
    
    🔹 `obtenerEstado($promedio, $asistencia)`
    Debe devolver:
    
    🟢 *"Promocionado"* → promedio mayor o igual a 7 *Y* asistencia mayor o igual a 80%.
    🟡 *"Rinde final"* → promedio mayor o igual a 4 *Y* asistencia mayor o igual a 70%.
    🔴 *"Recursa"* → en cualquier otro caso.
  */

  function calcularPromedio($nota1, $nota2){
    $promedio = ($nota1 + $nota2) / 2;
    return $promedio;
  }

  function obtenerEstado($promedio, $asistencia){
    $estado = "";
    if($promedio >= 7 && $asistencia >= 80){
      $estado = "Promocionado";
    }
    elseif($promedio >= 4 && $asistencia >= 70){
      $estado = "Rinde final";
    }
    else{
      $estado = "Recursa";
    }
    return $estado;
  }

  function estiloAsistencia($asistencia){
    $estilos = "";
    if($asistencia >= 80){
      $estilos = "bg-success text-white";
    }
    elseif($asistencia >= 70){
      $estilos = "bg-warning text-dark";
    }
    else{
      $estilos = "bg-danger text-white";
    }
    return $estilos;
  }

  function estiloPromedio($promedio){
    $estilos = "";
    if($promedio >= 7){
      $estilos = "bg-success text-white";
    }
    elseif($promedio >= 4){
      $estilos = "bg-warning text-dark";
    }
    else{
      $estilos = "bg-danger text-white";
    }
    return $estilos;
  }

  $estilosEstados = [
    "Promocionado" => "bg-success text-white",
    "Rinde final" => "bg-warning text-dark",
    "Recursa" => "bg-danger text-white"
  ];

  $icon = "icon.png";
  $title = "Estado Académico";
?>