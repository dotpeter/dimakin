<?php
/*
 * Template Name: Conctact Page
 * -----------------------------------------------------------
 * Template for contacts page.
 * -----------------------------------------------------------
 */

$contacts_desc    = get_post_meta( get_the_ID(), '_dimakin_contacts_desc', true );
$contacts_title   = get_post_meta( get_the_ID(), '_dimakin_contacts_title', true );
$contacts_address = get_post_meta( get_the_ID(), '_dimakin_contacts_address', true );
$contacts_phone   = get_post_meta( get_the_ID(), '_dimakin_contacts_phone', true );
$contacts_email   = get_post_meta( get_the_ID(), '_dimakin_contacts_email', true );
$contacts_form    = get_post_meta( get_the_ID(), '_dimakin_contacts_shortcode', true );
$contacts_map     = get_post_meta( get_the_ID(), '_dimakin_contacts_map', true );
$address_group     = get_post_meta( get_the_ID(), '_dimakin_contacts_address_group', true );

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
	wpcf7_enqueue_styles();
}

get_header();

do_action( 'dimakin_breadcrumbs' );

?>
<main class="main-wrapper pull-top">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="page-header">
			<?php
			if ( ! empty( $contacts_map ) ) :
				echo '<section class="map-wrapper"><div class="container-fluid"><div class="row no-gutters"><div class="col-12">' , $contacts_map , '</div></div></div></section>';
			endif;
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
							if ( $address_group ) :
								echo '<div class="contacts-address-wrapper">';
								if ( $address_group ) :
									foreach ( (array)$address_group as $key => $address_item ) :
										$address_title = $address_address = $address_phone = $address_email = '';
										if ( isset( $address_item['_dimakin_contacts_address_title'] ) )
											$address_title   = esc_html( $address_item['_dimakin_contacts_address_title'] );
										if ( isset( $address_item['_dimakin_contacts_address_address'] ) )
											$address_address = wpautop( $address_item['_dimakin_contacts_address_address'] );
										if ( isset( $address_item['_dimakin_contacts_address_phone']))
											$address_phone   = esc_html( $address_item['_dimakin_contacts_address_phone'] );
										if ( isset( $address_item['_dimakin_contacts_address_email']))
											$address_email   = esc_html( $address_item['_dimakin_contacts_address_email'] );
										?>
										<div class="contacts-info">
											<h3><?php echo $address_title; ?></h3>
											<div class="address-wrapper">
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<div class="address"><?php echo $address_address; ?></div>
											</div><!-- .address-wrapper -->
											<?php
											if ( ! empty( $address_phone ) ) :
												?>
												<p class="phone-number">
													<i class="fa fa-phone" aria-hidden="true"></i>
													<a href="tel:<?php echo $address_phone; ?>"><?php echo $address_phone; ?></a>
												</p><!-- phone-number -->
												<?php
											endif;
											?>
											<?php
											if( ! empty( $address_email ) ) :
												?>
													<p class="email-address">
														<i class="fa fa-envelope" aria-hidden="true"></i>
														<a href="mailto:<?php echo $address_email; ?>" target="_blank"><?php echo $address_email; ?></a>
													</p><!-- email-address -->
												<?php
											endif;
											?>
											</div><!-- contacts-info -->
											<?php
									endforeach;
								endif;
								echo '</div><!-- .contacts-address-wrapper -->';
							endif;
							?>
							<h4><?php esc_html_e( 'Siga-nos nas redes sociais', 'dimakin' ); ?></h4>
							<?php do_action( 'dimakin_social' ); ?>
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
get_footer();
