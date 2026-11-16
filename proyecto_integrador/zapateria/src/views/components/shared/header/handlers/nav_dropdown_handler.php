<?php
  function render_nav_dropdown_items(array $dropdown_items = []): void {
      foreach ($dropdown_items ?? [] as $dropdown_item) {
        $template_path = __DIR__."/../../../../partials/nav/nav_dropdown_item";
        render($template_path, $dropdown_item);
      }
  }
