<?php
/*
 * -----------------------------------------------------------
 * Template for Woocommerce Product Page
 * -----------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( );
  while ( have_posts() ) : the_post();
  endwhile;
get_footer( 'shop' );
