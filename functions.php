<?php

include_once('blocks/init.php');

function load_asset( string $assetPath ) {
  if ($assetPath[0] !== '/') {
    $assetPath = '/'.$assetPath;
  }
  return get_stylesheet_directory_uri().'/build'.$assetPath;
}

function load_assets( string $entry, string $type ) {
  $manifest = file_get_contents( __DIR__ . '/build/webpack-manifest.json' );
  $manifest = json_decode( $manifest, true );
  if (isset($manifest[$entry]) && isset($manifest[$entry][$type])) {
    return load_asset($manifest[$entry][$type]);
  } else {
    return load_asset($entry.".".$type);
  }
}

function bendev_theme_support() {
  add_theme_support( 'post-thumbnails' );
  add_post_type_support( 'page', 'excerpt' );
  add_theme_support( 'responsive-embeds' );
}

add_action( 'init', 'bendev_theme_support' );

function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
?>