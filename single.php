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
    echo '<main class="main-wrapper wthumb">';
  }
  else {
    echo '<main class="main-wrapper">';
  }

  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'post-full-width');

  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('dimakin_post_navigation'); ?>
    <?php
    if(has_post_thumbnail()){
      echo '<header class="post-header-bg" style="background-image: url(' , esc_url($featured_img_url) , ');"></header>';
    } else {
      echo '<header class="post-header"></header>';
    }
    ?>

    <div class="post-content-wrapper">
      <div class="container">
          <div class="row post-title-wrapper">
            <div class="col-12">
              <?php
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , esc_html($post_date) , '</span>';
                the_title( '<h1 class="post-title">', '</h1>' );
              ?>
            </div><!-- col -->
          </div><!-- row post-title-wrapper -->
          <div class="row post-content">
            <div class="col-12">
                <?php the_content(); ?>
            </div><!-- col -->
          </div><!-- row -->

      </div><!-- container -->
      <?php do_action('dimakin_post_tags'); ?>
    </div><!-- post-content-wrapper -->
    <?php do_action('dimakin_related_posts'); ?>
  </article>
</main>

<?php
endwhile;

else :
    get_template_part( 'template-parts/content/content', 'none' );
endif;
get_footer();
