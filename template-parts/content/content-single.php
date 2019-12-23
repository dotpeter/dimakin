<?php 
/**
 * The theme single post template.
 * 
 * @package Dimakin
 */

?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php do_action('dimakin_post_navigation'); ?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-8 co-lg-8">
            <div class="title-wrapper">
              <?php
              $post_date = get_the_date( 'd-m-Y' );
              echo '<span class="posted-on">' , esc_html($post_date) , '</span>';
              the_title( '<h1 class="post-title">', '</h1>' );
              ?>
            </div><!-- .title-wrapper -->
            <?php
            if( has_post_thumbnail() ) :
              the_post_thumbnail('post-full-width');
            endif;
            the_content();
            do_action('dimakin_post_tags');
            ?>
          </div><!-- .col -->
          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <?php get_template_part( 'template-parts/loops/related-news', 'loop' ); ?>
          </div><!-- .col -->
        </div><!-- row -->
      </div><!-- container -->
    </div><!-- content-wrapper -->
  </article>
</main><!-- .main-wrapper -->