<?php
/*
 * -----------------------------------------------------------
 * Chil Pages Loop
 * -----------------------------------------------------------
 */

/*----------- Loop for child pages -----------*/
if ( ! function_exists( 'dimakin_child_pages_loop' ) ) {
  function dimakin_child_pages_loop() {
    $title = get_the_title();
    ?>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a href="<?php the_permalink(); ?>">
        <article class="child-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <header id="post-<?php the_ID(); ?>" class="child-card-header">
              <figure class="child-thumbnail">
                <?php the_post_thumbnail('childpage-thumb'); ?>
              </figure>
            </header>
          <?php endif; ?>
          <h3 class="child-card-title"><?php echo mb_strimwidth( $title, 0, 40, '...' ); ?></h3>
          <section class="child-card-content">
            <p class="excerpt"><?php echo get_excerpt(); ?></p>
            <span class="child-card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
          </section>
        </article>
      </a>
    </div>
    <?php
  }
  add_action( 'dimakin_child_pages', 'dimakin_child_pages_loop' );
}
