<?php 
/*
Plugin Name: NCBCE ALP plugin
Plugin URI:  https://github.com/
Description: For all sorts of interesting things
Version:     1.0
Author:      Tom Woodward
Author URI:  https://bionicteaching.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


//add_action('wp_enqueue_scripts', 'ncbce_load_scripts', 9999);
add_action( 'wp_footer', 'ncbce_load_scripts' );

function ncbce_load_scripts() {                           
    $deps = array('jquery');
    $version= '1.0'; 
    $in_footer = true;    
    wp_enqueue_script('ncbce-plugin-js', plugin_dir_url( __FILE__) . 'js/ncbce-main.js', $deps, $version, $in_footer); 
    wp_enqueue_style( 'ncbce-plugin', plugin_dir_url( __FILE__) . 'css/ncbce-main.css');
}



require_once( plugin_dir_path( __FILE__ ) . 'acf.php');//acf specific code
require_once( plugin_dir_path( __FILE__ ) . 'custom-fields.php');//custom post types specific code
require_once( plugin_dir_path( __FILE__ ) . 'custom-taxonomy.php');//custom taxonomy specific code

function ncbce_load_unit_template( $template ) {
    global $post;

    if ( 'unit' === $post->post_type && locate_template( array( 'single-unit.php' ) ) !== $template ) {
        /*
         * This is a 'unit' post
         * AND a 'single unit template' is not found on
         * theme or child theme directories, so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . 'single-unit.php';
    }

    return $template;
}

add_filter( 'single_template', 'ncbce_load_unit_template' );



//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}

  //print("<pre>".print_r($a,true)."</pre>");
