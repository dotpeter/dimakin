<?php
/*
 * -----------------------------------------------------------
 * Theme Custom Template Tags
 * -----------------------------------------------------------
 */

/*----------- Load Loops -----------*/
require get_template_directory() . '/inc/loops/default-loop.php';
require get_template_directory() . '/inc/loops/news-loop.php';
require get_template_directory() . '/inc/loops/childpages-loop.php';
require get_template_directory() . '/inc/loops/related-posts-loop.php';
require get_template_directory() . '/inc/loops/products-loop.php';
require get_template_directory() . '/inc/loops/jobs-loop.php';

/*----------- Theme Pagination -----------*/
if ( ! function_exists( 'dimakin_page_pagination' ) ) {
  function dimakin_page_pagination() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
      return;
    echo '<hr>';
    echo '<div class="row"><div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">';
    echo '<nav class="pagination-wrapper">';
    echo paginate_links( array(
      'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
      'format'       => '',
      'current'      => max( 1, get_query_var('paged') ),
      'total'        => $wp_query->max_num_pages,
      'prev_text'    => '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
      'next_text'    => '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
      'type'         => 'list',
      'end_size'     => 1,
      'mid_size'     => 1
    ) );
    echo '</nav>';
    echo '</div></div>';
  }
  add_action( 'dimakin_pagination', 'dimakin_page_pagination' );
}

/*----------- Yoast Breadcrumbs -----------*/
if ( ! function_exists( 'dimakin_custom_breadcrumbs') ) {
  function dimakin_custom_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div class="breadcrumbs-wrapper"><div class="container"><div class="row"><div class="col-12"><p id="breadcrumbs">','</p></div></div></div></div>' );
    }
  }
  add_action( 'dimakin_breadcrumbs', 'dimakin_custom_breadcrumbs' );
}


/*----------- Single post navigation -----------*/
if(!function_exists('dimakin_single_post_navigation')) {
  function dimakin_single_post_navigation() {

    $prevPost = get_previous_post();
    $nextPost = get_next_post();

    if(!empty($nextPost || $prevPost)) {
      echo '<div class="single-post-nav">';
      if(!empty($prevPost)) {
        $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array( 100,100 ) );
        if(!empty($prevthumbnail)) {
          echo '<div class="previous-post previous-post-thumb">';
        } else {
          echo '<div class="previous-post">';
        }

        previous_post_link('%link'. $prevthumbnail , '<p>%title</p><i class="fa fa-chevron-left" aria-hidden="true"></i>', TRUE);
        echo '</div>';
      }

      if(!empty($nextPost)) {
        $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(100,100) );

        if(!empty($nextthumbnail)){
          echo '<div class="next-post next-post-thumb">';
        } else {
          echo '<div class="next-post">';
        }
        next_post_link('%link' . $nextthumbnail , '<p>%title</p><i class="fa fa-chevron-right" aria-hidden="true"></i>', TRUE);
        echo '</div>';
      }
      echo '</div><!-- single-post-nav -->';
    }
  }
  add_action('dimakin_post_navigation', 'dimakin_single_post_navigation');
}

