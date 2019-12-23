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
            <h3 class="news-card-title"><?php echo mb_strimwidth( get_the_title(), 0, 32, '...' ); ?></h3>
            <section class="news-card-content">
              <p class="excerpt"><?php echo get_excerpt(); ?></p>
              <span class="news-card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
            </section>
            <?php if ( has_post_thumbnail() ) : ?>
              <header id="post-<?php the_ID(); ?>" class="news-card-header">
                <figure class="card-thumbnail">
                  <?php the_post_thumbnail(); ?>
                </figure>
              </header>
            <?php endif; ?>

          </article>
        </a>
      </div>
    <?php
  }
  add_action( 'news_loop', 'dimakin_news_loop' );
}
