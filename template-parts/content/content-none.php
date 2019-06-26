<?php
/*
* Template part for displaying a message that posts cannot be found
*/
?>


<main class="main-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="page-content">
          <?php
          if ( is_home() && current_user_can( 'publish_posts' ) ) :
            printf(
              '<p>' . wp_kses(
                /* translators: 1: link to WP admin new post page. */
                __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentynineteen' ),
                array(
                  'a' => array(
                  'href' => array(),
                  ),
                )
              ) . '</p>',
              esc_url( admin_url( 'post-new.php' ) )
            );
          elseif ( is_search() ) :
          ?>
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentynineteen' ); ?></p>
          <?php
          get_search_form();
          else :
          ?>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentynineteen' ); ?></p>
          <?php
            get_search_form();
            endif;
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
