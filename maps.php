<?php

/*
  Plugin Name: FALI. Maps
  Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
  Description: A brief description of the Plugin.
  Version: 1.2
  Author: Tiafeno
  Author URI: http://tiafenofinel.falicrea.com
  License: A "Slug" license name e.g. GPL2
 */

include_once plugin_dir_path(__FILE__) . '/Entity/Model/MapsModel.php';
include_once plugin_dir_path(__FILE__) . '/Shortcode.php';
include_once plugin_dir_path(__FILE__) . '/src/Controller/MapsController.php';

$TWIG = null;

add_action('plugins_loaded', function () {
    global $loader, $TWIG;
    if (!$loader instanceof Twig_Loader_Filesystem) {
        return;
    }

    if (!defined('MAPS_TWIG_ENGINE_PATH')) {
        define('MAPS_TWIG_ENGINE_PATH', plugin_dir_path(__FILE__) . '/Engine/Twig');
    }

    //$loader = new Twig_Loader_Filesystem();
    $loader->addPath(MAPS_TWIG_ENGINE_PATH . '/templates/front', 'frontmaps');
    $loader->addPath(MAPS_TWIG_ENGINE_PATH . '/templates/admin', 'adminmaps');

    $TWIG = new Twig_Environment($loader, array(
        'debug' => true,
        'cache' => MAPS_TWIG_ENGINE_PATH . '/template_cache'
    ));
});

class Atomisy_Plugins
{

    public function __construct()
    {
        add_action('init', array($this, '__init__'));

        add_action('wp_ajax_action_get_products', array($this, 'action_get_products'));
        add_action('wp_ajax_nopriv_action_get_products', array($this, 'action_get_products'));

        add_action('wp_ajax_action_get_markers', array($this, 'action_get_markers'));
        add_action('wp_ajax_nopriv_action_get_markers', array($this, 'action_get_markers'));

        // get Markers by state
        add_action('wp_ajax_action_get_markers_by_states', array($this, 'action_get_markers_by_states'));
        add_action('wp_ajax_nopriv_action_get_markers_by_states', array($this, 'action_get_markers_by_states'));

        add_action('wp_ajax_action_get_terms_product_cat', array($this, 'action_get_terms_product_cat'));
        add_action('wp_ajax_nopriv_action_get_terms_product_cat', array($this, 'action_get_terms_product_cat'));

        add_action('wp_ajax_action_getProjectbyArray', array($this, 'action_getProjectbyArray'));
        add_action('wp_ajax_nopriv_action_getProjectbyArray', array($this, 'action_getProjectbyArray'));

        add_action('wp_ajax_action_add_marker', array($this, 'action_add_marker'));
        add_action('wp_ajax_nopriv_action_add_marker', array($this, 'action_add_marker'));

        if (is_admin()) {
            add_action('wp_ajax_action_get_projects', array($this, 'action_get_projects'));
            add_action('wp_ajax_action_add_geojson', array($this, 'action_add_geojson'));

            add_action('wp_ajax_action_upload_file', array($this, 'action_upload_file'));

            add_action('wp_ajax_action_get_productbyId', array($this, 'action_get_productbyId'));
            add_action('wp_ajax_nopriv_action_get_productbyId', array($this, 'action_get_productbyId'));

            add_action('wp_ajax_action_get_productsbyArray', array($this, 'action_get_productsbyArray'));
            add_action('wp_ajax_nopriv_action_get_productsbyArray', array($this, 'action_get_productsbyArray'));

            add_action('wp_ajax_action_update_marker', array($this, 'action_update_marker'));
            add_action('wp_ajax_nopriv_action_update_marker', array($this, 'action_update_marker'));
        }

        /*
         * Add Widget in wordpress
         */
        add_action('widgets_init', function () {

        });

        add_shortcode('ats_maps', array('Atomisy_Shortcode', 'Mapsrender'));
        add_filter('widget_text', 'do_shortcode');
        add_action('admin_menu', function () {
            $this->add_admin_metabox();
        });

        add_action('wp_loaded', function () {

        });

        register_activation_hook(__FILE__, array('MapsModel', 'install'));
        register_uninstall_hook(__FILE__, array('MapsModel', 'uninstall'));
    }



    public function add_admin_metabox()
    {
        add_meta_box('mapsinteractive_maps', 'Carte', array($this, 'atomisy_mapsinteractive_maps'), array('maps'), 'normal', 'high');
    }

