<?php
/*
* Main Menu Navigation
*/

if ( has_nav_menu( 'secondary-navigation' ) ) :
  wp_nav_menu( array(
    'theme_location' => 'secondary-navigation',
    'container' => 'nav',
    'container_class' => 'secondary-navigation-wrapper',
    //'walker' => new crew_walker_nav_menu(),
  ) );
endif;
