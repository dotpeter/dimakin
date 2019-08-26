<?php
/*
 * -----------------------------------------------------------
 * Related Posts Loop
 * -----------------------------------------------------------
 */

/*----------- Related Posts -----------*/
if ( !function_exists( 'dimakin_related_posts_loop' ) ) {
  function dimakin_related_posts_loop() {

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
                <h3 class="card-title"><?php echo mb_strimwidth( $product_title, 0, 34, '...' ); ?></h3>
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

  add_action( 'dimakin_related_posts', 'dimakin_related_posts_loop' );
}
