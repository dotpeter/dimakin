<?php
/*
 * -----------------------------------------------------------
 * Simple Header for Posts
 * -----------------------------------------------------------
 */

?>

<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('dimakin_post_navigation'); ?>
    <header class="header-simple"></header>
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="title-wrapper">
            <div class="col-12">
              <?php
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , esc_html($post_date) , '</span>';
                the_title( '<h1 class="post-title">', '</h1>' );
              ?>
            </div><!-- col -->
          </div>
        </div><!-- row -->
        <div class="row">
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
