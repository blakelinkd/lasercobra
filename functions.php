<?php
function load_stylesheets() {
    // wp_enqueue_style( 'style', get_stylesheet_uri());
    // wp_enqueue_style( 'grid', get_stylesheet_uri() . '/css/grid.css');
	wp_enqueue_style( 'style', get_theme_file_uri( '/style.css' ), false, '1.1', 'all' );
	wp_enqueue_style( 'grid', get_theme_file_uri( '/css/grid.css' ), false, '1.1', 'all' );

}
add_action( 'wp_enqueue_scripts', 'load_stylesheets');

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

// Create wordpress sidebar
function wp_sidebar_init() {
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar1',
            'before_widget' => '<div class="widget-sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}

add_action( 'widgets_init', 'wp_sidebar_init' );

function create_post_types() {
    // Custom Post Type
    register_post_type('videos',
      array(
        'labels' => array(
                      'name'          => 'Videos',
                      'singular_name' => 'Video',
                      'add_new'       => 'Add New Video',
                      'add_new_item'  => 'Add New Video',
                      'new_item'      => 'New Video',
                      'edit_item'     => 'Edit Video',
                      'view_item'     => 'View Video',
                      'search_items'  => 'Search Videos',
                      
                    ),
        'description' => 'Video Posts',
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => array('slug' => 'videos')
      )
    );
  }
  add_action('init', 'create_post_types');

?>