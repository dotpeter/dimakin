<?php
/*
 * -----------------------------------------------------------
 * Template for Woocommerce Product Page
 * -----------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();

do_action('dimack_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

global $product;
$product = wc_get_product( $product_id );

?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="product-content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-6">
            <?php get_template_part('woocommerce/product', 'images'); ?>
          </div>
          <div class="col-6">
            <div class="product-details">
              <?php
                echo '<h1 class="product-title">', $product->get_name() , '</h1>';
                echo '<p class="product-description">' , $product->get_description() , '<p>';
              ?>
              <div class="product-actions">
                <a href="primary-btn">Fale Connosco</a>
                <a href="secondary-btn">Ver Catalogo</a>
              </div>
            </div><!-- page-content-wrapper -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- article-content -->
  </article><!-- article -->
</main><!-- main-wrapper -->
<?php
endwhile;
endif;
get_footer();
