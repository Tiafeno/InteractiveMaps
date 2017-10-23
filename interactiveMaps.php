<?php
namespace interactiveMaps\plugins;
final class interactiveMapsModule {
  public function __construct() 
  {
    \add_action('init', array(&$this, 'Initialize'));
    \register_activation_hook(\plugin_dir_path( __FILE__ ) . 'init.php', array('MapsModel', 'install'));
    \register_uninstall_hook(\plugin_dir_path( __FILE__ ) . 'init.php', array('MapsModel', 'uninstall'));
  }

  public function Initialize() 
  {
    global $configs;
    \register_post_type('maps', array(
      'label' => _x('Maps Editor', 'General name for "Ad" post type'),
      'labels' => array(
        'name' => _x('Maps Editor', 'Plural name for "Maps Editor" post type'),
        'singular_name' => _x('Drawing', 'Singular name for "Maps Editor" post type'),
        'add_new' => __('Add Draw'),
        'add_new_item' => __('Add New Draw'),
        'edit_item' => __('Edit Draw'),
        'view_item' => __('View Draw'),
        'search_items' => __('Search Maps Draw'),
        'not_found' => __('No Maps Draw found'),
        'not_found_in_trash' => __('No Maps Editor found in trash')
      ),
      'public' => true,
      'hierarchical' => false,
      'menu_position' => 20,
      'menu_icon' => 'dashicons-location-alt',
      'supports' => array('title', 'excerpt')
      )
    );
    
    \register_post_type($configs[ 'project' ][ 'slug' ], array(
      'label' => _x($configs[ 'project' ][ 'name' ], 'General name for "Project" post type'),
      'labels' => array(
        'name' => _x($configs[ 'project' ][ 'name' ], 'Plural name for "Projet" post type'),
        'singular_name' => _x('Projet', 'Singular name for "Projet" post type'),
        'add_new' => __('Ajouter'),
        'add_new_item' => __('Ajouter un nouveau Projet'),
        'edit_item' => __('Modifier le Projet'),
        'view_item' => __('Afficher le Projet'),
        'search_items' => __('Rechercher un Project'),
        'not_found' => __('Aucun Projet'),
        'not_found_in_trash' => __('Aucun projet dans la corbeille')
      ),
      'public' => true,
      'hierarchical' => false,
      'menu_position' => 21,
      'menu_icon' => 'dashicons-pressthis',
      'rewrite' => array( 'slug' => $configs[ 'project' ][ 'slug' ] ),
      'capability_type'    => 'post',
      'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
      )
    );
    
    \register_taxonomy(
      'state',
      'project',
      array(
        'label' => __( 'State' ),
        'rewrite' => array( 'slug' => 'disctrict' ),
        'hierarchical' => true,
        'show_ui' => true
        )
      );
  }
}