<?php
/*
 * -----------------------------------------------------------
 * News Loop
 * -----------------------------------------------------------
 */


/*----------- News Loop -----------*/
if ( ! function_exists( 'dimakin_news_loop' ) ) {
  function dimakin_news_loop() {
    ?>
      <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <a href="<?php the_permalink(); ?>">
          <article class="news-card">
            <section class="news-card-content">
              <?php $title = get_the_title(); ?>
              <a href="<?php the_permalink(); ?>"><h3 class="news-card-title"><?php echo mb_strimwidth( $title, 0, 34, '...' ); ?></h3></a>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="news-card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </section>
            <header id="post-<?php the_ID(); ?>" class="news-card-header">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>">
                  <figure class="card-thumbnail">
                    <?php the_post_thumbnail('post-custom-thumb'); ?>
                  </figure>
                </a>
              <?php endif; ?>
            </header>
          </article>
        </a>
      </div>
    <?php
  }
  add_action( 'news_loop', 'dimakin_news_loop' );
}
