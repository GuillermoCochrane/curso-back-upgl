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
    if($promedio >= 7 && $asistencia >= 80){
      return "Promocionado";
    }
    elseif($promedio >= 4 && $asistencia >= 70){
      return "Rinde final";
    }
    else{
      return "Recursa";
    }
  }
?>