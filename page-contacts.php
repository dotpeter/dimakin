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

get_header();

do_action('dimakin_breadcrumbs');

if ( have_posts() ) : while ( have_posts() ) : the_post();

  if ( has_post_thumbnail($post->ID) ) {
    echo '<main class="main-wrapper wthumb">';
  }
  else {
    echo '<main class="main-wrapper">';
  }

  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');

  ?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if(has_post_thumbnail()){
      echo '<header class="page-header" style="background-image: url(' , esc_url($featured_img_url) , ');height: 400px;"></header>';
    } else {
      echo '<header class="page-header"></header>';
    }
    ?>
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
                <div class="contacts-info">
                  <div class="address-wrapper">
                      <?php
                      if( !empty($contacts_address) ) {
                        echo '<i class="fa fa-map-marker" aria-hidden="true"></i><div class="address">' , wpautop( $contacts_address ) , '</div>';
                      }
                      ?>
                  </div>
                  <?php
                    if( !empty($contacts_phone) ) {
                      echo '<p class="phone-number"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:' , esc_html( $contacts_phone ) . '">' , esc_html( $contacts_phone ) , '</a></p><p class="email-address"><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:' , esc_attr( $contacts_email ) , '">' , esc_html( $contacts_email ) , '</a></p>';
                    }
                  ?>
                </div>

              <h4><?php _e( 'Siga-nos nas redes sociais', 'dimakin' ); ?></h4>
              <?php do_action('dimakin_social'); ?>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <?php echo do_shortcode( $contacts_form ); ?>
          </div>
        </div>
      </div>
      <?php
        if(!empty($contacts_map)){
          echo '<section class="map-wrapper"><div class="container-fluid"><div class="row no-gutters"><div class="col-12">' , $contacts_map , '</div></div></div></section>';
        }
      ?>
    </div>
  </article>
</main>
<?php
endwhile;

else :
  get_template_part( 'template-parts/content/content', 'none' );
endif;

get_footer();
