<?php
/*
 * Template Name: Home Page
 * -----------------------------------------------------------
 * Home Page Template
 * -----------------------------------------------------------
 */


get_header(); ?>

<main>
  <?php
  get_template_part( 'template-parts/home/home', 'slider' );

  get_template_part( 'template-parts/home/home', 'products' );

  get_template_part( 'template-parts/home/home', 'services' );

  get_template_part( 'template-parts/home/home', 'news' );
  ?>
</main>

<?php get_footer();
