<?php
/*
 * -----------------------------------------------------------
 * Theme Custom Template Tags
 * -----------------------------------------------------------
 */


/*----------- Social Icons -----------*/
if ( ! function_exists( 'dimack_social_icons' ) ) {

  function dimack_social_icons() {
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
  add_action( 'dimack_social', 'dimack_social_icons' );
}

/*----------- News Loop -----------*/
if ( ! function_exists( 'dimack_news_loop' ) ) {
  function dimack_news_loop() {
    ?>
      <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <a href="<?php the_permalink(); ?>">
          <article class="news-card">
            <section class="news-card-content">
              <?php $title = get_the_title(); ?>
              <a href="<?php the_permalink(); ?>"><h3 class="news-card-title"><?php echo mb_strimwidth( $title, 0, 40, '...' ); ?></h3></a>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="news-card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </section>
            <header id="post-<?php the_ID(); ?>" class="news-card-header">
              <?php if ( has_post_thumbnail() ) : ?>
                <figure class="card-thumbnail">
                  <?php the_post_thumbnail('post-custom-thumb'); ?>
                </figure>
              <?php endif; ?>
            </header>
          </article>
        </a>
      </div>
    <?php
  }
  add_action( 'news_loop', 'dimack_news_loop' );
}


/*----------- Theme Pagination -----------*/
if ( ! function_exists( 'dimack_page_pagination' ) ) {
  function dimack_page_pagination() {
    global $wp_query;
    $bignum = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
      return;
    echo '<hr>';
    echo '<div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">';
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
    echo '</div>';
  }
  add_action( 'dimack_pagination', 'dimack_page_pagination' );
}

/*----------- Theme default loop for archives and search results -----------*/
if ( ! function_exists( 'dimack_default_loop' ) ) {
  function dimack_default_loop() {
    ?>

      <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <a href="<?php the_permalink(); ?>">
          <article class="card">
            <header class="card-header">
              <?php if ( has_post_thumbnail() ) : ?>
                  <figure class="card-thumbnail">
                    <?php the_post_thumbnail(); ?>
                  </figure>
              <?php endif; ?>
            </header>
            <section class="card-content">
              <?php
              if ( is_home() ) {
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , $post_date , '</span>';
              }
              ?>
              <?php $product_title = get_the_title(); ?>
              <h3 class="card-title"><?php echo mb_strimwidth( $product_title, 0, 40, '...' ); ?></h3>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </section>
          </article>
        </a>
      </div>
    <?php
  }
  add_action( 'dimack_loop', 'dimack_default_loop' );
}


/*----------- Loop for child pages -----------*/
if ( ! function_exists( 'dimack_child_pages_loop' ) ) {
  function dimack_child_pages_loop() {
    ?>
    <div class="col-12">
      <a href="<?php the_permalink(); ?>">
        <article class="pagechild-wrapper">
          <header id="post-<?php the_ID(); ?>" class="pagechild-header">
            <?php $title = get_the_title(); ?>
            <h3 class="pagechild-title"><?php echo mb_strimwidth( $title, 0, 60, '...' ); ?></h3>
            <section class="pagechild-content">
              <?php the_excerpt(); ?>
              <i class="fa fa-chevron-right" aria-hidden="true"></i>
            </section>
            <?php if ( has_post_thumbnail('childpage-thumb') ) : ?>
              <figure class="pagechild-thumbnail">
                <?php the_post_thumbnail('childpage-thumb'); ?>
              </figure>
            <?php endif; ?>
          </header>

        </article>
      </a>
    </div>
    <?php
  }
  add_action( 'dimack_child_pages', 'dimack_child_pages_loop' );
}


/*----------- Yoast Breadcrumbs -----------*/
if ( ! function_exists( 'dimack_custom_breadcrumbs') ) {
  function dimack_custom_breadcrumbs() {
    if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb( '<div class="breadcrumbs-wrapper"><div class="container"><div class="row"><div class="col-12"><p id="breadcrumbs">','</p></div></div></div></div>' );
    }
  }
  add_action( 'dimack_breadcrumbs', 'dimack_custom_breadcrumbs' );
}


/*----------- Single post navigation -----------*/
if(!function_exists('dimack_single_post_navigation')) {
  function dimack_single_post_navigation() {

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
  add_action('dimack_post_navigation', 'dimack_single_post_navigation');
}


/*----------- Related Posts -----------*/
if ( !function_exists( 'dimack_related_posts_loop' ) ) {
  function dimack_related_posts_loop() {

    global $post;
    $postid = get_the_ID();

    $related_args = array(
      'post__not_in' => array($postid),
      'posts_per_page' => 3,
      'order' => 'DESC'
    );

    $related_posts = new WP_Query( $related_args );

    if ( $related_posts->have_posts() ) {
      echo '<section class="related-posts"><div class="container"><div class="row"><div class="col-12"><h4 class="related-news-title">' , esc_html__('Outras notícias relevantes', 'dimakin') , '</h4></div></div><div class="row">';
      while ( $related_posts->have_posts() ) : $related_posts->the_post();
      ?>
        <div class="col-12 col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
          <a href="<?php the_permalink(); ?>">
            <article class="card">
              <header class="card-header">
                <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="card-thumbnail">
                      <?php the_post_thumbnail(); ?>
                    </figure>
                <?php endif; ?>
              </header>
              <section class="card-content">
                <?php
                if ( is_home() || is_single() ) {
                  $post_date = get_the_date( 'd-m-Y' );
                  echo '<span class="posted-on">' , $post_date , '</span>';
                }
                ?>
                <?php $product_title = get_the_title(); ?>
                <h3 class="card-title"><?php echo mb_strimwidth( $product_title, 0, 68, '...' ); ?></h3>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
              </section>
            </article>
          </a>
        </div>
      <?php
      endwhile;
      echo '</div></div></section>';
      wp_reset_postdata();
    }

  }

  add_action( 'dimack_related_posts', 'dimack_related_posts_loop' );
}

/*----------- Touch Icons -----------*/
if ( ! function_exists( 'dimack_all_touch_icons' ) ) {

  function dimack_all_touch_icons() {

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
  add_action( 'dimack_touch_icons', 'dimack_all_touch_icons' );
}


/*----------- Display post meta tags -----------*/
if ( !function_exists( 'dimack_post_meta_tags' ) ) {
  function dimack_post_meta_tags() {
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
  add_action('dimack_post_tags', 'dimack_post_meta_tags');
}
