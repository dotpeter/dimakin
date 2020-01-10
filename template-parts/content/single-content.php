<?php
/*
 * -----------------------------------------------------------
 * Single post content template.
 * -----------------------------------------------------------
 */

?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action( 'dimakin_post_navigation' ); ?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-8">
            <div class="title-wrapper">
              <?php
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , esc_html($post_date) , '</span>';
                the_title( '<h1 class="post-title">', '</h1>' );
                if ( has_post_thumbnail() ) :
                  the_post_thumbnail( 'post-full-width' );
                endif;
              ?>
            </div><!-- .title-wrapper -->
            <?php the_content(); ?>
          </div><!-- .col -->
          <div class="col-12 col-sm-12 col-md-4">
            <?php do_action( 'dimakin_related_posts' ); ?>
          </div><!-- .col -->
        </div><!-- row -->
      </div><!-- container -->
      <?php do_action( 'dimakin_post_tags' ); ?>
    </div><!-- post-content-wrapper -->
  </article>
</main><!-- .main-wrapper -->
