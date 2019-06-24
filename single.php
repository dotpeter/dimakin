<?php
/*
 * -----------------------------------------------------------
 * Template for Single Posts
 * -----------------------------------------------------------
 */

get_header();

do_action( 'dimakin_breadcrumbs' );

if ( have_posts() ) : while ( have_posts() ) : the_post();

  if ( has_post_thumbnail($post->ID) ) {
    get_template_part('template-parts/content/single', 'header-background');
  }
  else {
    get_template_part('template-parts/content/single', 'header-simple');
  }

endwhile;

else :
    get_template_part( 'template-parts/content/content', 'none' );
endif;
get_footer();
