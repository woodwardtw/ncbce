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
  if ( 'unit' === get_post_type() || 'week' === get_post_type() || 'narrative' === get_post_type() ) {                         
      $deps = array('jquery');
      $version= '1.0'; 
      $in_footer = true;    
      wp_enqueue_script('ncbce-plugin-js', plugin_dir_url( __FILE__) . 'js/ncbce-main.js', $deps, $version, $in_footer); 
      wp_enqueue_script('ncbce-boot-js', plugin_dir_url( __FILE__) . 'js/bootstrap.bundle.js', $deps, $version, $in_footer); 
      wp_enqueue_style( 'ncbce-plugin', plugin_dir_url( __FILE__) . 'css/ncbce-main.css');
      wp_enqueue_style( 'ncbce-boot', plugin_dir_url( __FILE__) . 'css/bootstrap.min.css');
    }
}



require_once( plugin_dir_path( __FILE__ ) . 'acf.php');//acf specific code
require_once( plugin_dir_path( __FILE__ ) . 'custom-post-types.php');//custom post types specific code
require_once( plugin_dir_path( __FILE__ ) . 'custom-taxonomy.php');//custom taxonomy specific code

function ncbce_load_templates( $template ) {
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

    if ( 'week' === $post->post_type && locate_template( array( 'single-week.php' ) ) !== $template ) {
        /*
         * This is a 'week' post
         * AND a 'single week template' is not found on
         * theme or child theme directories, so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . 'single-week.php';
    }

    if ( 'narrative' === $post->post_type && locate_template( array( 'single-narrative.php' ) ) !== $template ) {
        /*
         * This is a 'narrative' post
         * AND a 'single narrative template' is not found on
         * theme or child theme directories, so load it
         * from our plugin directory.
         */
        return plugin_dir_path( __FILE__ ) . 'single-narrative.php';
    }

    return $template;
}

add_filter( 'single_template', 'ncbce_load_templates' );



//LOAD ADMIN CSS
function ncbce_custom_wp_admin_style(){
    wp_register_style( 'ncbce-admin-css', plugin_dir_url( __FILE__) . 'css/ncbce-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'ncbce-admin-css' );
}
add_action('admin_enqueue_scripts', 'ncbce_custom_wp_admin_style');


/*
UNIT AND WEEK NAVIGATION
*/


function ncbce_unit_navigation(){
  //show associated weeks for the main module page
    global $post;
    $static_id = $post->ID;
    $type = get_post_type($static_id);
    
    if ($type === 'unit'){
      return ncbce_get_weeks($static_id, get_the_permalink());
    } 
    if ($type === 'week'){
      // The Query
      $args = array( 'post_type' => 'unit' );
      $module_query = new WP_Query( $args );
      // get all the modules for the lesson's page
      if ( $module_query->have_posts() ) {
          while ( $module_query->have_posts() ) {
              $module_query->the_post();
              $weeks = get_field('weeks', $post->ID);
              if (in_array($static_id, $weeks)){
                return ncbce_get_weeks($post->ID, get_the_permalink($static_id));
              }
          }
      } else {
          // no posts found
      }
      /* Restore original Post Data */
      wp_reset_postdata();
    }
    return nbce_nar_icon($post->ID);

}



  
//get weeks 
    function ncbce_get_weeks($id, $current_location){
      global $post;
      $weeks = get_field('weeks', $id);
      if( $weeks ){
          $html = "<div class='weeks-list'><h2><span class='white-out'>Weeks</span></h2><ul>";
          foreach( $weeks as $key=>$week ): 
            $number = $key+1;
            $link = get_the_permalink($week);
            $title = get_the_title($week);
            if ($link === $current_location){
              $location = 'here';
            } else {
              $location = 'not-here';
            }
              // Setup this post for WP functions (variable must be named $post).
              $html .= "<li class='{$location}'> <a href='{$link}'>{$title}</a></li>";
          endforeach;
          return $html . '</ul></div>';
      } 
          // Reset the global post object so that the rest of the page works correctly.
          wp_reset_postdata(); 
    }

add_shortcode( 'list-weeks', 'ncbce_unit_navigation' );


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


//STRIP GOOGLE docs cut/paste formatting
//fix cut paste drama from https://jonathannicol.com/blog/2015/02/19/clean-pasted-text-in-wordpress/
add_filter('tiny_mce_before_init','configure_tinymce');

/**
 * Customize TinyMCE's configuration
 *
 * @param   array
 * @return  array
 */
function configure_tinymce($in) {
  $in['paste_preprocess'] = "function(plugin, args){
    // Strip all HTML tags except those we have whitelisted
    var whitelist = 'p,b,strong,i,em,h2,h3,h4,h5,h6,ul,li,ol,a,href';
    var stripped = jQuery('<div>' + args.content + '</div>');
    var els = stripped.find('*').not(whitelist);
    for (var i = els.length - 1; i >= 0; i--) {
      var e = els[i];
      jQuery(e).replaceWith(e.innerHTML);
    }
    // Strip all class and id attributes
    stripped.find('*').removeAttr('id').removeAttr('class').removeAttr('style');
    // Return the clean HTML
    args.content = stripped.html();
  }";
  return $in;
}


  //print("<pre>".print_r($a,true)."</pre>");
