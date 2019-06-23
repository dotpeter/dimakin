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

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

global $product;

?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="product-content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6">
            <?php get_template_part('woocommerce/product', 'gallery'); ?>
          </div>
          <div class="col-12 col-md-6">
            <div class="product-details">
              <?php
                echo '<h1 class="product-title">', $product->get_name() , '</h1>';
                echo '<p class="product-description">' , $product->get_description() , '<p>';
              ?>
              <div class="product-actions">
                <a href="" class="primary-btn">Fale Connosco</a>
                <a href="" class="secondary-btn">Ver Catalogo</a>
              </div><!-- product-actions -->
            </div><!-- product-details -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- product-content-wrapper -->
    <?php get_template_part('woocommerce/product', 'videos'); ?>
    <?php get_template_part('woocommerce/product', 'recommendations'); ?>
  </article><!-- article -->
</main><!-- main-wrapper -->
<?php
endwhile;
endif;
get_footer();
