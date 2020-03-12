<?php
/*
 * -----------------------------------------------------------
 * Products Loop
 * -----------------------------------------------------------
 */

if ( ! function_exists( 'dimakin_products_loop' ) ) {
  function dimakin_products_loop() {
    $product_title = get_the_title();

    ?>
      <article class="product-card">
        <header class="product-header">
          <a href="<?php the_permalink(); ?>" class="product-link-wrapper">
          <?php
          if( get_post_meta( get_the_ID(), '_dimakin_products_isnew', 1 ) ) {
           echo '<span class="product-itsnew">' . esc_html__( 'Novo!', 'dimakin' ) . '</span>';
          }
          ?>
          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('product-thumb'); } ?>
          </a>
        </header>
        <section class="product-content">
          <h3 class="product-title"><?php echo mb_strimwidth( $product_title, 0, 32, '...' ); ?></h3>
          <div class="product-box">
            <p class="product-description excerpt"><?php echo get_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="product-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </div>
        </section>
      </article>
    <?php
  }
  add_action( 'products_loop', 'dimakin_products_loop' );
}
