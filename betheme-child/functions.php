<?php

/* ---------------------------------------------------------------------------
 * Child Theme URI | DO NOT CHANGE
 * --------------------------------------------------------------------------- */
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );
require_once('BFI_Thumb.php');

/* ---------------------------------------------------------------------------
 * Define | YOU CAN CHANGE THESE
 * --------------------------------------------------------------------------- */

// White Label --------------------------------------------
define( 'WHITE_LABEL', false );

// Static CSS is placed in Child Theme directory ----------
define( 'STATIC_IN_CHILD', false );


/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_styles', 101 );
function mfnch_enqueue_styles() {
	
	// Enqueue the parent stylesheet
// 	wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );		//we don't need this if it's empty
	
	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', get_template_directory_uri() . '/rtl.css' );
	}
	
	// Enqueue the child stylesheet
	wp_dequeue_style( 'style' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css' );
	
	
}


/* ---------------------------------------------------------------------------
 * Load Textdomain
 * --------------------------------------------------------------------------- */
// add_action( 'after_setup_theme', 'mfnch_textdomain' );
// function mfnch_textdomain() {
//     load_child_theme_textdomain( 'betheme',  get_stylesheet_directory() . '/languages' );
//     load_child_theme_textdomain( 'mfn-opts', get_stylesheet_directory() . '/languages' );
// }
// require_once(get_stylesheet_directory() . '/includes/BFI_Thumb.php');

/* ---------------------------------------------------------------------------
 * Override theme functions
 * 
 * if you want to override theme functions use the example below
 * --------------------------------------------------------------------------- */
// require_once( get_stylesheet_directory() .'/includes/content-portfolio.php' );

/*-------------------------- Custom Post types -----------------------------*/
function theme_posttype() {
  register_post_type('products', array('label' => 'products',
      'description' => '',
      'public' => true,
      'has_archive' => true,
      'hierarchical' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'capability_type' => 'page',
      'query_var' => true, 
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'supports' => array('title', 'editor', 'thumbnail','page-attributes'),
      'menu_icon'   => 'dashicons-welcome-learn-more',
      'labels' => array(
          'name' => 'products',
          'singular_name' => 'products',
          'menu_name' => 'products',
          'add_new' => 'Add New product',
          'add_new_item' => 'Add New product',
          'edit' => 'Edit product',
          'edit_item' => 'Edit product',
          'new_item' => 'New product',
          'view' => 'View product',
          'view_item' => 'View product',
          'search_items' => 'Search product',
          'not_found' => 'No product Found',
          'not_found_in_trash' => 'No products Found in Trash',
          'parent' => 'Parent Post',
      )));
    }
    $labels = array(
        'name' => _x( 'Product Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Product Categories' ),
        'all_items' => __( 'All Product Categories' ),
        'parent_item' => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item' => __( 'Edit Product Category' ), 
        'update_item' => __( 'Update Product Category' ),
        'add_new_item' => __( 'Add Product Category' ),
        'new_item_name' => __( 'New Product Category' ),
        'menu_name' => __( 'Categories' )
      );    
     
    register_taxonomy('categories',array('products'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'query_var' => true,
        'show_ui' => true
     ));
    add_action('init', 'theme_posttype');
    function my_acf_settings_path( $path ) {
        // update path
        $path = get_stylesheet_directory() . '/inc/acf/';
        // return
        return $path;
    }
    // 2.Customize ACF dir
    add_filter('acf/settings/dir', 'my_acf_settings_dir'); 
    function my_acf_settings_dir( $dir ) {
        // update path
        $dir = get_stylesheet_directory_uri() . '/inc/acf/';
        // return
        return $dir;
    }
    // 3.Hide ACF field group menu item
    add_filter('acf/settings/show_admin', '__return_false');
    // 4.Include ACF
    include_once(get_stylesheet_directory() . '/inc/acf/acf.php');
    // acf options page
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title'  => 'Website General Info',
            'menu_title'  => 'General',
            'menu_slug'   => 'theme-general-settings',
            'capability'  => 'edit_posts',
            'redirect'    => false
            ));
        // acf_add_options_sub_page(array(
        //     'page_title'  => 'Social Media',
        //     'menu_title'  => 'Social Media',
        //     'parent_slug' => 'theme-general-settings',
        //     ));
        acf_add_options_sub_page(array(
            'page_title'  => 'Whitelist',
            'menu_title'  => 'Whitelist',
            'parent_slug' => 'theme-general-settings',
            ));
    }

    require_once( 'functions/meta-products.php' );
    if( ! function_exists( 'muffin_content' ) )
   {
       function muffin_content( $attr, $content = null )
       {
           extract(shortcode_atts(array(
               'id'    => '',
           ), $attr));
           
           $output = "";
           if($id > 0)
               $output = mfn_builder_print( $attr['id'] )."\n";
   
           return $output;
       }
   }
   add_shortcode( 'muffincontent', 'muffin_content' );
?>