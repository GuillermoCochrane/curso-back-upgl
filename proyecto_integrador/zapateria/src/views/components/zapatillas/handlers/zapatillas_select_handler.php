<?php
  function render_options(array $options = [], $value = null): void {
    foreach ($options ?? [] as $option) {
      $option['value'] = $value;
      $template_path = __DIR__ . "/../../../partials/form/option";
      render($template_path, $option);
    }
  }
