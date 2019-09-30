<?php
/*
 * Template Name: Conctact Page
 * -----------------------------------------------------------
 * Template for contacts page.
 * -----------------------------------------------------------
 */

 $contacts_desc = get_post_meta( get_the_ID(), '_dimakin_contacts_desc', true );
 $contacts_title = get_post_meta( get_the_ID(), '_dimakin_contacts_title', true );
 $contacts_address = get_post_meta( get_the_ID(), '_dimakin_contacts_address', true );
 $contacts_phone = get_post_meta( get_the_ID(), '_dimakin_contacts_phone', true );
 $contacts_email = get_post_meta( get_the_ID(), '_dimakin_contacts_email', true );
 $contacts_form = get_post_meta( get_the_ID(), '_dimakin_contacts_shortcode', true );
 $contacts_map = get_post_meta( get_the_ID(), '_dimakin_contacts_map', true );

$addressGroup = get_post_meta( get_the_ID(), '_dimakin_contacts_address_group', true );

get_header();

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
  wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
  wpcf7_enqueue_styles();
}

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();
?>
<main class="main-wrapper pull-top">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="page-header">
      <?php
        if(!empty($contacts_map)){
          echo '<section class="map-wrapper"><div class="container-fluid"><div class="row no-gutters"><div class="col-12">' , $contacts_map , '</div></div></div></section>';
        }
      ?>
    </header>
    <div class="article-content">

      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="page-title-wrapper">
              <?php the_title( '<h1 class="title">', '</h1>' ); ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="contacts-info-wrapper">
              <?php
                if($addressGroup) {
                  echo '<div class="contacts-address-wrapper">';
                  if ($addressGroup) {
                    foreach ((array)$addressGroup as $key => $addressItem) {
                      $addressTitle = $addressAddress = $addressPhone = $addressEmail = '';
                      if (isset($addressItem['_dimakin_contacts_address_title' ]))
                        $addressTitle = esc_html($addressItem['_dimakin_contacts_address_title']);
                      if (isset($addressItem['_dimakin_contacts_address_address']))
                        $addressAddress = wpautop($addressItem['_dimakin_contacts_address_address']);
                      if (isset($addressItem['_dimakin_contacts_address_phone']))
                        $addressPhone = esc_html($addressItem['_dimakin_contacts_address_phone']);
                      if (isset($addressItem['_dimakin_contacts_address_email']))
                        $addressEmail = esc_html($addressItem['_dimakin_contacts_address_email']);
                        ?>
                        <div class="contacts-info">
                          <h3><?php echo $addressTitle; ?></h3>
                          <div class="address-wrapper">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <div class="address"><?php echo $addressAddress; ?></div>
                          </div>
                          <?php if(!empty($addressPhone)):?>
                            <p class="phone-number">
                              <i class="fa fa-phone" aria-hidden="true"></i>
                              <a href="tel:<?php echo $addressPhone; ?>"><?php echo $addressPhone; ?></a>
                            </p>
                          <?php endif; ?>
                          <?php if(!empty($addressEmail)):?>
                            <p class="email-address">
                              <i class="fa fa-envelope" aria-hidden="true"></i>
                              <?php echo $addressEmail; ?>
                            </p>
                        <?php endif; ?>
                        </div>
                        <?php
                    }
                  }
                  echo '</div>';
                }
              ?>

              <h4><?php _e( 'Siga-nos nas redes sociais', 'dimakin' ); ?></h4>
              <?php do_action('dimakin_social'); ?>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <?php echo do_shortcode( $contacts_form ); ?>
          </div>
        </div>
      </div>
    </div>
  </article>
</main>
<?php
endwhile;

else :
  get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