    public function __init__()
    {
        register_post_type('maps', array(
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

        register_post_type('project', array(
                'label' => _x('Projet', 'General name for "Project" post type'),
                'labels' => array(
                    'name' => _x('Projets', 'Plural name for "Projet" post type'),
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
                'rewrite' => array( 'slug' => 'project' ),
                'capability_type'    => 'post',
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
            )
        );

        register_taxonomy(
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

    protected function set_wp_enqueue()
    {
        //wp_enqueue_style('bootstrap-style', plugins_url('/assets/css/bootstrap-theme.css', __FILE__), array());
        wp_enqueue_style('angular-material-style', plugins_url('/assets/js/angular-material/angular-material.css', __FILE__), array());
        wp_enqueue_style('material-icon', '//fonts.googleapis.com/icon?family=Material+Icons', array());
        // wp_enqueue_style('maps-style', plugins_url('/assets/css/maps.css', __FILE__), array());
        wp_enqueue_script('Cryptography', plugins_url('/assets/js/jquery.crypt.js', __FILE__), array('jquery'), false, false);
        //wp_enqueue_script('google-maps-api', '//maps.googleapis.com/maps/api/js?key=AIzaSyBPokFUT3lbtyMHNH3ojc8i9_Up0K6MszQ&libraries=drawing', array());
        wp_enqueue_script('angular', plugins_url('/assets/js/angular/angular.js', __FILE__), array(), false, false);

        wp_enqueue_script('angular-animate', plugins_url('/assets/js/angular-animate/angular-animate.js', __FILE__), array('angular'), false, false);
        wp_enqueue_script('angular-aria', plugins_url('/assets/js/angular-aria/angular-aria.js', __FILE__), array('angular'), false, false);
        wp_enqueue_script('angular-messages', plugins_url('/assets/js/angular-messages/angular-messages.js', __FILE__), array('angular'), false, false);
        wp_enqueue_script('angular-material', plugins_url('/assets/js/angular-material/angular-material.js', __FILE__), array('angular'), false, false);
        wp_enqueue_script('angular-sanitize', plugins_url('/assets/js/angular-sanitize/angular-sanitize.js', __FILE__), array('angular'), false, false);

        wp_enqueue_script('bootstrap', plugins_url('/assets/js/bootstrap.js', __FILE__), array('jquery'), false, false);
        wp_enqueue_script('Controller', plugins_url('/assets/js/maps.admin.js', __FILE__), array(), false, false);
    }

    public function atomisy_mapsinteractive_maps()
    {
        $this->set_wp_enqueue();

        wp_localize_script('Controller', 'maps', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'post_id' => get_the_ID(),
            'assets_plugins_url' => plugins_url('/assets/', __FILE__)
        ));
        global $TWIG;
        echo $TWIG->render('@adminmaps/adminAddMaps.html', array());
    }

    /*
     * @return json
     */

    public function action_get_terms_product_cat()
    {
        $terms = get_terms('product_cat', array('child_of' => 0, 'hide_empty' => 0));
        if (!$terms || is_wp_error($terms))
            $terms = array();
        $ctgs = array_values($terms);

        wp_send_json($ctgs);
    }

    public function action_add_geojson()
    {
        if (!is_admin())
            return false;
        if (!isset($_REQUEST['post_id']))
            return false;

        global $wpdb;
        $Request = $wpdb->insert("{$wpdb->prefix}maps_geojson", array(
                'post_id' => (int)esc_sql($_REQUEST['post_id']),
                '__geojson_title' => esc_sql($_REQUEST['Title']),
                '__geojson_slug' => esc_sql(sanitize_title($_REQUEST['Title'])),
                '__geojson_lat' => esc_sql($_REQUEST['Lat']),
                '__geojson_lng' => esc_sql($_REQUEST['Lng']),
                '__geojson_zoom' => esc_sql($_REQUEST['Zoom']),
                '__geojson_link' => esc_sql($_REQUEST['Link']))
        );
        if(!$Request){
          echo $wpdb->print_error();
        }

        die();
    }

    public function action_add_marker()
    {
        if (!is_admin())
            return false;
        if (!isset($_REQUEST['post_id']))
            return false;

        global $wpdb;
        $Request = $wpdb->insert($wpdb->prefix."maps_markers", array(
                'post_id' => esc_sql($_REQUEST['post_id']),
                '__marker_title' => esc_sql($_REQUEST['Title']),
                '__marker_slug' => esc_sql(sanitize_title($_REQUEST['Title'])),
                '__marker_lat' => esc_sql($_REQUEST['Lat']),
                '__marker_lng' => esc_sql($_REQUEST['Lng']),
                '__marker_description' => esc_sql($_REQUEST['Description']),
                '__marker_project_id' => esc_sql($_REQUEST['project_id'])),
                array(
                  '%d', '%s', '%s', '%f', '%f', '%s', '%d'
                )
        );
        if(!$Request){
          echo $wpdb->print_error();
        }
        die();
    }

    public function action_update_marker(){
        if (!is_admin())
            return false;
        if (!isset($_REQUEST['id']))
            return false;

        global $wpdb;
        $Update = $wpdb->update($wpdb->prefix."maps_markers", array(
                '__marker_title' => esc_sql($_REQUEST['title']),
                '__marker_lat' => esc_sql($_REQUEST['lat']),
                '__marker_lng' => esc_sql($_REQUEST['lng']),
                '__marker_description' => esc_sql($_REQUEST['description'])),
                array(
                    'id_marker' => esc_sql($_REQUEST['id'])
                ),
                array(
                  '%s', '%f', '%f', '%s'
                ),
                array(
                    '%d'
                )
        );
        if(!$Update){
          echo $wpdb->print_error();
        }
        die();
        
    }

    public function action_get_markers()
    {
        global $wpdb;
        $return = array();
        $id = (int)esc_sql($_REQUEST['post_id']);
        $res = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}maps_markers WHERE post_id = {$id}");
        if ($wpdb->num_rows){
            foreach ($res as $index) {
                $return[] = array(
                    'title' => $index->__marker_title,
                    'id' => (int)$index->id_marker,
                    'description' => $index->__marker_description,
                    'post_ids' => array(
                        (int)$index->__marker_project_id
                    ),
                    'position' => array(
                        'lat' => (float)$index->__marker_lat,
                        'lng'=>(float)$index->__marker_lng
                    )
                );
            }
        }
      wp_send_json($return);
    }

    //@ action_get_projects_by_states

    private function check_project_by_state($post_id, $slug){
      $_ = new WP_Query(array('post_type' => 'project',  'p' => (int)$post_id));
      if ($_->have_posts()):
          while ($_->have_posts()) : $_->the_post();
            $st = array();
            foreach (get_the_terms(get_the_ID(), 'state') as $key => $state) {
              # code...
              $st[] = $state->slug;
            }
            if(in_array($slug, $st)):  return true;  else:  return false;  endif;
          endwhile;
      else:  return false;  endif;
    }
    public function action_get_markers_by_states(){
      global $wpdb;
        $markers = array();
        if(!isset($_REQUEST['slug'])) wp_send_json(array('Type' => 'Error', 'Message' => 'REQUEST slug not define'));
        if(empty($_REQUEST['slug'])) wp_send_json(array('Type' => 'Error', 'Message' => 'REQUEST slug is empty'));

        $slug = $_REQUEST['slug'];
        $___ = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}maps_markers");
        if ($wpdb->num_rows){
            foreach ($___ as $index) {
                if($this->check_project_by_state((int)$index->__marker_project_id, $slug))
                  $markers[] = array(
                      'title' => $index->__marker_title,
                      'description' => $index->__marker_description,
                      'id' => (int)$index->id_marker,
                      'post_id' => (int)$index->__marker_project_id,
                      'position' => array(
                          'lat' => (float)$index->__marker_lat,
                          'lng'=>(float)$index->__marker_lng
                      )
                  );
            }
        }
        wp_send_json($markers);
    }

    public function action_get_projects(){
        $json = array();
        $Q = new WP_Query(array('post_type' => 'project', 'posts_per_page'=>-1));
        if ($Q->have_posts()):
            while ($Q->have_posts()) : $Q->the_post();

                $excerpt = get_the_excerpt();
                $link = get_the_permalink();
                $title = strip_shortcodes(get_the_title());
                $title = apply_filters('the_content', $title);
                $json[] = array(
                    'name' => $title,
                    'id' => get_the_ID(),
                    'thumbnail' => get_the_post_thumbnail_url(null, array(150, 150)),
                    'excerpt' => utf8_encode($excerpt),
                    'permalink' => $link,
                    'state' => get_the_terms(get_the_ID(), 'state')
                );
            endwhile;
        endif;

        wp_send_json($json);

    }

    public function action_getProjectbyArray()
    {
        $ids = json_decode($_REQUEST['ids']);
        $json = array();

        if (!is_array($ids)) return;
        foreach ($ids as $key => $value) {
            if (!is_int($value) || 0 == (int)$value) return;

            $Q = new WP_Query(array('post_type' => 'project', 'p' => $value));
            if ($Q->have_posts()):
                while ($Q->have_posts()) : $Q->the_post();
                    $content = strip_shortcodes(get_the_content());
                    $excerpt = get_the_excerpt();
                    $link = get_the_permalink();
                    $title = strip_shortcodes(get_the_title());
                    $title = apply_filters('the_content', $title);

                    $json[] = array('content' => $content,
                        'title' => $title,
                        'id' => get_the_ID(),
                        'thumbnail' => get_the_post_thumbnail_url(null,array(150, 150)),
                        'excerpt' => $excerpt,
                        'permalink' => $link);
                endwhile;

            endif;
        }
        wp_send_json($json);
    }

    public function action_get_products()
    {
        $json = array();
        $Q = new WP_Query(array('post_type' => 'product', 'posts_per_page'=>-1));
        if ($Q->have_posts()):
            while ($Q->have_posts()) : $Q->the_post();
                $content = strip_shortcodes(get_the_content());
                $excerpt = get_the_excerpt();
                $link = get_the_permalink();
                $city = get_the_terms(get_the_ID(), 'product_cat');

                $title = strip_shortcodes(get_the_title());
                $title = apply_filters('the_content', $title);

                $json[] = array(
                    'title' => $title,
                    'id' => get_the_ID(),
                    'content' => $content,
                    'excerpt' => utf8_encode($excerpt),
                    'link' => $link,
                    'city' => $city,
                    'thumb_url' => get_the_post_thumbnail_url(null, array(150, 150))
                );
            endwhile;

            wp_send_json($json);

        endif;
    }

    public function action_get_productbyId()
    {
        $id = (int)$_REQUEST['product_id'];
        $product = array();
        if (!is_int($id)):
            return true;
        endif;

        $Q = new WP_Query(array('post_type' => 'product', 'p' => esc_sql($id)));
        if ($Q->have_posts()):
            while ($Q->have_posts()) : $Q->the_post();
                $content = get_the_content();
                $excerpt = get_the_excerpt();
                $thumbnail = woocommerce_get_product_thumbnail();
                $product[] = array('content' => $content, 'thumbnail' => $thumbnail, 'excerpt' => $excerpt);
            endwhile;
            wp_send_json($product);

        endif;
    }

    public function action_get_productsbyArray()
    {
        $ids = $_REQUEST['ids'];
        $product = array();
        if (!is_array($ids)):
            return true;
        endif;

        foreach ($ids as $id) {
            $Q = new WP_Query(array('post_type' => 'product', 'p' => esc_sql($id)));
            if ($Q->have_posts()):
                while ($Q->have_posts()) : $Q->the_post();
                    $content = get_the_content();
                    $excerpt = get_the_excerpt();
                    // $thumbnail = woocommerce_get_product_thumbnail();
                    $link = get_the_permalink();
                    $product[] = array(
                        'content' => $content,
                        'excerpt' => $excerpt,
                        'link' => $link,
                        'title' => get_the_title(),
                        'thumb_url' => get_the_post_thumbnail_url(null, array(150, 150))
                    );
                endwhile;
            endif;
        }
        wp_send_json($product);

    }

    public function action_upload_file(){
        if ( ! function_exists( 'wp_handle_upload' ) )
            require_once( ABSPATH . 'wp-admin/includes/file.php' );

        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $upfile = $_FILES['file'];
            $upload_overrides = array( 'test_form' => false , 'mimes' => array('json' => 'application/json'));
            $movefile = wp_handle_upload( $upfile, $upload_overrides);

            if($movefile){
                wp_send_json($movefile);
            } else {
                wp_send_json(array("Sorry, there was an error uploading your file. "));
            }
        }
    }






}

new Atomisy_Plugins();