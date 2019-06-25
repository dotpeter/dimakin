<?php
/*
 * -----------------------------------------------------------
 * Block comment
 * -----------------------------------------------------------
 */

global $post;

$pageLinks = get_post_meta( get_the_ID(), '_dimakin_childpage_links', true );

if(!empty($pageLinks)) { ?>
  <section class="page-links-wrapper">
    <div class="container">
      <!--<div class="row">
        <div class="col-12">
          <h2 class="section-title"><?php _e( 'Outras', 'dimakin' ); ?></h2>
        </div>
      </div>-->
      <div class="row">
        <?php
          foreach ( $pageLinks as $post ) : setup_postdata( $GLOBALS['post'] =& $post );
           ?>
           <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
             <a href="<?php the_permalink(); ?>">
               <article class="card">
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
                 <header class="card-header">
                   <?php if ( has_post_thumbnail() ) : ?>
                       <figure class="card-thumbnail">
                         <?php the_post_thumbnail('post-custom-thumb'); ?>
                       </figure>
                   <?php endif; ?>
                 </header>
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
