<?php
/*
* Home Page Slider
*/

  $slider_shortcode = get_theme_mod( 'home_slider_shortcode' );
  if ( !empty( $slider_shortcode ) ) {
    echo '<div class="slider-wrapper">' , do_shortcode( $slider_shortcode, true ) , '</div>';
  }
