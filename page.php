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
    echo '<main class="main-wrapper wthumb">';
  }
  else {
    echo '<main class="main-wrapper">';
  }

  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'post-full-width');

  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if(has_post_thumbnail()){
      echo '<header class="page-header-bg" style="background-image: url(' , esc_url($featured_img_url) , ');"></header>';
    } else {
      echo '<header class="page-header"></header>';
    }
    ?>
    <div class="page-content-wrapper">
      <div class="container">
        <div class="row page-title-wrapper">
          <div class="col-12">
              <?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
          </div><!-- col -->
        </div><!-- row page-title-wrapper -->
        <div class="row">
          <div class="col-12">
            <div class="page-content">
              <?php the_content(); ?>
            </div><!-- page-content-wrapper -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- article-content -->
  </article><!-- article -->
</main><!-- main-wrapper -->
<?php
endwhile;

else :
  get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
