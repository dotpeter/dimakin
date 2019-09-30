<?php
/*
 * -----------------------------------------------------------
 * Default Loop
 * -----------------------------------------------------------
 */

/*----------- Theme default loop for archives and search results -----------*/
if ( ! function_exists( 'dimakin_default_loop' ) ) {
  function dimakin_default_loop() {
    $title = get_the_title();
    ?>

      <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <a href="<?php the_permalink(); ?>">
          <article class="card">
            <?php if ( has_post_thumbnail() ) : ?>
              <header class="card-header">
                <figure class="card-thumbnail">
                  <?php the_post_thumbnail(); ?>
                </figure>
              </header>
            <?php endif; ?>
            <div class="card-title-and-date">
              <?php
              if (is_home()) {
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , $post_date , '</span>';
              }
              ?>
              <h3 class="card-title"><?php echo mb_strimwidth( $title, 0, 40, '...' ); ?></h3>
            </div>
            <section class="card-content">
              <p class="excerpt"><?php echo get_excerpt(); ?></p>
              <a href="<?php the_permalink(); ?>" class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </section>
          </article>
        </a>
      </div>
    <?php
  }
  add_action( 'dimakin_loop', 'dimakin_default_loop' );
}
