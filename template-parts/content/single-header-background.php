<?php
/*
 * -----------------------------------------------------------
 * Post Header Template
 * -----------------------------------------------------------
 */

?>

<main class="main-wrapper pull-top">
  <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'post-full-width'); ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('dimakin_post_navigation'); ?>
    <header class="header-background" style="background-image: url(' <?php echo esc_url($featured_img_url); ?> ');">
      <div class="container">
        <div class="row">
          <div class="title-wrapper">
            <div class="col-12">
              <?php
                $post_date = get_the_date( 'd-m-Y' );
                echo '<span class="posted-on">' , esc_html($post_date) , '</span>';
                the_title( '<h1 class="title">', '</h1>' );
              ?>
            </div><!-- col -->
          </div>
        </div>
      </div>
    </header>
    <div class="content-wrapper">
      <div class="container">
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
