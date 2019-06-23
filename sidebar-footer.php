<?php
/*
 * -----------------------------------------------------------
 * Footer Widgets
 * -----------------------------------------------------------
 */

if ( ! is_active_sidebar( 'footer-1' ) ) {
  return;
}
dynamic_sidebar( 'footer-1' );
