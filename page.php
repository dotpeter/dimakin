<?php
/*
 * -----------------------------------------------------------
 * Default Page Template
 * -----------------------------------------------------------
 */

get_header();

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

  if ( has_post_thumbnail() ) {
    get_template_part('template-parts/content/image', 'header');
  }
  else {
    get_template_part('template-parts/content/simple', 'header');
  }

  get_template_part('inc/loops/child', 'related-loop');

  get_template_part('template-parts/cta');

endwhile;

else :
  get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
