<?php
/*
 * Template Name: Page w/Childs
 * -----------------------------------------------------------
 * Pages with childs Template
 * -----------------------------------------------------------
 */


 get_header(); ?>

 <?php do_action('dimakin_breadcrumbs');?>
 <main class="main-wrapper">
   <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
     <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       <?php
       if(has_post_thumbnail()){
         echo '<header class="page-header" style="background-image: url(' , esc_url($featured_img_url) , ');height: 400px;"></header>';
       } else {
         echo '<header class="page-header" style="height: 0px;"></header>';
       }
       ?>
       <div class="article-content">
         <div class="container">
           <div class="row">
             <div class="col-12 col-md-9">
               <div class="page-title-wrapper">
                 <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
               </div>
               <div class="page-content-wrapper">
                 <?php the_content(); ?>
                <?php
                  $childs_args = array(
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'post_parent'    => $post->ID,
                    'order'          => 'ASC',
                    'orderby'        => 'menu_order'
                  );

                  $parent_loop = new WP_Query( $childs_args );

                  if ( $parent_loop->have_posts() ) :
                    while ( $parent_loop->have_posts() ) : $parent_loop->the_post();
                      do_action( 'dimakin_child_pages' );
                    endwhile;
                    endif;
                    wp_reset_postdata();

                  ?>
               </div>
             </div>
             <div class="col-12 col-md-3">
               <div class="page-sidebar-wrapper">
                 <?php get_sidebar(); ?>
               </div>
             </div>
           </div>
         </div>
       </div>
     </article>
   <?php
   endwhile;
   else :
     get_template_part( 'template-parts/content/content', 'none' );
   endif;
   ?>
 </main>

 <?php get_footer();
