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

?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="product-content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6">
            <?php get_template_part('template-parts/products/product', 'gallery'); ?>
          </div>
          <div class="col-12 col-md-6">
            <div class="product-details">
              <h1 class="product-title"><?php the_title(); ?></h1>
              <?php the_content(); ?>
              <div class="product-actions">
                <?php
                  $getQote = esc_url(get_theme_mod( 'product_btn_contact_url' ));
                  $pdf = wp_get_attachment_url(get_post_meta( get_the_ID(), '_dimakin_products_catalog_id', true));
                  if(!empty($getQote)) {
                    echo '<a href="', $getQote , '" class="primary-btn" >' , __('Fale Connosco', 'dimakin') , '</a>';
                  }
                  if(!empty($pdf)) {
                    echo '<a href="', esc_url($pdf) , '" class="secondary-btn" target="_blank">' , __('Catálogo', 'dimakin') , '</a>';
                  }
                ?>
              </div><!-- product-actions -->
              <?php
                $productsTags = get_the_terms( get_the_ID(), 'post_tag' );
                if ( $productsTags && ! is_wp_error( $productsTags) ) {
                    echo '<p class="product-tags"><i class="fa fa-tags" aria-hidden="true"></i><strong>', __('Tags: ', 'dimakin') ,'</strong>';
                    foreach ($productsTags as $tag) {
                        $tagTitle = $tag->name; // tag name
                        $tag_link = get_term_link( $tag );// tag archive link
                        echo '<span><a href="', $tag_link ,'">', $tagTitle ,'</a></span>';
                    }
                    echo '</p>';
                }
              ?>
            </div><!-- product-details -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- product-content-wrapper -->
    <?php get_template_part('template-parts/products/product', 'videos'); ?>
    <?php get_template_part('template-parts/products/product', 'recommendations'); ?>
  </article><!-- article -->
</main><!-- main-wrapper -->
<?php
endwhile;
endif;
get_footer();
