<?php
/*
 * -----------------------------------------------------------
 * Template for Single Posts
 * -----------------------------------------------------------
 */

get_header();

do_action( 'dimakin_breadcrumbs' );

if ( have_posts() ) :
  while ( have_posts() ) :
    the_post();
    get_template_part( 'template-parts/content/content', 'single' );
  endwhile;
else :
    get_template_part( 'template-parts/content/content', 'none' );
endif;
get_footer();
