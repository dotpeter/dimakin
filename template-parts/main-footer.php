<?php
/*
* Main Footer Content
*/

$cookieBarText = get_theme_mod('cookie_bar_text');
$cookieBarUrl = get_option( 'wp_page_for_privacy_policy');

if($cookieBarUrl) {
  $cookieLink = esc_url(get_permalink($cookieBarUrl));
}

if(!empty($cookieBarText)) {
  echo '<section id="eu-cookie-bar" class="cookie-bar-wrapper"><div class="cookie-bar"><div class="cookie-text"><i class="fa fa-info-circle fa-2x"></i><p>' , esc_html($cookieBarText) , '</p></div><div class="cookie-buttons"><a href="' , $cookieLink , '" class="secondary-btn cookie-read-more">' , esc_html__('Saber mais', 'dimakin') , '</a><button id="euCookieAcceptWP" onclick="euAcceptCookiesWP()" class="secondary-btn cookie-accept">' , esc_html__('Continuar', 'dimakin') , '</button></div></div></section><!-- cookie-bar-wrapper-->';
}

?>

<footer class="main-footer-wrapper" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
  <div class="footer-widgets-wrapper">
    <div class="container">
      <div class="row">
        <?php get_sidebar( 'footer' ); ?>
      </div><!-- row -->
      <a href="javascript:" id="btn-return-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
    </div><!-- container -->
  </div><!-- footer-widgets-wrapper -->
  <div class="container footer-extras">
    <div class="row align-items-center">
      <div class="col-12">
        <?php do_action('dimakin_social'); ?>
      </div><!-- col -->
    </div><!-- row -->
    <div class="row">
      <div class="col-12">
        <?php
          if ( has_nav_menu( 'footer-navigation' ) ) :
            wp_nav_menu( array(
              'theme_location' => 'footer-navigation',
              'container' => 'nav',
              'container_class' => 'footer-menu',
              //'walker' => new crew_walker_nav_menu(),
            ) );
          endif;
        ?>
      </div><!-- col -->
    </div><!-- row -->
    <div class="row">
      <div class="col-12">
        <p class="copyright-text">&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> <?php esc_html_e( 'Todos os Direitos Reservados.', 'dimakin' ); ?></p>
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
</footer><!-- main-footer-wrapper -->
