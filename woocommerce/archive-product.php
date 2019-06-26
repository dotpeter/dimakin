<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
$products_args = array(
  'post_type' => 'product',
  'posts_per_page' => 10,
);
$products_loop = new WP_Query($products_args);

?>
<main class="main-wrapper">

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="tile"><?php _e('Produtos', 'dimakin'); ?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-9">
      <div class="row">
      <?php
      if ( $products_loop->have_posts() ) : while ( $products_loop->have_posts() ) : $products_loop->the_post();
        do_action('products_loop');
      endwhile;
      else :
        get_template_part( 'template-parts/content/content', 'none' );
      endif;
      ?>
      </div>
    </div>
    <div class="col-12 col-md-3">
      <div class="page-sidebar-wrapper">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       <?php do_action( 'dimakin_pagination' ); ?>
    </div>
  </div>
</div>


</main>

<?php
get_footer();
