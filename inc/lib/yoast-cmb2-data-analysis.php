<?php

function dimakin_yoast_cmb_2_data_analysis_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( is_admin() ) :
		// Enqueue theme scripts
		wp_enqueue_script( 'yoast-cmb-2-data-analysis', get_theme_file_uri( 'assets/js/custom/yoast-cmb2-data-analysis.js' ), array( 'jquery' ), $theme_version, true );
	endif;

}

add_action( 'admin_enqueue_scripts', 'dimakin_yoast_cmb_2_data_analysis_scripts' );

