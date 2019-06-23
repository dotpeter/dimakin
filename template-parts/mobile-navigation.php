<?php
/*
* Mobile Menu Navigation
*/
?>

  <div id="mobile-grey-back">&nbsp;</div>
  <div class="mobile-navigation-wrapper">
    <div class="mobile-toggle-wrapper">
      <div id="mobile-toggle-close" class="mobile-nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </div><!-- mobile-nav-toggle -->
    </div><!-- mobile-toggle-wrapper -->
    <?php
    if ( has_nav_menu( 'mobile-navigation' ) ) :
      wp_nav_menu( array(
        'theme_location' => 'mobile-navigation',
        'container' => 'nav',
        'container_class' => 'mobile-navigation',
        //'walker' => new crew_walker_nav_menu(),
      ) );
    else :
      echo '<p class="no-navigation">' , esc_html__('Menu não definido', 'dimakin') , '</p>';
    endif; ?>
    <div class="mobile-nav-extras">
      <?php do_action('dimack_social'); ?>
    </div><!-- mobile-nav-extras -->
  </div><!-- mobile-navigation-wrapper -->
