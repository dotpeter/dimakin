<?php
/*
 * -----------------------------------------------------------
 * Default template for blog posts
 * -----------------------------------------------------------
 */

get_header();
$blog_description = get_theme_mod( 'blog_description' );
?>

<main class="main-wrapper">
  <?php if ( have_posts() ) : ?>
  <header class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="page-title"><?php echo esc_html_e( 'Notícias', 'dimakin' ) ?></h1>
          <?php if(!empty($blog_description)) { echo '<p class="blog-description">' , esc_html($blog_description) , '<p>'; } ?>
        </div>
      </div>
    </div>
  </header>
  <div class="page-content">
    <div class="container">
      <div class="row">
          <?php
          while ( have_posts() ) : the_post();
            do_action( 'dimack_loop' );
          endwhile;
          else:
            get_template_part( 'template-parts/post/content', 'none' );
          endif;
          ?>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
           <?php do_action('dimack_pagination'); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer();
