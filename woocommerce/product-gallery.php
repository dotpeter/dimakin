<?php
/*
 * -----------------------------------------------------------
 * Product Images
 * -----------------------------------------------------------
 */


global $product;

$productGallery = $product->get_gallery_image_ids();
$productGallery2 = $product->get_gallery_image_ids();

if(!empty($productGallery)) {

  echo '<div class="product-gallery-wrapper"><div id="product-slider" class="flexslider"><ul class="slides">';

  foreach( $productGallery as $productPhoto ) {
    $galleryFull = wp_get_attachment_image($productPhoto, 'woocommerce_single');
    $galleryAlt = get_post_meta($productPhoto, '_wp_attachment_image_alt', true);
    $galleryUrl = wp_get_attachment_url($productPhoto);
    echo '<li><a href="' , $galleryUrl , '" data-fancybox="gallery"  data-caption="', $galleryAlt , '" >' , $galleryFull , '</a></li>';
  }
  echo '</ul></div><hr>';

  echo '<div id="product-gallery" class="flexslider"><ul class="slides">';
  foreach( $productGallery2 as $gallery ) {
    $galleryThumb = wp_get_attachment_image($gallery, 'thumbnail');
    echo '<li>' , $galleryThumb , '</li>';
  }
  echo '</ul></div></div>';
}



?>
