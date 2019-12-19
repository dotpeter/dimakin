<?php
/*
 * -----------------------------------------------------------
 * Page Simple Header
 * -----------------------------------------------------------
 */
?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="header-simple"></header>
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-8">
            <?php the_title( '<h1 class="title">', '</h1>' ); ?>
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail(); ?>
            <?php endif; ?>
            <div class="content">
              <?php the_content(); ?>
            </div><!-- page-content-wrapper -->
          </div><!-- col -->
          <div class="col-12 col-sm-12 col-md-4">
            <?php do_action('dimakin_related_posts'); ?>
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- article-content -->
  </article><!-- article -->
</main><!-- main-wrapper -->
