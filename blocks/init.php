<?php

function blocks_init() {
  wp_register_style('blocks', load_assets('editor', 'css'), ['wp-edit-blocks'], null);

  wp_register_script('blocks-editor', load_assets('editor', 'js'), ['wp-blocks', 'wp-element', 'wp-editor', 'wp-dom-ready', 'wp-edit-post'], null );
}

add_action('init', 'blocks_init');

?>