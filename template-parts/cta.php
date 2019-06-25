<?php
/*
 * -----------------------------------------------------------
 * Call to Action
 * -----------------------------------------------------------
 */

$ctaDescription = get_theme_mod('cta_description');
$ctaUrl = get_theme_mod('cta_url');

if(get_post_meta( get_the_ID(), '_dimakin_page_cta', 1 )){
  if(!empty($ctaDescription && $ctaUrl)) { ?>
    <section class="cta-wrapper">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-12 col-md-10">
            <p class="cta-description"><?php esc_html_e($ctaDescription); ?></p>
          </div>
          <div class="col-12 col-md-2">
            <a href=" <?php echo esc_url($ctaUrl); ?>" class="secondary-btn cta-btn"><?php _e('Fale Connosco', 'dimakin'); ?></a>
          </div>
        </div>
      </div>
    </section>
  <?php }
}
