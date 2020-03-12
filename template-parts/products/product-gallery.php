<?php
/*
 * -----------------------------------------------------------
 * Product Images
 * -----------------------------------------------------------
 */

$gallery = get_post_meta( get_the_ID(), '_dimakin_products_gallerie_img', true );
if(!empty($gallery)) {
?>
<div class="loader"><i class="fa fa-refresh" aria-hidden="true"></i></div>
<div class="product-gallery-wrapper">
  <div id="product-slider" class="flexslider">
    <ul class="slides">
      <?php
        foreach($gallery as $key => $value) {
          $imageFull = wp_get_attachment_image($key, 'product-img');
          $imageAlt = get_post_meta($key, '_wp_attachment_image_alt', true);
          $imageUrl = wp_get_attachment_image_src($key, 'product-full')[0];
          echo '<li><a href="' , $imageUrl , '" data-fancybox="gallery"  data-caption="', $imageAlt , '" >' , $imageFull , '</a></li>';
        }
      ?>
    </ul>
  </div>
  <hr>
  <div id="product-gallery" class="flexslider">
    <ul class="slides">
      <?php
        foreach($gallery as $key => $value) {
          $imageFull = wp_get_attachment_image($key, 'product-mini');
          echo '<li>' , $imageFull , '</li>';
        }
      ?>
    </ul>
  </div>
</div>
<?php }
