<?php
/*
 * -----------------------------------------------------------
 * Chil Pages Loop
 * -----------------------------------------------------------
 */

/*----------- Loop for child pages -----------*/
if ( ! function_exists( 'dimakin_child_pages_loop' ) ) {
  function dimakin_child_pages_loop() {
    ?>
    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <a href="<?php the_permalink(); ?>">
        <article class="child-card">
          <header id="post-<?php the_ID(); ?>" class="child-card-header">
            <?php if ( has_post_thumbnail() ) : ?>
              <figure class="child-thumbnail">
                <?php the_post_thumbnail('childpage-thumb'); ?>
              </figure>
            <?php endif; ?>
          </header>
          <section class="child-card-content">
            <?php $title = get_the_title(); ?>
            <h3 class="child-card-title"><?php echo mb_strimwidth( $title, 0, 40, '...' ); ?></h3>
            <?php the_excerpt(); ?>
            <a href="<?php the_permalink(); ?>" class="child-card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </section>


        </article>
      </a>
    </div>
    <?php
  }
  add_action( 'dimakin_child_pages', 'dimakin_child_pages_loop' );
}
