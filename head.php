<!DOCTYPE html>
<html <?php language_attributes() ?>>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <?php
      wp_register_script('bendev-bundle', load_assets('bundle', 'js'), [], null);
      wp_enqueue_script('bendev-bundle');

      wp_register_style('bendev-style', load_assets('index', 'css'), [], null);
      wp_enqueue_style('bendev-style');
    ?>
    <?php wp_head() ?>
  </head>