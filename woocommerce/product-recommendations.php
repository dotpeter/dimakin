<?php
/*
 * -----------------------------------------------------------
 * Product Recommendations
 * -----------------------------------------------------------
 */

global $post;

$product_recommendations = get_post_meta( get_the_ID(), '_dimakinrp_search_products', true );

if(!empty($product_recommendations)) { ?>
  <section class="product-recommendations">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title"><?php _e( 'Recomendações', 'dimakin' ); ?></h2>
        </div>
      </div>
      <div class="row">
        <?php
          foreach ( $product_recommendations as $recommendation ) : setup_postdata( $GLOBALS['post'] =& $post );
            do_action('dimakin_standart_loop');
          endforeach; }
        ?>
      </div><!-- row ends -->
    </div><!-- container ends -->
</section><!-- recommended section ends -->

<?php wp_reset_postdata();
