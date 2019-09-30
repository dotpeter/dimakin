<?php
/*
 * Template Name: Jobs Page
 * -----------------------------------------------------------
 * Default Page Template
 * -----------------------------------------------------------
 */

get_header();

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

  ?>
  <main class="main-wrapper pull-top">
    <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'post-full-width'); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="header-background" style="background-image: url('<?php echo esc_url($featured_img_url); ?>')">
        <div class="container">
          <div class="row">
            <div class="title-wrapper">
              <div class="col-12">
                <?php the_title( '<h1 class="title">', '</h1>' ); ?>
              </div><!-- col -->
            </div>
          </div>
        </div>
      </header>
      <div class="content-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="content">
                <?php the_content(); ?>
              </div><!-- page-content-wrapper -->
            </div><!-- col -->
          </div><!-- row -->
          <?php do_action('jobs_loop'); ?>
        </div><!-- container -->
      </div><!-- article-content -->
    </article><!-- article -->
  </main><!-- main-wrapper -->
  <?php

  get_template_part('inc/loops/page', 'related-loop');

  get_template_part('template-parts/cta');

endwhile;

else :
  get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
