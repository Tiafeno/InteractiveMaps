<?php
namespace interactiveMaps\Entity\Model;
final class MapsModel {
  public function __construct() {}
    
  public static function install()
  {
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}maps_geojson"
    ."(id_geojson INT AUTO_INCREMENT PRIMARY KEY, "
    ."post_id INT NOT NULL, "
    ."__geojson_title VARCHAR(50) NOT NULL, "
    ."__geojson_lat DOUBLE NOT NULL, "
    ."__geojson_lng DOUBLE NOT NULL, "
    ."__geojson_zoom INT NOT NULL, "
    ."__geojson_content LONGTEXT NULL, "
    ."__geojson_slug VARCHAR(45) NULL DEFAULT NULL "
    .");");
    
    $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}maps_markers"
    ."(id_marker INT AUTO_INCREMENT PRIMARY KEY, "
    ."post_id INT NOT NULL, "
    ."__marker_project_id INT NULL, "
    ."__marker_title VARCHAR(50) NOT NULL, "
    ."__marker_lat DOUBLE NOT NULL, "
    ."__marker_lng DOUBLE NOT NULL, "
    ."__marker_description LONGTEXT NULL, "
    ."__marker_slug VARCHAR(45) NULL DEFAULT NULL "
    .");");
    
    // add categories
    $param = array();
    $param[] = array('cat_name' => 'Madagascar','category_nicename' => 'madagascar', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Burkina Faso', 'category_nicename' => "burkina_faso", 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Sénégal', 'category_nicename' => 'senegal', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Kenya', 'category_nicename' => 'kenya', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Nicaragua', 'category_nicename' => 'nicaragua', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Gambodge', 'category_nicename' => 'gambodge', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Népal', 'category_nicename' => 'nepal', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Cameroun', 'category_nicename' => 'cameroun', 'taxonomy' => 'product_cat');
    $param[] = array('cat_name' => 'Haïti', 'category_nicename' => 'haiti', 'taxonomy' => 'product_cat');
    
    foreach ($param as $m) {
      $t = \term_exists($m['category_nicename'], 'product_cat');
      if(is_null($t)){
        \wp_insert_category($m);
      }
    }
  }
  
  public static function uninstall()
  {
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}maps_geojson;");
    $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}maps_markers;");
  }
  
}
  