<?php
/*
 * -----------------------------------------------------------
 * Product Recommendations
 * -----------------------------------------------------------
 */

global $post;

$product_recommendations = get_post_meta( get_the_ID(), '_dimakin_products_recommendation', true );

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
          foreach ( $product_recommendations as $post ) : setup_postdata( $GLOBALS['post'] =& $post );
           ?>
           <div class="col-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
             <a href="<?php the_permalink(); ?>">
               <article class="card">
                 <header class="card-header">
                   <?php if ( has_post_thumbnail() ) : ?>
                       <figure class="card-thumbnail">
                         <?php the_post_thumbnail(); ?>
                       </figure>
                   <?php endif; ?>
                 </header>
                 <section class="card-content">
                   <?php
                   if ( is_home() ) {
                     $post_date = get_the_date( 'd-m-Y' );
                     echo '<span class="posted-on">' , $post_date , '</span>';
                   }
                   ?>
                   <?php $product_title = get_the_title(); ?>
                   <h3 class="card-title"><?php echo mb_strimwidth( $product_title, 0, 40, '...' ); ?></h3>
                   <?php the_excerpt(); ?>
                   <a href="<?php the_permalink(); ?>" class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                 </section>
               </article>
             </a>
           </div>
           <?php
          endforeach;
        ?>
      </div><!-- row ends -->
    </div><!-- container ends -->
</section><!-- recommended section ends -->

<?php } wp_reset_postdata();
