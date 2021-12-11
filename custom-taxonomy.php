<?php 
/*
custom taxonomy land
*/

// Register DPI Taxonomy
function ncbce_dpi_tax() {

	$labels = array(
		'name'                       => _x( 'DPI Standards', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'DPI Standard', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'DPI Standard', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Standard Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Standard', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'                => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'dpi_standard', array( 'week', 'unit' ), $args );

}
add_action( 'init', 'ncbce_dpi_tax', 0 );

// Register HDI Taxonomy
function ncbce_hdi_tax() {

	$labels = array(
		'name'                       => _x( 'HDI Standards', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'HDI Standard', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'HDI Standard', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Standard Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Standard', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'                => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'hdi_standard', array( 'week', 'unit' ), $args );

}
add_action( 'init', 'ncbce_hdi_tax', 0 );


// Register CompTIA Taxonomy
function ncbce_CompTIA_tax() {

	$labels = array(
		'name'                       => _x( 'CompTIA Standards', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'CompTIA Standard', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'CompTIA Standard', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Standard Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Standard', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'               => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'CompTIA_standard', array( 'week', 'unit' ), $args );

}
add_action( 'init', 'ncbce_CompTIA_tax', 0 );

// Register Service Level Taxonomy
function ncbce_service_tax() {

	$labels = array(
		'name'                       => _x( 'Service Levels', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Service Level', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Service Levels', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Level', 'text_domain' ),
		'add_new_item'               => __( 'Add New Level', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'               => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'service_level', array( 'week', 'unit', 'narrative' ), $args );

}
add_action( 'init', 'ncbce_service_tax', 0 );


// Register Partnership Opportunities 
function ncbce_opp_tax() {

	$labels = array(
		'name'                       => _x( 'Partnership Opportunities', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Partnership Opportunity', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Partnership Opportunities', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Level', 'text_domain' ),
		'add_new_item'               => __( 'Add New Opportunity', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'meta_box_cb'                => false,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'profile_opp', array( 'profile' ), $args );

}
add_action( 'init', 'ncbce_opp_tax', 0 );


//add path taxonomy
add_action( 'init', 'path_register_tax_path', 0 );
/**
 * Register Taxonomy paths
 */
function path_register_tax_path() {

  $labels = array(
    'name'          => __( 'paths', 'textdomain' ),
    'singular_name' => __( 'path', 'textdomain' ),
    'search_items'  => __( 'Search path', 'textdomain' ),
    'all_items'     => __( 'All paths', 'textdomain' ),
    'edit_item'     => __( 'Edit path', 'textdomain' ),
    'update_item'   => __( 'Update path', 'textdomain' ),
    'add_new_item'  => __( 'Add New path', 'textdomain' ),
    'new_item_name' => __( 'Add New path', 'textdomain' ),
  );

  register_taxonomy(
    'path',
    array(
      'unit',
      'narrative',
      'week'
    ),
    array(
      'hierarchical'       => true,
      'public'             => true,
      'publicly_queryable' => true,
      'labels'             => $labels,
      'show_ui'            => true,
	  'meta_box_cb'        => false,
      'show_in_rest'       => true,
      'show_admin_column'  => true,
      'query_var'          => true,
      'rewrite'            => array(
        'slug' => _x( 'path', 'slug', 'textdomain' ),
      ),
    )
  );
}

add_action( 'init', 'guide_topics_register_tax_guidetopics', 0 );
/**
 * Register Taxonomy A+ Guide Topics
 */
function guide_topics_register_tax_guidetopics() {

	$labels = array(
		'name'          => __( 'A+ Guide Topics', 'textdomain' ),
		'singular_name' => __( 'A+ Guide Topic', 'textdomain' ),
		'search_items'  => __( 'Search A+ Guide Topic', 'textdomain' ),
		'all_items'     => __( 'All A+ Guide Topics', 'textdomain' ),
		'edit_item'     => __( 'Edit A+ Guide Topic', 'textdomain' ),
		'update_item'   => __( 'Update A+ Guide Topic', 'textdomain' ),
		'add_new_item'  => __( 'Add New A+ Guide Topic', 'textdomain' ),
		'new_item_name' => __( 'Add New A+ Guide Topic', 'textdomain' ),
	);

	register_taxonomy(
		'guidetopics',
		array(
			'week',
		),
		array(
			'hierarchical'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'meta_box_cb'        => false,
			'show_in_rest'       => true,
			'show_admin_column'  => false,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' => _x( 'guidetopic', 'slug', 'textdomain' ),
			),
		)
	);
}

add_action( 'init', 'aexam_register_tax_examobjectives', 0 );
/**
 * Register Taxonomy A+ Exam Objectives
 */
function aexam_register_tax_examobjectives() {

	$labels = array(
		'name'          => __( 'A+ Objectives', 'textdomain' ),
		'singular_name' => __( 'A+ Objective', 'textdomain' ),
		'search_items'  => __( 'Search A+ Objectives', 'textdomain' ),
		'all_items'     => __( 'All A+ Objectives', 'textdomain' ),
		'edit_item'     => __( 'Edit A+ Objective', 'textdomain' ),
		'update_item'   => __( 'Update A+ Objective', 'textdomain' ),
		'add_new_item'  => __( 'Add New A+ Objective', 'textdomain' ),
		'new_item_name' => __( 'Add New A+ Objective', 'textdomain' ),
	);

	register_taxonomy(
		'examobjectives',
		array(
			'week',
		),
		array(
			'hierarchical'       => true,
			'public'             => true,
			'publicly_queryable' => true,
			'labels'             => $labels,
			'show_ui'            => true,
			'show_in_rest'       => true,
			'show_admin_column'  => false,
			'meta_box_cb'        => false,
			'query_var'          => true,
			'rewrite'            => array(
				'slug' => _x( 'examobjective', 'slug', 'textdomain' ),
			),
		)
	);
}