<?php
/*
 * -----------------------------------------------------------
 * Theme Custom Functions
 * -----------------------------------------------------------
 */


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


/*----------- Adding the search icon to the menu -----------*/
if(!function_exists('dimakin_primary_menu_extras')) {
  function dimakin_primary_menu_extras( $menu, $args ) {
    if( 'main-navigation' == $args->theme_location )
      $menu .= '<li class="menu-item search"><a href="" class="searchform-toggle"><i class="fa fa-search" aria-hidden="true"></i></a></li>';
    return $menu;
  }
  add_filter('wp_nav_menu_items', 'dimakin_primary_menu_extras', 10, 2);
}


/*----------- Limite the excerpt -----------*/
function get_excerpt(){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" ([.*?])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, 64);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

/*----------- Disable Pingbacks -----------*/
function dimakin_disable_self_pingbacks( &$links ) {
  foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, get_option( 'home' ) ) )
            unset($links[$l]);
}

add_action( 'pre_ping', 'dimakin_disable_self_pingbacks' );

/*----------- Remove Query Strings -----------*/
function remove_query_strings() {
  if(!is_admin()) {
    add_filter('script_loader_src', 'remove_query_strings_split', 15);
    add_filter('style_loader_src', 'remove_query_strings_split', 15);
  }
}

function remove_query_strings_split($src){
  $output = preg_split("/(&ver|\?ver)/", $src);
  return $output[0];
}
add_action('init', 'remove_query_strings');

/*----------- Disabel oEmbed -----------*/
function my_deregister_scripts() {
  wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/*----------- disable emojis -----------*/
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}


/*----------- Disable RSS feed-----------*/
function itsme_disable_feed() {
  wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!' ) );
}

add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

/*----------- Disable Contact Form 7 from load in all pages -----------*/
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

/*----------- Clean WP header -----------*/
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Remove shortlink

/*
* Remove JSON API links in header html
*/
function remove_json_api () {
    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );
    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    // Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

/*----------- Remove WordPress version number -----------*/
function dimakin_remove_version() {
	return '';
}
add_filter('the_generator', 'dimakin_remove_version');
