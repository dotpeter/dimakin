<?php
/*
 * -----------------------------------------------------------
 * Product Images
 * -----------------------------------------------------------
 */


 ?>

<p>images</p>

<?php
//echo $product->get_image_id();
//echo $product->get_image();



$attachment_ids = $product->get_gallery_image_ids();

if ( $attachment_ids && $product->get_image_id() ) {
	foreach ( $attachment_ids as $attachment_id ) {
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
}
