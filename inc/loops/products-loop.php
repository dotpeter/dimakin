<?php
/*
 * -----------------------------------------------------------
 * Products Loop
 * -----------------------------------------------------------
 */

if ( ! function_exists( 'dimakin_products_loop' ) ) {
  function dimakin_products_loop() {
    global $product;
    ?>
    <div class="col-12 col-md-6">
      <a href="<?php the_permalink($product->get_id()); ?>">
        <article class="card">
          <header class="card-header">
            <?php if ( has_post_thumbnail() ) {
              ?>
              <figure class="card-thumbnail">
                <?php the_post_thumbnail(); ?>
              </figure>
              <?php
            } ?>
          </header>
          <section class="card-content">
            <?php $product_title = $product->get_name(); ?>
            <h3 class="card-title"><?php echo mb_strimwidth( $product_title, 0, 40, '...' ); ?></h3>
            <?php $productDescpriton = $product->get_description(); ?>
            <p class="product-description"><?php echo mb_strimwidth( $productDescpriton, 0, 76, '...' ); ?></p>
            <a href="<?php the_permalink($product->get_id()); ?>" class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </section>
        </article>
      </a>
    </div>
    <?php
  }
  add_action( 'products_loop', 'dimakin_products_loop' );
}
