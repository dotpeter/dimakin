<?php 
/**
 * The related news loop.
 * 
 * @package Dimakin
 */


global $post;
$post_id = get_the_ID();

$related_args = array(
  'post__not_in' => array($post_id),
  'posts_per_page' => 3,
  'order' => 'DESC'
);

$related_posts = new WP_Query( $related_args );

if ( $related_posts->have_posts() ) :
  ?>
  <section class="related-news">
    <h4 class="related-news-title"><?php esc_html_e( 'Notícias Recentes', 'dimakin' ); ?></h4>
    <hr />
    <?php
    while ( $related_posts->have_posts() ) :
      $related_posts->the_post();
      ?>
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <article class="related-news-card-wrapper">
          <header class="card-header">
            <?php
            echo '<time class="posted-on" datetime="' , get_the_date('c') , '" itemprop="datePublished">' , get_the_date() , '</time>';
            ?>
            <h3 class="card-title"><?php the_title(); ?></h3>
          </header><!-- .card-title-and-date -->
          <section class="card-content">
            <p class="excerpt"><?php echo get_excerpt(); ?></p>
            <span class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
          </section><!-- .card-content -->
        </article><!-- .card -->
      </a>
      <?php
    endwhile;
    ?>
  </section>
  <?php

endif;

wp_reset_postdata();
