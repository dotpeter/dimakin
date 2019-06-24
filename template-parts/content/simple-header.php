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
        <div class="col-12">
            <?php the_title( '<h1 class="title">', '</h1>' ); ?>
        </div><!-- col -->
      </div><!-- row page-title-wrapper -->
      <div class="row">
        <div class="col-12">
          <div class="content">
            <?php the_content(); ?>
          </div><!-- page-content-wrapper -->
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- article-content -->
</article><!-- article -->
</main><!-- main-wrapper -->