/*----------- Touch Icons -----------*/
if ( ! function_exists( 'dimakin_all_touch_icons' ) ) {

  function dimakin_all_touch_icons() {

    $touch_icon_phone = get_theme_mod( 'touch-icon-phone');
    $touch_icon_ipad = get_theme_mod( 'touch-icon-ipad');
    $touch_icon_iphone_retina = get_theme_mod( 'touch-icon-iphone-retina');
    $touch_icon_ipad_retina = get_theme_mod( 'touch-icon-ipad-retina');
    $touch_icon_ipad_pro = get_theme_mod( 'touch-icon-ipad-pro');
    $touch_icon_iphone_6_plus = get_theme_mod( 'touch-icon-iphone-6-plus');
    $android_icon_hd = get_theme_mod( 'android-icon-hd');
    $android_icon = get_theme_mod( 'android-icon');

    if ( !empty( $touch_icon_phone ) ) {
      echo '<link rel="apple-touch-icon" sizes="57x57" href="' , esc_url($touch_icon_phone) , '">';
    }
    if ( !empty( $touch_icon_ipad ) ) {
      echo '<link rel="apple-touch-icon" sizes="76x76" href="' , esc_url($touch_icon_ipad) , '">';
    }
    if ( !empty( $touch_icon_iphone_retina ) ) {
      echo '<link rel="apple-touch-icon" sizes="120x120" href="' , esc_url($touch_icon_iphone_retina) , '">';
    }
    if ( !empty( $touch_icon_ipad_retina ) ) {
      echo '<link rel="apple-touch-icon" sizes="152x152" href="' , esc_url($touch_icon_ipad_retina) , '">';
    }
    if ( !empty( $touch_icon_ipad_pro ) ) {
      echo '<link rel="apple-touch-icon" sizes="167x167" href="' , esc_url($touch_icon_ipad_pro) , '">';
    }
    if ( !empty( $touch_icon_iphone_6_plus ) ) {
      echo '<link rel="apple-touch-icon" sizes="180x180" href="' , esc_url($touch_icon_iphone_6_plus) , '">';
    }
    if ( !empty( $android_icon_hd ) ) {
      echo '<link rel="icon" sizes="192x192" href="' , esc_url($android_icon_hd) , '">';
    }
    if ( !empty( $android_icon ) ) {
      echo '<link rel="icon" sizes="128x128" href="' , esc_url($android_icon) , '">';
    }

  }
  add_action( 'dimakin_touch_icons', 'dimakin_all_touch_icons' );
}

/*----------- Social Icons -----------*/
if ( ! function_exists( 'dimakin_social_icons' ) ) {

  function dimakin_social_icons() {
    $facebook_url = get_theme_mod( 'facebook_field' );
    $linkedin_url = get_theme_mod( 'linkedin_field' );
    $twitter_url = get_theme_mod( 'twitter_field' );
    $youtube_url = get_theme_mod( 'youtube_field' );
    $googleplus_url = get_theme_mod( 'googleplus_field' );
    $instagram_url = get_theme_mod( 'instagram_field' );
    if ( !empty( $facebook_url || $linkedin_url || $twitter_url || $youtube_url || $googleplus_url ) ) :
      echo '<div class="social-icons">';
      if ( !empty( $linkedin_url ) ) :
        echo '<a href="' , esc_url( $linkedin_url ) , '" target="_blank" class="social-icon-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
      endif;
      if ( !empty( $youtube_url ) ) :
        echo '<a href="' , esc_url( $youtube_url ) , '" target="_blank" class="social-icon-youtube"><i class="fa fa-youtube-play" aria-hidden="true""></i></a>';
      endif;
      if ( !empty( $facebook_url ) ) :
        echo '<a href="' , esc_url( $facebook_url ) , '" target="_blank" class="social-icon-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
      endif;
      if ( !empty( $twitter_url ) ) :
        echo '<a href="' , esc_url( $twitter_url ) , '" target="_blank" class="social-icon-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
      endif;
      if ( !empty( $googleplus_url ) ) :
        echo '<a href="' , esc_url( $googleplus_url ) , '" target="_blank" class="social-icon-googleplus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
      endif;
      if ( !empty( $instagram_url ) ) :
        echo '<a href="' , esc_url( $instagram_url ) , '" target="_blank" class="social-icon-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
      endif;
      echo '</div><!-- social icons ends -->';
    endif;
  }
  add_action( 'dimakin_social', 'dimakin_social_icons' );
}

/*----------- Display post meta tags -----------*/
if ( !function_exists( 'dimakin_post_meta_tags' ) ) {
  function dimakin_post_meta_tags() {
    $metatags = '';
      if( has_tag() ) {
        $metatags .= '<div class="meta-tags-wrapper"><div class="container"><div class="row"><div class="col-12">';
        $metatags .= '<ul>';
        $metatags .= '<li class="meta-tag-icon"><i class="fa fa-tag" aria-hidden="true"></i></li>';
        $metatags .= get_the_tag_list('<li>','</li> <li>','</li>');
        $metatags .= '</ul>';
        $metatags .= '</div><!-- col --></div><!-- row --></div><!-- container --></div><!-- meta-tags-wrapper -->';
        echo $metatags;
      }
  }
  add_action('dimakin_post_tags', 'dimakin_post_meta_tags');
}
