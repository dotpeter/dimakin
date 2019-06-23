<?php
/*
 * -----------------------------------------------------------
 * Video Section for Products Page
 * -----------------------------------------------------------
 */


$videos = get_post_meta( get_the_ID(), '_dimakin_products_video_group', true );

$url = esc_url( get_post_meta( get_the_ID(), 'wiki_test_embed', 1 ) );


if(!empty($videos)){
  ?>
  <section class="videos-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title"><?php _e( 'Videos', 'dimakin' ); ?></h2>
        </div>
      </div>
      <div class="row">
  <?php

  foreach ( (array) $videos as $key => $entry ) {

    $video = '';

    if ( isset( $entry['_dimakin_products_video'] ) ) {
      $video = esc_url( $entry['_dimakin_products_video'] );
    }

    if(!empty($video)){
      ?>
      <div class="col-3">
        <div class="videowrapper">
          <?php echo wp_oembed_get($video);?>
        </div>
      </div>
      <?php
    }

  }
  ?>
      </div>
    </div>
  </section>
  <?php

}
