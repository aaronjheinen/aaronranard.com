<?php
/**
 * Custom Post Types
 */
function custom_project() { 
  // creating (registering) the custom type 
  register_post_type( 'project', 
    // let's now add all the options for this post type
    array('labels' => array(
      'name' => __('Projects', 'bonestheme'), /* This is the Title of the Group */
      'singular_name' => __('Project', 'bonestheme'), /* This is the individual type */
      'all_items' => __('All Projects', 'bonestheme'), /* the all items menu item */
      'add_new' => __('Add New', 'bonestheme'), /* The add new menu item */
      'add_new_item' => __('Add New Project', 'bonestheme'), /* Add New Display Title */
      'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
      'edit_item' => __('Edit Project', 'bonestheme'), /* Edit Display Title */
      'new_item' => __('New Project', 'bonestheme'), /* New Display Title */
      'view_item' => __('View Project', 'bonestheme'), /* View Display Title */
      'search_items' => __('Search Projects', 'bonestheme'), /* Search Custom Type Title */ 
      'not_found' =>  __('Nothing found in the Database.', 'bonestheme'), /* This displays if there are no entries yet */ 
      'not_found_in_trash' => __('Nothing found in Trash', 'bonestheme'), /* This displays if there is nothing in the trash */
      'parent_item_colon' => ''
      ), /* end of arrays */
      'description' => __( 'Individual Projects', 'bonestheme' ), /* Custom Type Description */
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => false,
      'show_ui' => true,
      'query_var' => true,
      'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
      //'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
      'rewrite' => array( 'slug' => 'project', 'with_front' => false ), /* you can specify its url slug */
      'has_archive' => 'projects', /* you can rename the slug here */
      'capability_type' => 'post',
      'hierarchical' => false,
      /* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'sticky')
    ) /* end of options */
  ); /* end of register post type */
  
  /* this adds your post categories to your custom post type */
  //register_taxonomy_for_object_type('category', 'site_building');
  /* this adds your post tags to your custom post type */
  //register_taxonomy_for_object_type('post_tag', 'custom_type');
  
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_project');

/*
for more information on taxonomies, go here:
http://codex.wordpress.org/Function_Reference/register_taxonomy
*/

// now let's add custom categories (these act like categories)
register_taxonomy( 'project_tech', 
  array('project'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
  array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
      'name' => __( 'Technologies', 'bonestheme' ), /* name of the custom taxonomy */
      'singular_name' => __( 'Technology', 'bonestheme' ), /* single taxonomy name */
      'search_items' =>  __( 'Search Technologys', 'bonestheme' ), /* search title for taxomony */
      'all_items' => __( 'All Technologys', 'bonestheme' ), /* all title for taxonomies */
      'edit_item' => __( 'Edit Technology', 'bonestheme' ), /* edit custom taxonomy title */
      'update_item' => __( 'Update Technology', 'bonestheme' ), /* update title for taxonomy */
      'add_new_item' => __( 'Add New Technology', 'bonestheme' ), /* add new title for taxonomy */
      'new_item_name' => __( 'New Technology', 'bonestheme' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true, 
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project-tech' ),
  )
);   

// check for a certain meta key on the current post and add a body class if meta value exists
add_filter('body_class','custom_field_body_class');

function custom_field_body_class( $classes ) {
  if ( have_rows('sidebar-nav', get_the_ID()) ) {
    $classes[] = 'side-nav'; 
  }
  // return the $classes array
  return $classes;
}

function container_gray_start() {
     return "<div class='container-gray'><div class='container'>";
}
add_shortcode('container-gray-start', 'container_gray_start');
function container_gray_end() {
     return "</div></div>";
}
add_shortcode('container-gray-end', 'container_gray_end');
function code($atts, $content = null) {
     return '<p><code>' . $content . '</code></p>';
}
add_shortcode('code', 'code');
function android($atts, $content = null){
  return '<a href="'.$content.'" target="_new"><img alt="Android app on Google Play" src="http://developer.android.com/images/brand/en_generic_rgb_wo_45.png"></a>';
}
add_shortcode('android', 'android');
function ios($atts, $content = null){
  return '<a href="'.$content.'" target="_new"><img src="http://grfx.cstv.com/schools/wis/graphics/auto/apple-app-store.jpg" width="169" height="63" alt="Download from the Apple App Store" border="0px" align="left"></a>';
}
add_shortcode('ios', 'ios');
