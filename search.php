<?php
/*
 * -----------------------------------------------------------
 * Search Results Page
 * -----------------------------------------------------------
 */
get_header(); ?>
<main class="main-wrapper">
  <?php if ( have_posts() ) : ?>
  <header class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="page-title"><?php echo esc_html_e( 'Resultados de pesquisa para:', 'dimakin' ) ?> <span><?php the_search_query(); ?></span></h1>
        </div>
      </div>
    </div>
  </header>
  <section class="search-content">
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
  </section>
</main>
<?php get_footer();
