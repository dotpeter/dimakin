<?php
/*
 * -----------------------------------------------------------
 * Header Widgets
 * -----------------------------------------------------------
 */

if ( ! is_active_sidebar( 'header-1' ) ) {
  return;
}
dynamic_sidebar( 'header-1' );
