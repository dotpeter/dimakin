<?php
/*
* Home Page News
*/
$posts_per_page = 3;
$sticky_posts = get_option( 'sticky_posts' );

if (is_array($sticky_posts)) {
  // counnt the number of sticky posts
  $sticky_count = count($sticky_posts);
  // and if the number of sticky posts is less than
  // the number we want to set:
  if ($sticky_count < $posts_per_page) {
    $posts_per_page = $posts_per_page - $sticky_count;
  // if the number of sticky posts is greater than or equal
  // the number of pages we want to set:
  } else {
    $posts_per_page = 3;
  }
  // fallback in case we have no sticky posts
  // and we are not on the first page
} else {
  $posts_per_page = 3;
}

$news_args = array(
  'posts_per_page' => $posts_per_page,
);

$news_loop = new WP_Query($news_args);

if ( $news_loop->have_posts() ) :
  echo '<section class="news-wrapper"><div class="container"><div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><a href="', get_permalink( get_option( 'page_for_posts' ) ) , '"><h2 class="section-title">' , esc_html__( 'Notícias', 'dimakin' ) , '</h2></a></div></div><div class="row">';
  while ( $news_loop->have_posts() ) : $news_loop->the_post();
    do_action('news_loop');
  endwhile;
  echo '</div><div class="row"><div class="col-12"><a href="', get_permalink( get_option( 'page_for_posts' ) ) , '" class="primary-btn">' , esc_html__( 'Ver + Notícias', 'dimakin' ) , '<i class="fa fa-chevron-right" aria-hidden="true"></i></a></div></div></div></section>';
endif;

wp_reset_postdata();
