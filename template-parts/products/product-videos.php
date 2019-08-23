<?php
/*
 * -----------------------------------------------------------
 * Video Section for Products Page
 * -----------------------------------------------------------
 */


$videos = get_post_meta( get_the_ID(), '_dimakin_products_video_group', true );
$videosBtn = esc_url(get_theme_mod( 'product_videos_url' ));

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
      <div class="col-12 col-sm-6 col-md-4">
        <div class="videowrapper">
          <?php echo wp_oembed_get($video);?>
        </div>
      </div>
      <?php
    }

  }
  ?>
      </div>
      <?php
      if(!empty($videosBtn)) {
        echo '<div class="row"><div class="col-12"><a href="', $videosBtn , '" class="primary-btn" >' , __('+ Videos', 'dimakin') , ' <i class="fa fa-chevron-right" aria-hidden="true"></i></a></div></div>';
      }
      ?>
    </div>
  </section>
  <?php

}
