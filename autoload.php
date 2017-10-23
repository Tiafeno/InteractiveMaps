<?php
namespace interactiveMaps\loader;
use interactiveMaps;

$TWIG = null;
\add_action('plugins_loaded', function () {
  global $loader, $configs, $TWIG;
  if (!$loader instanceof Twig_Loader_Filesystem) return;
  if (!defined('MAPS_TWIG_ENGINE_PATH')) {
    define('MAPS_TWIG_ENGINE_PATH', \plugin_dir_path(__FILE__) . '/Engine/Twig');
  }
  
  /* $loader = new Twig_Loader_Filesystem(); */
  $loader->addPath(MAPS_TWIG_ENGINE_PATH . '/templates/front', 'frontmaps');
  $loader->addPath(MAPS_TWIG_ENGINE_PATH . '/templates/admin', 'adminmaps');
  
  $TWIG = new \Twig_Environment($loader, array(
    'debug' => $configs[ 'debug' ],
    'cache' => MAPS_TWIG_ENGINE_PATH . '/template_cache'
  ));
});