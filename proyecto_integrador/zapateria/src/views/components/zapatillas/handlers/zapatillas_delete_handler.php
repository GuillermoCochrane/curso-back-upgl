<?php
  $campos = [
      "type"          => "buttons",
      "submit_class"  => $submit_class ?? "", 
      "submit_text"   => $submit_text ?? "", 
      "cancel_url"    => $cancel_url ?? "",
  ];
  
  function render_form(array $campos = []): void {
    $template_path =  __DIR__ ."/../../../partials/form/buttons";
    render($template_path, $campos);
  }