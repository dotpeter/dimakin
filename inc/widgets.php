<?php
/*
 * -----------------------------------------------------------
 * Custom Widgets
 * -----------------------------------------------------------
 */

require_once ('widgets/contacts-widget.php');

function dimack_widgets() {
	register_widget( 'dimackContactsWidget' );
}
add_action( 'widgets_init', 'dimack_widgets' );
