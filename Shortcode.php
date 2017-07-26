<?php

/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 10/08/2016
 * Time: 13:32
 */
class Atomisy_Shortcode
{

    public function __construct()
    {

    }

    /**
     * @param $attrs
     * @param $content
     * @return mixed
     */
    public static function render($attrs, $content)
    {
        return $content;
    }

    /**
     * @param $attrs
     * @param $content
     * @return mixed
     */
    public static function Mapsrender($attrs, $content)
    {
        $at = shortcode_atts(array(
            'id' => 0,
            'in_page_slug' => null,
            'in_page' => false
        ), $attrs);
        wp_dequeue_style('storefront-style');
        wp_enqueue_style('angular-material-style', plugins_url('/assets/js/angular-material/angular-material.css', __FILE__), array());
        //wp_enqueue_style('bootstrap-style', plugins_url('/assets/css/bootstrap.css', __FILE__), array());
        if(!$at['in_page']):
          wp_enqueue_style('maps-style', plugins_url('/assets/css/maps.css', __FILE__), array());
        endif;


        //wp_enqueue_script('google-maps-api', '//maps.googleapis.com/maps/api/js?key=AIzaSyBPokFUT3lbtyMHNH3ojc8i9_Up0K6MszQ&sensor=false&libraries=drawing', array());
        wp_enqueue_script('jqueryui', plugins_url('/assets/js/jquery-ui.js', __FILE__), array('jquery'), false, false);
        wp_enqueue_script('angular', plugins_url('/assets/js/angular/angular.js', __FILE__), array(), false, false);
        wp_enqueue_script('Cryptography', plugins_url('/assets/js/jquery.crypt.js', __FILE__), array('jquery'), false, false);

        wp_enqueue_script('angular-animate', plugins_url('/assets/js/angular-animate/angular-animate.js', __FILE__), array(), false, false);

        wp_enqueue_script('angular-aria', plugins_url('/assets/js/angular-aria/angular-aria.js', __FILE__), array(), false, false);

        wp_enqueue_script('angular-messages', plugins_url('/assets/js/angular-messages/angular-messages.js', __FILE__), array(), false, false);
        wp_enqueue_script('angular-sanitize', plugins_url('/assets/js/angular-sanitize/angular-sanitize.js', __FILE__), array(), false, false);
        wp_enqueue_script('angular-material', plugins_url('/assets/js/angular-material/angular-material.js', __FILE__), array(), false, false);
        wp_enqueue_script('bootstrap', plugins_url('/assets/js/bootstrap.js', __FILE__), array('jquery'), false, false);

        if(!$at['in_page']):
          wp_enqueue_script('controller', plugins_url('/assets/js/maps.js', __FILE__), array('jquery'), false, false);
          wp_localize_script('controller', 'mapsinteractive', array(
              'ajax_url' => admin_url('admin-ajax.php'),
              'post_id' => $at['id'],
              'assets_plugins_url' => plugins_url('/assets/', __FILE__)
          ));
        else:
          wp_enqueue_style('maps-style', '//fonts.googleapis.com/css?family=Trirong:100,100i,200,400', array());
          wp_enqueue_script('controller', plugins_url('/assets/js/maps.in.page.js', __FILE__), array('jquery'), false, false);
          wp_localize_script('controller', 'mapsinteractive', array(
              'ajax_url' => admin_url('admin-ajax.php'),
              'in_page_slug' => $at['in_page_slug'],
              'assets_plugins_url' => plugins_url('/assets/', __FILE__),
              'url' => get_option('siteurl')
          ));
        endif;


        global $TWIG;
        if ($TWIG === null) {
            echo 'Active FALI. Engine TWIG';
            return;
        }
        if(!$at['in_page']):
          return $TWIG->render('@frontmaps/maps.html', array());
        else:
          return $TWIG->render('@frontmaps/maps.in.page.html', array());
        endif;
    }

}
