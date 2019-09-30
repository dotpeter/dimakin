<?php
/*
 * -----------------------------------------------------------
 * Block comment
 * -----------------------------------------------------------
 */

global $post;

$pageLinks = get_post_meta( get_the_ID(), '_dimakin_page_links', true );

if(!empty($pageLinks)) { ?>
  <section class="page-links-wrapper">
    <div class="container">
      <div class="row">
        <?php
          foreach ( $pageLinks as $post ) : setup_postdata( $GLOBALS['post'] =& $post );
          $title = get_the_title();
           ?>
           <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
             <a href="<?php the_permalink(); ?>">
               <article class="card">
                 <?php if ( has_post_thumbnail() ) : ?>
                   <header class="card-header">
                     <figure class="card-thumbnail">
                       <?php the_post_thumbnail('post-custom-thumb'); ?>
                     </figure>
                   </header>
                 <?php endif; ?>
                 <div class="card-title-and-date">
                   <?php
                   if ( is_home() ) {
                     $post_date = get_the_date( 'd-m-Y' );
                     echo '<span class="posted-on">' , $post_date , '</span>';
                   }
                   ?>
                   <h3 class="card-title"><?php echo mb_strimwidth( $title, 0, 40, '...' ); ?></h3>
                 </div>
                 <section class="card-content">
                   <p class="excerpt"><?php echo get_excerpt(); ?></p>
                   <span class="card-link"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
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
