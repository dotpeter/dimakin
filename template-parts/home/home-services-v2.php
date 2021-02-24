<?php
/*
* Home Page Services v2
*/

$service_items = get_post_meta( get_the_ID(), '_dimakin_home_group', true );

if ( ! empty( $service_items ) ) {
	echo '<section class="services-wrapper-v2"><div class="container-fluid"><div class="row justify-content-center align-items-center no-gutters">';

	if ( $service_items ) {

		foreach ( (array)$service_items as $key => $service ) {

			$service_title = $service_url = $service_image = '';

			if ( isset( $service['_dimakin_home_title'] ) )
				$service_title = esc_html( $service['_dimakin_home_title'] );

			if ( isset( $service['_dimakin_home_url'] ) )
				$service_url = esc_html( $service['_dimakin_home_url'] );

			if ( isset( $service['_dimakin_home_image'] ) )
				$service_image = wp_get_attachment_image( $service['_dimakin_home_image_id'], 'services-thumb' );

			if ( ! empty( array( $service_title ) ) ) {

				echo '<div class="col-12 col-md-4"><a class="service-box" href="' . $service_url . '">' . $service_image . '<div class="service-overlay"><span class="service-btn"><i class="fa fa-plus"></i><p class="service-title">' . $service_title . '</p></span></div></a></div>';

			}
		}
	}
	echo '</div></div></section>';
}
