<?php
/*
 * -----------------------------------------------------------
 * Theme Custom Functions
 * -----------------------------------------------------------
 */


/*----------- Excerpt lenght -----------*/
if ( ! function_exists( 'dimakin_excerpt_length' ) ) {
  function dimakin_excerpt_length( $length ) {
    return 12;
  }
  add_filter( 'excerpt_length', 'dimakin_excerpt_length', 999 );
}

/*----------- Removing [...] from the excerpt -----------*/
if ( ! function_exists( 'dimakin_excerpt_change' ) ) {
  function dimakin_excerpt_change($more) {
    global $post;
    return '...';
  }
  add_filter( 'excerpt_more', 'dimakin_excerpt_change' );
}

/*----------- Hide default editor on certain pages -----------*/
if( !function_exists('dimakin_hide_editor') ) {
  function dimakin_hide_editor() {

    $template_file = basename( get_page_template() );

    if( $template_file === 'page-contacts.php' ) {
      //change mycustom-page.php to your thing
      remove_post_type_support( 'page', 'editor' );
    }
    if( $template_file === 'page-home.php' ) {
      remove_post_type_support( 'page', 'editor' );
    }
    if( $template_file === 'page-operation-locals.php' ) {
      remove_post_type_support( 'page', 'editor' );
    }

  }
  add_action( 'admin_head', 'dimakin_hide_editor' );
}

/*----------- Remove p tags from around images -----------*/
if( !function_exists('dimakin_filter_ptags_on_images') ) {
  function dimakin_filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }
}


/*----------- Adding the search icon to the menu -----------*/
if(!function_exists('dimakin_primary_menu_extras')) {
  function dimakin_primary_menu_extras( $menu, $args ) {
    if( 'main-navigation' == $args->theme_location )
      $menu .= '<li class="menu-item search"><a href="" class="searchform-toggle"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
    return $menu;
  }
  add_filter('wp_nav_menu_items', 'dimakin_primary_menu_extras', 10, 2);
}
