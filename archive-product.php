<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();

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
        if ( have_posts() ) : while ( have_posts() ) : the_post();
          echo '<div class="col-12 col-md-6">';
          do_action('products_loop');
          echo '</div>';
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
     <?php do_action( 'dimakin_pagination' ); ?>
  </div>
</main>

<?php
get_footer();
