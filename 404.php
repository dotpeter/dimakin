<?php
/*
 * -----------------------------------------------------------
 * 404 Page
 * -----------------------------------------------------------
 */
get_header(); ?>
<main class="main-wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
      <div class="row center-md center-lg middle-md middle-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <header>
              <h1><?php _e( '404!', 'dimakin' ); ?></h1>
            </header>
            <div class="content">
              <p><?php esc_html_e( 'Não encontramos por aquilo que procura, tente pesquisar de novo ou voltar à página inicial.', 'dimakin' ); ?></p>
              <?php get_search_form(); ?>

              <a href="<?php echo get_home_url(); ?>" class="primary-btn"><i class="fa fa-home" aria-hidden="true"></i> <?php esc_html_e('Voltar ao Início', 'dimakin'); ?></a>
            </div>
        </div>
      </div>
    </div>
  </article>
</main>
<?php get_footer();
