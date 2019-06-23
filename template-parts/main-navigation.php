<?php
/*
* Main Menu Navigation
*/

if ( has_nav_menu( 'main-navigation' ) ) :
  wp_nav_menu( array(
    'theme_location' => 'main-navigation',
    'container' => 'nav',
    'container_class' => 'main-navigation-wrapper',
    //'walker' => new crew_walker_nav_menu(),
  ) );
else :
  echo '<p class="no-navigation">' . esc_html__('Defina a sua navegação principal', 'dimakin') . '</p>';
endif;
