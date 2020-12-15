<?php 
/*
Here's your ACF SPECIFIC CODE
*/


//unit custom post type

// Register Custom Post Type unit
// Post Type Key: unit

function create_unit_cpt() {

  $labels = array(
    'name' => __( 'Units', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Unit', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Unit', 'textdomain' ),
    'name_admin_bar' => __( 'Unit', 'textdomain' ),
    'archives' => __( 'Unit Archives', 'textdomain' ),
    'attributes' => __( 'Unit Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Unit:', 'textdomain' ),
    'all_items' => __( 'All Units', 'textdomain' ),
    'add_new_item' => __( 'Add New Unit', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Unit', 'textdomain' ),
    'edit_item' => __( 'Edit Unit', 'textdomain' ),
    'update_item' => __( 'Update Unit', 'textdomain' ),
    'view_item' => __( 'View Unit', 'textdomain' ),
    'view_items' => __( 'View Units', 'textdomain' ),
    'search_items' => __( 'Search Units', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into unit', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this unit', 'textdomain' ),
    'items_list' => __( 'Unit list', 'textdomain' ),
    'items_list_navigation' => __( 'Unit list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Unit list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'unit', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 100,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-database',
  );
  register_post_type( 'unit', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_unit_cpt', 0 );


//week custom post type

// Register Custom Post Type week
// Post Type Key: week

function create_week_cpt() {

  $labels = array(
    'name' => __( 'Weeks', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Week', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Week', 'textdomain' ),
    'name_admin_bar' => __( 'Week', 'textdomain' ),
    'archives' => __( 'Week Archives', 'textdomain' ),
    'attributes' => __( 'Week Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Week:', 'textdomain' ),
    'all_items' => __( 'All Weeks', 'textdomain' ),
    'add_new_item' => __( 'Add New Week', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Week', 'textdomain' ),
    'edit_item' => __( 'Edit Week', 'textdomain' ),
    'update_item' => __( 'Update Week', 'textdomain' ),
    'view_item' => __( 'View Week', 'textdomain' ),
    'view_items' => __( 'View Weeks', 'textdomain' ),
    'search_items' => __( 'Search Weeks', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into week', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this week', 'textdomain' ),
    'items_list' => __( 'Week list', 'textdomain' ),
    'items_list_navigation' => __( 'Week list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Week list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'week', 'textdomain' ),
    'description' => __( '', 'textdomain' ),
    'labels' => $labels,
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 100,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-calendar-alt',
  );
  register_post_type( 'week', $args );
  
  // flush rewrite rules because we changed the permalink structure
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_week_cpt', 0 );