<?php
namespace interactiveMaps;
/*
Plugin Name: Interactive WP Maps
Plugin URI: https://github.com/Tiafeno/InteractiveMaps.git
Description: Module Wordpress pour une carte interactive Google.
Version: 2.0
Author: Tiafeno Finel - FaliCrea
Author URI: http://www.falicrea.com
License: A "Slug" license name e.g. GPL2
*/

$configs = [
  'debug' => true,
  'project' => ['slug' => 'project', 'name' => 'Project']
];
include_once plugin_dir_path(__FILE__) . '/autoload.php';
include_once plugin_dir_path(__FILE__) . '/Entity/Model/MapsModel.php';
include_once plugin_dir_path(__FILE__) . '/shortcode.php';
include_once plugin_dir_path(__FILE__) . '/src/Controller/MapsController.php';
include_once plugin_dir_path(__FILE__) . '/src/Controller/ModuleController.php';
include_once plugin_dir_path(__FILE__) . '/interactiveMaps.php';

use interactiveMaps\plugins;
new plugins\interactiveMapsModule();
